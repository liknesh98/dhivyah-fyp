<?php

namespace App\Http\Controllers\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
// use Illuminate\Support\Facades\Auth;
use DB;
use Auth;

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


    protected function attemptLogin(Request $request)
    {

        $credentials = $request->only($this->username(), 'password', 'role');
        $username    = $credentials[$this->username()];
        $password    = $credentials['password'];
        $role        = $credentials['role'];


        if (Auth::attempt($credentials) )
        {
            // return redirect()->route('home');

            if ($role == 1)
            {
                return redirect()->route('s_dashboard');

            }
            else if($role == 2 )
            {
                return redirect()->route('notes');

            }
            else if ($role == 3)
            {
                return redirect()->route('a_announcement');

            }

        }



        return $this->sendFailedLoginResponse($request);


    }


    public function logout(Request $request) {
        Auth::logout();
        return redirect('/');
      }
}
