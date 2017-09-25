<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CompanyController extends Controller
{

    public function index(){
        $companies = Company::all();
        return view('company.index')->with(['companies' => $companies]);
    }

    public function create(){
        return view('company.create');
    }

    public function show($id){
        return redirect("/users/".$id."/edit");
    }

    public function edit($id){
        $user = User::find($id);
        return view("users.edit")->with(["user" => $user, "role" => $user->role, "roles" => $this->rolesSelect]);
    }

    public function update($id, Request $request){
        $user = User::find($id);
        if(!$request->password){
            $user->update($request->except('password'));
        }else{
            $request["password"] = bcrypt($request->password);
            $user->update($request->all());
            $user->save();
        }
        return redirect("/users");
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
        $company = Company::create($inputs);
        return redirect("/company");
    }
}
