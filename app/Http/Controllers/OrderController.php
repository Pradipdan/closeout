<?php

namespace App\Http\Controllers;

use App\Http\Requests\Product\CreateProductRequest;
// use App\Http\Requests\User\CreateUserRequest;
// use App\Http\Requests\User\UpdateUserRequest;
// use App\Http\Requests\User\UpdateUserProfileRequest;
use App\Http\Requests\Product\UpdateProductRequest;
use App\Models\Category;
use App\Models\Order;
use App\Services\OrderService;
use Spatie\Permission\Models\Permission;

use App\Models\Role;
use App\Models\User;
use App\Models\Product;
use App\Services\RoleService;
use App\Services\UserService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\Facades\DataTables;

class OrderController extends Controller
{

    protected OrderService $orderService;
    protected RoleService $roleService;

    public function __construct(OrderService $orderService, RoleService $roleService)
    {
        $this->orderService = $orderService;
        $this->roleService = $roleService;
        $this->middleware('permission:order-list|order-create|order-edit|order-delete', ['only' => ['index', 'show']]);
        $this->middleware('permission:order-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:order-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:order-delete', ['only' => ['destroy']]);

        // Permission::create(['name' => 'order-list', 'guard_name' => 'web', 'module_name' => 'Orders']);
        // Permission::create(['name' => 'order-create', 'guard_name' => 'web', 'module_name' => 'Orders']);
        // Permission::create(['name' => 'order-edit', 'guard_name' => 'web', 'module_name' => 'Orders']);
        // Permission::create(['name' => 'order-delete', 'guard_name' => 'web', 'module_name' => 'Orders']);
    }

    public function index()
    {
        // $order = Order::get();
        return view('content.apps.order.list');
    }


    public function getAll()
    {
        $orders = $this->orderService->getAll();
        return DataTables::of($orders)
            ->addColumn('actions', function ($order) {
                $encrypt_id = encrypt($order->id);

                // $updateButton = auth()->user()->can('order-edit')
                //     ? "<a data-bs-toggle='tooltip' title='Edit' data-bs-delay='400' class='btn-sm border-warning' href='" . route('app-orders-edit', $encrypt_id) . "'>
                //         <i class='text-warning' data-feather='edit'></i></a>"
                //     : '';

                $updateButton = auth()->user()->can('order-edit')
                ? "<button type='button' data-bs-toggle='modal' data-bs-target='#editStatusModal'
                    class='btn btn-sm border-warning edit-status bg-light'
                    data-id='" . e($encrypt_id) . "'
                    data-status='" . e($order->status) . "'
                    data-is_paid='" . e($order->is_paid) . "'
                    data-description='" . e($order->description) . "'>
                    <i class='text-warning' data-feather='edit'></i>
                </button>"
                : '';

                $deleteButton = auth()->user()->can('order-delete')
                    ? "<a data-bs-toggle='tooltip' title='Delete' data-bs-delay='400' class='btn-sm border-danger confirm-delete'
                    data-idos='$encrypt_id' id='confirm-color' href='" . route('app-orders-destroy', $encrypt_id) . "'>
                    <i class='text-danger' data-feather='trash-2'></i></a>"
                    : '';

                $viewButton = "<a data-bs-toggle='tooltip' title='View' data-bs-delay='400'
                    class='btn-sm border-info' href='" . route('app-orders-view', $encrypt_id) . "'>
                    <i class='text-info' data-feather='eye'></i></a>";

                return $updateButton . " " . $deleteButton . " " . $viewButton;
            })
            ->addColumn('order_number', function ($order) {
                return $order->order_number ?? '';
            })
            ->addColumn('user_id', function ($order) {
                return $order->user_id ?? '';
            })
            ->addColumn('total_price', function ($order) {
                return '$ ' . number_format($order->total_price, 2);
            })
            ->addColumn('shipping_address', function ($order) {
                return nl2br(strip_tags($order->shipping_address));
            })
            ->addColumn('status', function ($order) {
                $statusLabels = [
                    'pending' => ['class' => 'badge-light-primary', 'text' => 'Pending'],
                    'processing' => ['class' => 'badge-light-warning', 'text' => 'Processing'],
                    'shipped' => ['class' => 'badge-light-info', 'text' => 'Shipped'],
                    'delivered' => ['class' => 'badge-light-success', 'text' => 'Delivered'],
                    'cancelled' => ['class' => 'badge-light-danger', 'text' => 'Cancelled'],
                ];

                $status = $order->status ?? 'pending'; // Default to 'pending' if null
                $badgeClass = $statusLabels[$status]['class'] ?? 'badge-light-secondary';
                $statusText = $statusLabels[$status]['text'] ?? ucfirst($status);

                return "<span class='badge {$badgeClass}'>{$statusText}</span>";
            })
            ->addColumn('created_at', function ($order) {
                return $order->created_at ? $order->created_at->format('Y-m-d H:i:s') : '';
            })
            ->rawColumns(['actions', 'status', 'shipping_address'])
            ->make(true);
    }

    public function updateStatus(Request $request)
    {
        $id = decrypt($request->id); // Decrypt the ID
        $order = Order::find($id);

        if ($order) {
            $order->status = $request->status;
            $order->is_paid = $request->is_paid ?? 0;
            $order->description = $request->description;
            $order->save();

            return redirect()->route('app-orders-list')->with('success', 'Order status updated successfully.');
        }

        return redirect()->route('app-orders-list')->with('error', 'Order not found.');
    }
    public function destroy($encrypted_id)
    {
        $id = decrypt($encrypted_id);
        $orders = $this->orderService->destroy($id);

        if (!empty($orders)) {
            return redirect()->route('app-orders-list')->with('success', 'Order Deleted Successfully');
        } else {
            return redirect()->route('app-orders-list')->with('error', 'Error while Deleting Order');
        }
    }

    public function view(Request $request, $id)
    {
        $order_id = decrypt($id);

        $order_details = Order::leftJoin('order_items', 'orders.id', '=', 'order_items.order_id')
            ->leftJoin('products', 'order_items.product_id', 'products.id')
            ->where('orders.id', $order_id)
            ->select('orders.*', 'order_items.product_name', 'order_items.price', 'order_items.quantity', 'order_items.subtotal', 'products.cover_image')
            ->get();
        return view('content.apps.order.view', compact('order_details'));
    }
}
