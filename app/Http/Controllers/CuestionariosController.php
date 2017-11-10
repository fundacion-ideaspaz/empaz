<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cuestionario;
use App\Dimension;
use App\DimensionCuestionario;

class CuestionariosController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'experto']);
    }

    public function index()
    {
        $cuestionarios = Cuestionario::all();
        return view("cuestionarios.index")->with([
            "cuestionarios" => $cuestionarios
        ]);
    }

    public function create()
    {
        return view("cuestionarios.create");
    }

    public function store(Request $request)
    {
        $validations = [
            "nombre" => "required",
            "descripcion" => "required",
            "estado" => "required",
            "version" => "required|integer"
        ];
        $this->validate($request, $validations);
        $preguntas = $request["preguntas"];
        $cuestionario = $request->except('preguntas');
        $newCuestionario = Cuestionario::create($cuestionario);
        return redirect("/cuestionarios/".$newCuestionario->id."/dimensiones");
    }

    public function edit($id)
    {
        $cuestionario = Cuestionario::find($id);
        return view("cuestionarios.edit")->with([
            "cuestionario" => $cuestionario
        ]);
    }

    public function update($id, Request $request)
    {
        $validations = [
            "nombre" => "required",
            "descripcion" => "required",
            "estado" => "required",
            "version" => "required|integer"
        ];
        $this->validate($request, $validations);
        $inputs = $request->except("preguntas");
        $cuestionario = Cuestionario::find($id);
        $cuestionario->update($inputs);
        $cuestionario->save();
        return redirect("/cuestionarios");
    }

    public function show($id)
    {
        return redirect("/cuestionarios/".$id."/edit");
    }

    public function delete($id, Request $request)
    {
        return view("cuestionarios.delete")->with(["id" => $id]);
    }

    public function deleteConfirm($id, Request $request)
    {
        $cuestionario = Cuestionario::find($id);
        $cuestionario->delete();
        return redirect('/cuestionarios');
    }

    public function storeDimensiones($id, $dimension_id, Request $request)
    {
        $validations = [
            "importancia" => "required"
        ];
        $this->validate($request, $validations);
        $importancia = $request->importancia;
        $importancias = DimensionCuestionario
            ::where("cuestionario_id", "=", $id)
            ->pluck("importancia");
        $importanciaTotal = 0;
        foreach($importancias as $imp){
            $importanciaTotal += $imp;
        }
        if($importanciaTotal + $importancia > 100){
            return redirect("/cuestionarios/".$id."/dimensiones")->withErrors([
                "errors" => "La suma de la importancia de las dimensiones no puede superar el 100%"
            ]);
        }
        $dimensionCuestionario = new DimensionCuestionario();
        $dimensionCuestionario->cuestionario_id = $id;
        $dimensionCuestionario->dimension_id = $dimension_id;
        $dimensionCuestionario->importancia = $importancia;
        $dimensionCuestionario->save();
        return redirect("/cuestionarios/".$id."/dimensiones");
    }

    public function deleteDimensiones($id, $dimension_id, Request $request)
    {
        $dimensionCuestionario = DimensionCuestionario
            ::where("cuestionario_id", "=", $id)
            ->where("dimension_id", "=", $dimension_id)->first();
        $dimensionCuestionario->delete();
        return redirect("/cuestionarios/".$id."/dimensiones");
    }
}
