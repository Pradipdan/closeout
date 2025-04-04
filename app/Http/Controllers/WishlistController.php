<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\Product;
use App\Models\Wishlist;
use Illuminate\Support\Facades\Auth;
use Darryldecode\Cart\Facades\CartFacade as Cart;

class WishlistController extends Controller
{
    // public function addToWishlist(Request $request)
    // {
    //     $userId = Auth::id();
    //     $wishlist = session()->get("wishlist_$userId", []);

    //     if (!in_array($request->id, $wishlist)) {
    //         $wishlist[] = $request->id;
    //         session()->put("wishlist_$userId", $wishlist);
    //     }

    //     return response()->json(['message' => 'Item added to wishlist']);
    // }
    public function index()
    {
        $user = Auth::user(); // Get authenticated user

        if (!$user) {
            return redirect()->route('login')->with('error', 'Please login to view your wishlist.');
        }

        $wishlist = $user->wishlist()->with('product')->get();

        // Get cart items for the logged-in user
        $cartItems = Cart::session($user->id)->getContent();
        $cartProductIds = $cartItems->keys()->toArray(); // Get array of product IDs in cart
        $page_title = 'Wishlist';
        return view('site.wishlist.index', compact('wishlist', 'cartProductIds', 'page_title'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
        ]);

        Wishlist::firstOrCreate([
            'user_id' => Auth::id(),
            'product_id' => $request->product_id,
        ]);

        return back()->with('success', 'Product added to wishlist');
    }

    public function destroy($id)
    {
        // dd($id);
        $wishlist = Wishlist::where('user_id', Auth::id())->where('id', $id)->first();
        if ($wishlist) {
            $wishlist->delete();
            return back()->with('success', 'Removed from wishlist');
        }
        return back()->with('error', 'Item not found');
    }
    public function toggle(Request $request)
    {
        $userId = Auth::id();
        $productId = $request->product_id;

        // Check if the product is already in the wishlist
        $wishlist = Wishlist::where('user_id', $userId)->where('product_id', $productId)->first();

        if ($wishlist) {
            // Remove from wishlist
            $wishlist->delete();
            return response()->json(['status' => 'removed']);
        } else {
            // Add to wishlist
            Wishlist::create([
                'user_id' => $userId,
                'product_id' => $productId,
            ]);
            return response()->json(['status' => 'added']);
        }
    }
}
