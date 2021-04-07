<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

class AdminLoginController extends Controller
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
    $this->middleware('guest:admin')->except('logout');
  }

  // Login
  public function showLoginForm()
  {
    $pageConfigs = ['bodyCustomClass' => 'bg-full-screen-image blank-page', 'navbarType' => 'hidden'];

    return view('auth/admin-login', ['pageConfigs' => $pageConfigs]);
  }

  public function login(Request $request)
  {
    // Validate form data
    $this->validate($request,
      [
        'email' => 'required|string|email',
        'password' => 'required|string|min:8'
      ]);

    // Attempt to login as admin
    if (auth()->guard('admin')->attempt(['email' => $request->email, 'password' => $request->password], $request->remember))
    {
      // if successful redirect to admin dashboard
      return redirect()->intended(route('admin.dashboard'));
    }

    // If unsuccessful
    return redirect()->back()->withInput($request->only('email', 'remember'));
  }

  public function logout(Request $request)
  {
    auth()->guard('admin')->logout();
    return redirect('/');
  }
}
