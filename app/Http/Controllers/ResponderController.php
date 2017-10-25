<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cuestionario;

class ResponderController extends Controller
{
    public function index($id)
    {
        $cuestionario = Cuestionario::find($id);
        return view('cuestionario')->with(['cuestionario' => $cuestionario]);
    }
}
