<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CompanyController extends Controller
{
    public function create(){
        return view('company.create');
    }

    public function store(Request $request){
        $request->validate([
            'nombre' => 'required|max:255',
            'direccion' => 'required|max:255',
            'departamento' => 'required|max:255',
            'municipio' => 'required|max:255',
            'telefono' => 'required|max:255',
            'sitioweb' => 'required|max:255',
            'cargo' => 'required|max:255',
            'nit' => 'required|max:255',
            'sector' => 'required|max:255',
            'tamano' => 'required|max:255',
            'nit' => 'required|max:255',
            'numerotrabajadores' => 'required|max:255',
            'ciudadprincipal' => 'required|max:255',
            'operacion' => 'required|max:255',
        ]);
        $inputs = $request->only('nombre', 'direccion', 'departamento', 'municipio', 'telefono', 'sitioweb', 'cargo', 'nit', 'sector', 'tamano', 'nit', 'numerotrabajadores', 'ciudadprincipal', 'operacion');
        return $inputs['nombre'];
    }
}
