<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cuestionario;

class ResponderController extends Controller
{
    public function index($id)
    {
        $cuestionario = Cuestionario::find($id);
        if($cuestionario->estado === 'inactivo'){
            return redirect('/home');
        }
        return view('cuestionario')->with(['cuestionario' => $cuestionario]);
    }

    public function store($id, Request $request)
    {
        // Validate and save the answers to the cuestionario.
        return redirect('home');
    }
}
