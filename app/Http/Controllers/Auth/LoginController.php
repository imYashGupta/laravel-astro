<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

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

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    protected function redirectTo()
    {   //auth()->user()->role_id ;
        if (auth()->user()->role == 'ADMIN') {
            return '/admin';
        }
        return '/';
    }

    public function authenticated(Request $request, $user)
    {
        if(!$user->email_verified_at) {
           // $user->sendEmailVerificationNotification();
            Auth::logout();
            return $request->wantsJson()
                    ? response()->json(["message" => "Email not verified"], 403)
                    : redirect()->back()->with("error","Email not verified.");
        }
    }
}
