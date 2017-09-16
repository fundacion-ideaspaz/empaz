<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{

    public function index(){
        $users = User::all();
        return view('users.index')->with(['users' => $users]);
    }

    public function create(){
        return view('users.create');
    }

    public function store(Request $request){
        $this->validate($request, [
            'nombre' => 'required|max:255',
            'correo' => 'required|email',//|unique:users',
            'cargo' => 'required|max:255',
            'password' => 'required|min:5',
        ]);
        $inputs = $request->only('nombre', 'correo', 'password', 'cargo');
        $user = User::create($inputs);
        return redirect("/users");
    }
}
