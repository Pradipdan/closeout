<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers {
        logout as performLogout;
    }

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected function redirectTo()
    {
        if (Auth::user()->hasRole('User')) {
            return '/'; // Redirect to home if the user has "User" role
        }
        return '/app/users/list'; // Default redirect for other roles
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
    public function logout(Request $request)
    {
        $redirect = '';
        if (auth()->user()) {
            $user = auth()->user();
            $redirect = $user->hasRole('User');
        }
        // dd($redirect);
        if ($redirect) {
            $this->performLogout($request);

            return redirect()->route('site.login');
        }
        $this->performLogout($request);
        return redirect()->route('site.login');
    }
}
