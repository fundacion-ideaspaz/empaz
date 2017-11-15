<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
Use Auth;
use App\User;

class ProfileController extends Controller
{
    public function activateAccount($id, $code)
    {
        $user = User::find($id);
        if ($user->confirmation_code == $code) {
            $user->estado = 'activo';
            $user->confirmation_code = '';
            $user->save();
        }
        Auth::login($user);
        return redirect('/home');
    }

    public function profileEmpresa(){
        return view('profile.empresa');
    }

    public function profileUser(){
        return view('profile.user');
    }
}
