<?php

namespace App\Http\Controllers;

use App\Http\Requests\Product\CreateProductRequest;
// use App\Http\Requests\User\CreateUserRequest;
// use App\Http\Requests\User\UpdateUserRequest;
// use App\Http\Requests\User\UpdateUserProfileRequest;
use App\Http\Requests\Product\UpdateProductRequest;
use App\Models\Category;
use App\Services\ProductService;
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

class ProductController extends Controller
{
    protected ProductService $productService;
    protected RoleService $roleService;

    public function __construct(ProductService $productService, RoleService $roleService)
    {
        $this->productService = $productService;
        $this->roleService = $roleService;
        $this->middleware('permission:product-list|product-create|product-edit|product-delete', ['only' => ['index', 'show']]);
        $this->middleware('permission:product-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:product-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:product-delete', ['only' => ['destroy']]);



        // Permission::create(['name' => 'product-list', 'guard_name' => 'web', 'module_name' => 'Products']);
        // Permission::create(['name' => 'product-create', 'guard_name' => 'web', 'module_name' => 'Products']);
        // Permission::create(['name' => 'product-edit', 'guard_name' => 'web', 'module_name' => 'Products']);
        // Permission::create(['name' => 'product-delete', 'guard_name' => 'web', 'module_name' => 'Products']);

        // Permission::create(['name' => 'product-permission', 'guard_name' => 'web', 'module_name' => 'Products']);


    }


    public function index()
    {
        return view('content.apps.product.list',);
    }


    public function create()
    {

        $page_data['form_title'] = 'Add New Product';
        $page_data['page_title'] = ' Product';
        $product = null;
        $categories = Category::get();

        return view('content.apps.product.create-edit', compact('page_data', 'product', 'categories'));
    }

    public function store(CreateProductRequest $request)
    {
        try {
            $product_data['name'] = $request->input('name');
            $product_data['category_id'] = $request->input('category');
            $product_data['price'] = $request->input('price');
            $product_data['discount_price'] = $request->input('discount_price');
            $product_data['quntity'] = $request->input('quntity');
            $product_data['minimum_quntity'] = $request->input('minimum_quntity');
            $product_data['description'] = $request->input('description');
            $product_data['created_by'] = auth()->user()->id;
            $product_data['updated_by'] = auth()->user()->id;
            $product_data['status'] = $request->input('status') ? 'active' : 'inactive';
            $product_data['brand'] = $request->input('brand');
            $product_data['location'] = $request->input('location');
            $product_data['roi'] = $request->input('roi');
            $product_data['expiration_date'] = $request->input('expiration_date');
            $product_data['asin_no'] = $request->input('asin_no');
            $product_data['add_to_home'] = $request->input('add_to_home') ? '1' : '0';

            if ($request->hasFile('cover_image')) {
                $file = $request->file('cover_image');
                $fileName = time() . '_' . $file->getClientOriginalName();
                $cover_file = $file->storeAs('cover_image', $fileName, 'public');

                $product_data['cover_image'] = $cover_file;
            }

            $product = $this->productService->create($product_data);



            if (!empty($product)) {
                return redirect()->route("app-products-list")->with('success', 'Product Added Successfully');
            } else {
                return redirect()->back()->with('error', 'Error while Adding Product');
            }
        } catch (\Exception $error) {
            dd($error->getMessage());
            return redirect()->route("app-products-list")->with('error', 'Error while adding Product');
        }
    }


