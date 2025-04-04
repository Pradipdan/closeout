<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Darryldecode\Cart\Facades\CartFacade as Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth'); // Ensure only logged-in users can access the cart
    }

    // Add Item to Cart
    public function addToCart(Request $request)
    {
        if (!Auth::check()) {
            return response()->json(['message' => 'Unauthorized', 'redirect' => url('/site-login')], 401);
        }
        $product = Product::where('id', $request->product_id)->first();
        // dd($request->all(), $product);
        $userId = Auth::id();

        // dd($userId,'lll');
       \Cart::session($userId)->add([
            'id' => $product->id??'',
            'name' => $product->name??'',
            'price' => $product->discount_price??'',
            'quantity' => $request->quantity ?? $product->minimum_quntity,
            'attributes' => []
        ]);
        // dd($hhh);

        return response()->json(['message' => 'Item added to cart!']);
    }


    public function cartCount()
    {
        $userId = Auth::id();
        $count = \Cart::session($userId)->getTotalQuantity();

        return response()->json(['count' => $count]);
    }

    // Get Cart Items for the User
    public function getCart()
    {
        $userId = Auth::id();
        $cartItems = Cart::session($userId)->getContent();

        return response()->json($cartItems);
    }

    // Update Cart Item
    public function updateCart(Request $request)
    {
        $userId = Auth::id();

        // Fetch product details
        $product = Product::find($request->id);

        // dd($product);
        if (!$product) {
            return response()->json(['message' => 'Product not found'], 404);
        }

        // Ensure quantity is within allowed limits
        $newQuantity =  $request->quantity;
        $minQuantity =  $product->minimum_quntity;
        $maxQuantity = (int) $product->quntity; // Available stock
        if ($newQuantity < $minQuantity) {
            return response()->json(['status' => 'error', 'message' => "Minimum quantity is $minQuantity"], 400);
        }

        if ($newQuantity > $maxQuantity) {
            return response()->json(['status' => 'error', 'message' => "Only $maxQuantity in stock"], 400);
        }

        // Update cart with validated quantity
        Cart::session($userId)->update($request->id, [
            'quantity' => [
                'relative' => false,
                'value' => $newQuantity
            ],
        ]);
        return response()->json(['status' => 'success', 'message' => 'Cart updated', 'quantity' => $newQuantity]);
        // return response()->json(['message' => 'Cart updated', 'quantity' => $newQuantity]);
    }


    // Remove Item from Cart
    public function removeItem($id)
    {
        $userId = Auth::id();

        Cart::session($userId)->remove($id);

        return response()->json(['message' => 'Item removed from cart']);
    }

    // Clear Cart
    public function clearCart()
    {
        $userId = Auth::id();

        Cart::session($userId)->clear();

        return response()->json(['message' => 'Cart cleared']);
    }
    public function showCart()
    {
        $userId = Auth::id();
        $page_title = 'cart';

        $cartItems = \Cart::session($userId)->getContent();
        foreach ($cartItems as $item) {
            $product = Product::find($item->id);
            if ($product) {
                $item->attributes->image = $product->cover_image; // Ensure the image is accessible
            }
        }
        $subtotal = \Cart::session($userId)->getSubTotal();
        $total = \Cart::session($userId)->getTotal();
        // dd($cartItems, $subtotal);
        return view('site.cart', compact('cartItems', 'subtotal', 'total', 'page_title'));
    }
    public function cartItems()
    {

        $userId = Auth::id();
        $cartItems = \Cart::session($userId)->getContent();

        $html = '';
        foreach ($cartItems as $item) {
            $html .= '<li class="dropdown-item">' . $item->name . ' - ' . $item->quantity . ' × ' . $item->price . '</li>';
        }

        return response()->json(['html' => $html]);
    }
}
