<?php

use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\MailController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UsersController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthenticationController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\WishlistController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\AccountController;

/*
|--------------------------------------------------------------------------
| Web Routesf
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Main Page Route
// Route::get('/', function () {
//     return redirect('/login');
// });


// site route

Route::get('/', [HomeController::class, 'index'])->name('site.index');

Route::get('/knowledge-base', [HomeController::class, 'knowledgeBase'])->name('site.knowledge_base');

Route::get('/sign-in', [HomeController::class, 'signIn'])->name('site.sign-in');


Route::post('/site_user_add', [HomeController::class, 'siteUserAdd'])->name('site.user_add');
Route::get('/site-login', [HomeController::class, 'logIn'])->name('site.login');

Route::get('get_all_site_categories', [HomeController::class, 'get_all_site_categories'])->name('get_all_site_categories');

Route::get('get_category_vise_product/{id}', [HomeController::class, 'get_category_vise_product'])->name('get_category_vise_product');


Route::get('products', [HomeController::class, 'get_all_site_products'])->name('get_all_site_products');

Route::get('view_site_product_detail/{id}', [HomeController::class, 'view_site_product_detail'])->name('view_site_product_detail');

// cardt

Route::middleware('auth')->group(function () {
    // Route::get('/cart-page', [CartController::class, 'cart_page']);
    Route::get('/cart-page', [CartController::class, 'showCart'])->name('cart.show');
    Route::get('/cart-page-ll', [CartController::class, 'showCart'])->name('checkout');
    Route::get('/cart/count', [CartController::class, 'cartCount'])->name('cart.count');
    Route::get('/cart/items', [CartController::class, 'cartItems'])->name('cart.items');

    Route::post('/cart/add', [CartController::class, 'addToCart'])->name('cart.add');;
    Route::get('/cart', [CartController::class, 'getCart']);
    Route::post('/cart/update', [CartController::class, 'updateCart']);
    Route::delete('/cart/remove/{id}', [CartController::class, 'removeItem']);
    Route::delete('/cart/clear', [CartController::class, 'clearCart']);


    // Route::post('/add-to-cart', [CartController::class, 'addToCart'])
    // Route::post('/add-to-wishlist', [WishlistController::class, 'addToWishlist'])->name('wishlist.add');

    Route::get('/checkout', [CheckoutController::class, 'checkout'])->name('checkout');
    Route::post('/place-order', [CheckoutController::class, 'placeOrder'])->name('place.order');
    Route::get('/orders', [HomeController::class, 'profile'])->name('order.success');
    // });
    // Route::middleware(['auth'])->group(function () {
    Route::get('/wishlist', [WishlistController::class, 'index'])->name('wishlist.index');
    Route::post('/wishlist', [WishlistController::class, 'store'])->name('wishlist.store');
    Route::post('/wishlist/toggle', [WishlistController::class, 'toggle'])->name('wishlist.toggle');
    Route::delete('/wishlist/{id}', [WishlistController::class, 'destroy'])->name('wishlist.destroy');
    Route::get('/wishlist', [WishlistController::class, 'index'])->name('wishlist.index');
    Route::get('/account', [HomeController::class, 'account'])->name('home.profile');
    // Route::delete('/wishlist/{id}', [WishlistController::class, 'destroy'])->name('wishlist.destroy');

    // Route::post('/cart/add', [CartController::class, 'addToCart'])->name('cart.add');

    Route::put('/account/update', [AccountController::class, 'update'])->name('account.update');
    Route::put('/account/update-password', [AccountController::class, 'updatePassword'])->name('account.updatePassword');
    Route::delete('/account/delete', [AccountController::class, 'destroy'])->name('account.delete');
});


// admin panel route
Route::post('/login', [LoginController::class, 'login'])->name('login');
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::any('/logout', [LoginController::class, 'logout'])->name('logout');

// Forgot Password routes
Route::get('/password/reset', [ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request');
Route::post('/password/email', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');

// Reset Password routes
Route::get('/password/reset/{token}', [ResetPasswordController::class, 'showResetForm'])->name('password.reset');
Route::post('/password/reset', [ResetPasswordController::class, 'reset'])->name('password.update');



Route::group(['prefix' => 'auth'], function () {
    Route::get('login-basic', [AuthenticationController::class, 'login_basic'])->name('auth-login-basic');
    Route::get('login-cover', [AuthenticationController::class, 'login_cover'])->name('auth-login-cover');
    Route::get('register-basic', [AuthenticationController::class, 'register_basic'])->name('auth-register-basic');
    Route::get('register-cover', [AuthenticationController::class, 'register_cover'])->name('auth-register-cover');
    Route::get('forgot-password-basic', [AuthenticationController::class, 'forgot_password_basic'])->name('auth-forgot-password-basic');
    Route::get('forgot-password-cover', [AuthenticationController::class, 'forgot_password_cover'])->name('auth-forgot-password-cover');
    Route::get('reset-password-basic', [AuthenticationController::class, 'reset_password_basic'])->name('auth-reset-password-basic');
    Route::get('reset-password-cover', [AuthenticationController::class, 'reset_password_cover'])->name('auth-reset-password-cover');
    Route::get('verify-email-basic', [AuthenticationController::class, 'verify_email_basic'])->name('auth-verify-email-basic');
    Route::get('verify-email-cover', [AuthenticationController::class, 'verify_email_cover'])->name('auth-verify-email-cover');
    Route::get('two-steps-basic', [AuthenticationController::class, 'two_steps_basic'])->name('auth-two-steps-basic');
    Route::get('two-steps-cover', [AuthenticationController::class, 'two_steps_cover'])->name('auth-two-steps-cover');
    Route::get('register-multisteps', [AuthenticationController::class, 'register_multi_steps'])->name('auth-register-multisteps');
    Route::get('lock-screen', [AuthenticationController::class, 'lock_screen'])->name('auth-lock_screen');
});




Route::group(['prefix' => 'app', 'middleware' => 'auth'], function () {
    Route::get('permissions', [RoleController::class, 'permissions_list'])->name('app-permissions-list');
    Route::get('roles/list', [RoleController::class, 'index'])->name('app-roles-list');
    Route::get('send/mail', [MailController::class, 'sendMail'])->name('send-mail');


    Route::get('/profile/{encrypted_id}', [UsersController::class, 'profile'])->name('profile.show');
    Route::post('/profile/update/{encrypted_id}', [UsersController::class, 'updateProfile'])->name('profile-update');

    // =============================================================================================================================

    //   ROLE AND USER CONTROLLER

    // =============================================================================================================================

    // Roles Start
    Route::get('roles/list', [RoleController::class, 'index'])->name('app-roles-list');
    Route::get('roles/getAll', [RoleController::class, 'getAll'])->name('app-roles-get-all');
    Route::post('roles/store', [RoleController::class, 'store'])->name('app-roles-store');
    Route::get('roles/add', [RoleController::class, 'create'])->name('app-roles-add');
    Route::get('roles/edit/{encrypted_id}', [RoleController::class, 'edit'])->name('app-roles-edit');
    Route::put('roles/update/{encrypted_id}', [RoleController::class, 'update'])->name('app-roles-update');
    Route::get('roles/destroy/{encrypted_id}', [RoleController::class, 'destroy'])->name('app-roles-delete');
    /* Roles Routes End */

    //User start
    Route::get('users/list', [UsersController::class, 'index'])->name('app-users-list');
    Route::get('users/add', [UsersController::class, 'create'])->name('app-users-add');
    Route::post('users/store', [UsersController::class, 'store'])->name('app-users-store');
    Route::get('users/edit/{encrypted_id}', [UsersController::class, 'edit'])->name('app-users-edit');
    Route::put('users/update/{encrypted_id}', [UsersController::class, 'update'])->name('app-users-update');
    Route::get('users/destroy/{encrypted_id}', [UsersController::class, 'destroy'])->name('app-users-destroy');
    Route::get('users/getAll', [UsersController::class, 'getAll'])->name('app-users-get-all');

    Route::get('site-users/list', [UsersController::class, 'siteUserIndex'])->name('app-site-users-list');
    Route::get('site-users/getAllSiteUsers', [UsersController::class, 'getAllSiteUsers'])->name('app-site-users-get-all');





    //User End

    // categroy start

    Route::get('categories/list', [CategoryController::class, 'index'])->name('app-categories-list');
    Route::get('category/add', [CategoryController::class, 'create'])->name('app-category-add');
    Route::post('category/store', [CategoryController::class, 'store'])->name('app-category-store');
    Route::get('categories/getAll', [CategoryController::class, 'getAll'])->name('app-categories-get-all');
    Route::get('category/edit/{encrypted_id}', [CategoryController::class, 'edit'])->name('app-category-edit');
    Route::put('category/update/{encrypted_id}', [CategoryController::class, 'update'])->name('app-category-update');
    Route::get('category/destroy/{encrypted_id}', [CategoryController::class, 'destroy'])->name('app-category-destroy');

    Route::delete('category/destroy/image/{id}', [CategoryController::class, 'destroy_file'])
        ->name('category-destroy-image');

    Route::post('/update-category-status', [CategoryController::class, 'updateCategoryStatus'])->name('update-category-status');


    Route::get('products/list', [ProductController::class, 'index'])->name('app-products-list');
    Route::get('product/add', [ProductController::class, 'create'])->name('app-product-add');
    Route::post('product/store', [ProductController::class, 'store'])->name('app-product-store');
    Route::get('products/getAll', [ProductController::class, 'getAll'])->name('app-products-get-all');
    Route::get('product/edit/{encrypted_id}', [ProductController::class, 'edit'])->name('app-product-edit');
    Route::put('product/update/{encrypted_id}', [ProductController::class, 'update'])->name('app-product-update');
    Route::get('product/destroy/{encrypted_id}', [ProductController::class, 'destroy'])->name('app-product-destroy');
    Route::delete('product/destroy/cover_image/{id}', [ProductController::class, 'destroy_cover_image'])
        ->name('app-product-destroy-cover-image');



    // Routes For Orders Starts

    Route::get('orders/list', [OrderController::class, 'index'])->name('app-orders-list');
    Route::get('orders/getAll', [OrderController::class, 'getAll'])->name('app-orders-get-all');
    Route::get('orders/edit/{encrypted_id}', [OrderController::class, 'edit'])->name('app-orders-edit');
    Route::get('orders/destroy/{encrypted_id}', [OrderController::class, 'destroy'])->name('app-orders-destroy');
    Route::post('/orders/update-status', [OrderController::class, 'updateStatus'])->name('order.updateStatus');
    Route::get('/orders/view/{id}', [OrderController::class, 'view'])->name('app-orders-view');



    // Routes For Order Ends
});
/* Route Apps */
