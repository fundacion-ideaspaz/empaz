<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function create(){
        return view('users.create');
    }

    public function store(Request $request){
        $request->validate([
            'texto' => 'required|max:255',
            'descripcion' => 'required|max:255',
            'tiporespuesta' => 'required|max:255',
            'textorespuesta' => 'required|max:255',
        ]);
        $inputs = $request->only('texto', 'descripcion', 'tipoderespuesta', 'textorespuesta');
        return $inputs['nombre'];
    }
}
