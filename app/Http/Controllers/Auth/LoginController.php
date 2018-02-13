<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
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
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function authenticate(Request $request)
    {
        $email = $request['email'];
        $password = $request['password'];
        $credentials = [
            'email' => $email,
            'password' => $password,
            'estado' => 'activo'
        ];
        if (Auth::attempt($credentials))
        {
            return redirect()->intended('home');
        }
        else
        {
            return view('auth.login')->withErrors([
                "auth" => "Datos incorrectos. Vuelve a intentarlo."
            ]);
        }
    }
}
