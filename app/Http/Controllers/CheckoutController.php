<?php
namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderItem;
use Cart;
use Auth;
use PDF;
use Mail;
use App\Mail\OrderConfirmation;

class CheckoutController extends Controller
{
    public function checkout()
    {
        $page_title = 'Checkout';
        $cartItems = \Cart::session(Auth::id())->getContent();
        $subtotal = \Cart::session(Auth::id())->getSubTotal();
        $total = \Cart::session(Auth::id())->getTotal();

        return view('site.checkout', compact('cartItems', 'subtotal', 'total', 'page_title'));
    }


    public function placeOrder(Request $request)
    {
        if (!Auth::check()) {
            return redirect('/site-login');
        }

        $user = Auth::user();
        $cartItems = Cart::session($user->id)->getContent();
        $totalPrice = Cart::session($user->id)->getTotal();
        $subtotal = \Cart::session(Auth::id())->getSubTotal();

        if ($cartItems->isEmpty()) {
            return redirect()->back()->with('error', 'Your cart is empty.');
        }

        // Generate a unique order number
        $orderNumber = 'ORD-' . strtoupper(uniqid());
        $address = $request->address . '<br>' .
            (!empty($request->apartment) ? $request->apartment . '<br>' : '') .
            $request->city . ', ' . $request->state . ' - ' . $request->zip . '<br>' .
            $request->country;

        // Create Order
        $order = Order::create([
            'order_number' => $orderNumber,
            'user_id' => $user->id,
            'total_price' => $totalPrice,
            'shipping_address' => $address,
            'status' => 'pending',
        ]);
        // dd($order);

        // Save Order Items & Update Product Stock
        foreach ($cartItems as $item) {
            $product = Product::find($item->id);

            if ($product) {
                // Check if there is enough stock
                if ($product->quntity < $item->quantity) {
                    return redirect()->back()->with('error', 'Not enough stock for ' . $item->name);
                }

                // Deduct the ordered quantity from stock
                $product->decrement('quntity', $item->quantity);
            }

            OrderItem::create([
                'order_id' => $order->id,
                'product_id' => $item->id,
                'product_name' => $item->name,
                'price' => $item->price,
                'quantity' => $item->quantity,
                'subtotal' => $subtotal,
            ]);
        }

        // Clear Cart
        Cart::session($user->id)->clear();

        // Generate PDF
        $pdf = PDF::loadView('pdf.order_invoice', compact('order', 'cartItems', 'totalPrice'));

        // Send Email to User & Admin
        Mail::to($user->email)->send(new OrderConfirmation($order, $pdf));
        Mail::to('pradip12345.pv@gmail.com')->send(new OrderConfirmation($order, $pdf));

        return redirect()->route('order.success')->with('success', 'Order placed successfully!');
    }

    public function show($orderId)
{
    $orders = Order::with(['items.product', 'user'])->latest()->get();
    return view('orders.index', compact('orders'));
    // return view('orders.show', compact('order'));
}
}