    public function getAll()
    {
        $products = $this->productService->getAll();

        return DataTables::of($products)
            ->addColumn('actions', function ($products) {

                $encrypt_id = encrypt($products->id);
                if (auth()->user()->can('product-edit') == true) {
                    $updateButton = "<a data-bs-toggle='tooltip' title='Edit' data-bs-delay='400' class='btn-sm border-warning'  href='" . route('app-product-edit', $encrypt_id) . "'><i class='text-warning' data-feather='edit'></i></a>";
                } else {
                    $updateButton = '';
                }


                if (auth()->user()->can('product-delete') == true) {
                    $deleteButton = "<a data-bs-toggle='tooltip' title='Delete' data-bs-delay='400' class=' btn-sm border-danger confirm-delete' data-idos='$encrypt_id' id='confirm-color  href='" . route('app-product-destroy', $encrypt_id) . "'><i class='text-danger' data-feather='trash-2'></i></a>";
                } else {
                    $deleteButton = '';
                }

                return $updateButton . " " . $deleteButton;
            })
            ->addColumn('category', function ($products) {
                // dd($products->category->name);
                return $products->category ? $products->category->name : '';
            })
            ->addColumn('description', function ($products) {
                return $products->description ? strip_tags($products->description) : '';
            })
            ->addColumn('price', function ($products) {
                return '$ ' . number_format($products->price);
            })
            ->addColumn('discount_price', function ($products) {
                return '$ ' . number_format($products->discount_price);
            })
            ->addColumn('quntity', function ($products) {
                return number_format($products->quntity);
            })
            ->addColumn('minimum_quntity', function ($products) {
                return number_format($products->minimum_quntity);
            })
            ->addColumn('status', function ($products) {
                if ($products->status == 'active') {
                    return "<span class='badge badge-light-success'>Active</span>";
                } else {
                    return "<span class='badge badge-light-danger'>Inactive</span>";
                }
            })
            ->rawColumns(['actions', 'status'])
            ->make(true);
    }


    public function edit($encrypted_id)
    {
        $page_data['form_title'] = 'Edit Product';
        $page_data['page_title'] = ' Product';
        $id = decrypt($encrypted_id);
        $product = Product::find($id);
        $categories = Category::get();
        return view('content.apps.product.create-edit', compact('page_data', 'product', 'categories'));
    }

    public function update(UpdateProductRequest $request, $encrypt_id)
    {


        try {
            $id  = decrypt($encrypt_id);
            $product_data['name'] = $request->input('name');
            $product_data['category_id'] = $request->input('category');
            $product_data['price'] = $request->input('price');
            $product_data['discount_price'] = $request->input('discount_price');
            $product_data['quntity'] = $request->input('quntity');
            $product_data['minimum_quntity'] = $request->input('minimum_quntity');
            $product_data['status'] = $request->input('status') ? 'active' : 'inactive';
            $product_data['brand'] = $request->input('brand');
            $product_data['location'] = $request->input('location');
            $product_data['roi'] = $request->input('roi');
            $product_data['expiration_date'] = $request->input('expiration_date');
            $description = $request->input('description');
            $product_data['asin_no'] = $request->input('asin_no');
            $product_data['add_to_home'] = $request->input('add_to_home') ? '1' : '0';

            if ($description != null) {
                $product_data['description'] = $request->input('description');
            }

            $product_data['updated_by'] = auth()->user()->id;

            // dd($product_data);
            if ($request->hasFile('cover_image')) {
                $file = $request->file('cover_image');
                $fileName = time() . '_' . $file->getClientOriginalName();
                $cover_file = $file->storeAs('cover_image', $fileName, 'public');

                $product_data['cover_image'] = $cover_file;
            }


            $product = $this->productService->update($product_data, $id);


            if (!empty($product)) {

                return redirect()->route('app-products-list')->with('success', 'Product Updated successfully');
            } else {

                return redirect()->route('app-products-list')->with('error', 'Error while Updating Product');
            }
        } catch (\Exception $error) {
            dd($error->getMessage());
            return redirect()->route('app-products-list')->with('error', 'Error while Updating Product');
        }
    }

    public function destroy($encrypted_id)
    {
        $id = decrypt($encrypted_id);
        $product = $this->productService->destroy($id);

        if (!empty($product)) {
            return redirect()->route('app-products-list')->with('success', 'Product Deleted Successfully');
        } else {
            return redirect()->route('app-products-list')->with('error', 'Error while Deleting Product');
        }
    }


    public function destroy_cover_image($id)
    {
        // $product_data = Product::find($id);

        $product = Product::findOrFail($id);

        if ($product->cover_image) {
            Storage::delete('public/' . $product->cover_image);

            $product->update(['cover_image' => null]);

            return response()->json(['success' => true, 'message' => 'Image deleted successfully!']);
        }
    }
}
