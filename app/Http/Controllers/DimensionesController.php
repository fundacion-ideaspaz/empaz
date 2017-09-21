<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Dimension;
use Storage;

class DimensionesController extends Controller
{

    public function index(){
        $dimensiones = Dimension::all();
        return view("dimensiones.index")->with(["dimensiones" => $dimensiones]);
    }

    public function create(){
        return view("dimensiones.create");
    }

    public function store(Request $request){
        $validations = [
            "nombre" => "required",
            "descripcion" => "required",
            "nivel_importancia" => "required"
        ];
        $this->validate($request, $validations);
        $logo = Storage::disk('local')->putFile('dimensiones', $request->file("logo"));
        $inputs = $request->all();
        $inputs["logo"] = $logo;
        $dimension = Dimension::create($inputs);
        return redirect("/dimensiones");
    }
}
