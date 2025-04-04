<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateUserRequest;
use App\Models\Category;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Services\HomeService;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use PhpOffice\PhpSpreadsheet\Calculation\Statistical\Distributions\F;

class HomeController extends Controller
{



    protected HomeService $homeService;

    public function __construct(HomeService $homeService)
    {
        $this->homeService = $homeService;
    }
    public function index()
    {
        $categories = Category::where('status', 'active')
            ->where('add_to_home', '1')
            ->orderBy('created_at', 'desc')
            ->take(8)
            ->get();

        $products = Product::join('categories', 'products.category_id', '=', 'categories.id')
            ->where('products.status', 'active')
            ->where('products.add_to_home', '1')
            ->where('categories.deleted_at', null)
            ->where('categories.status', 'active') // Ensure the category is active
            ->orderBy('products.created_at', 'desc')
            ->take(8)
            ->select('products.*') // Select only product columns to avoid conflicts
            ->get();

        // dd($products);
        return view('site.index', compact('products', 'categories'));
    }


    public function knowledgeBase()
    {
        $page_title = 'Knowledge Base';
        return view('site.knowledge_base', compact('page_title'));
    }

    public function signIn()
    {
        return view('site.sign-in');
    }

    public function siteUserAdd(CreateUserRequest $request)
    {
        $user_data['first_name'] = $request->input('first_name');
        $user_data['last_name'] = $request->input('last_name');
        $user_data['email'] = $request->input('email');
        $user_data['password'] = Hash::make($request->input('password'));
        $user_data['phone_no'] = $request->input('phone_no');

        $user = $this->homeService->create($user_data);
        $user->assignRole('user');
        if (!empty($user)) {
            Auth::login($user);
            return redirect()->route('site.index')->with('success', 'User Added Successfully');
        } else {
            return redirect()->back()->with('error', 'Error while Adding User');
        }
    }



    public function logIn()
    {
        return view('site.login');
    }



    public function get_all_site_categories()
    {
        $categories = Category::where('status', 'active')
            ->where('add_to_home', '1')
            ->orderBy('created_at', 'desc')
            ->paginate(8);

        $page_title = 'Categories';


        return view('site.category_list', compact('categories', 'page_title'));
    }

    public function get_category_vise_product($id)
    {
        // $id = decrypt($id);
        $id = decrypt($id);
        $category = Category::find($id);
        $products = Product::where('category_id', $id)->where('status', 'active')->where('add_to_home', '1')
            ->orderBy('created_at', 'desc')
            ->paginate(8);

        $page_title = 'Products of ' . $category->name;

        return view('site.category_vise_product', compact('products', 'page_title'));
    }

    public function get_all_site_products()
    {
        $products = Product::where('status', 'active')
            ->where('add_to_home', '1')
            ->orderBy('created_at', 'desc')
            ->paginate(8);

        $page_title = 'Products';

        return view('site.product_list', compact('products', 'page_title'));
    }

    public function view_site_product_detail($id)
    {
        $id = decrypt($id);

        $product = Product::where('id', $id)->first();

        $page_title = 'Product Details';

        return view('site.product_detail', compact('product', 'page_title'));
    }
    public function profile()
    {
        $orders = Order::with('items.product')
            ->where('user_id', Auth::id()) // Filter orders by logged-in user
            ->latest()
            ->paginate(3);
        $page_title = 'My Orders';
        return view('site.order.index', compact('orders', 'page_title'));
    }
    public function account()
    {
        $user = Auth::user();
        $page_title = 'Account Settings';
        return view('site.account.setting', compact('user', 'page_title'));
    }
}
