<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FormController extends Controller
{
  public function index(){
      $forms = Form::all();
      return view('form.index')->with(['forms' => $forms]);
  }

    public function create(){
        return view('form.create');
    }

    public function store(Request $request){
        $request->validate([
            'nombre' => 'required|max:255',
            'version' => 'required|max:255',
            'estado' => 'required|max:255',
        ]);
        $inputs = $request->only('nombre', 'version', 'estado');
        $form = Form::create($inputs);
        return redirect("/form");
    }
}
