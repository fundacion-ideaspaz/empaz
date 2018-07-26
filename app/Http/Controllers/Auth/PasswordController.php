<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ResetsPasswords;

class PasswordController extends Controller

{
    /*
  |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset requests
    | and uses a simple trait to include this behavior. You're free to
    | explore this trait and override any methods you wish to tweak.
    |
    */

    use ResetsPasswords;

    protected $redirectTo = '/dashboard';

    /**
     * Create a new password controller instance.
     *

     * @return void
     */

    public function __construct()
    {
        $this->middleware('guest');
    }


    /**
     * Get the password reset validation rules.
     *
     * @return array
     */

    // protected function getResetValidationRules()
    // {
    //     return [
    //         'password' => 'required|confirmed|min:8',
    //     ];
    //
    // }

    /**
     * Get the password reset validation messages.
     *
     * @return array
     */

    protected function getResetValidationMessages()
    {
        return [
          // 'password.min' => 'Password must contain at least 1 lower-case and capital letter, a number and symbol.'
        ];
    }
}
