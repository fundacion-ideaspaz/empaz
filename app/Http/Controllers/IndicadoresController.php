<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Indicador;
use App\Dimension;
use Storage;

class IndicadoresController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'experto']);
    }

    public function index()
    {
        $indicadores = Indicador::all();
        return view("indicadores.index")->with([
            "indicadores" => $indicadores
        ]);
    }

    public function create()
    {
        $dimensiones = Dimension::all();
        return view("indicadores.create")->with(["dimensiones" => $dimensiones]);
    }

    public function store(Request $request)
    {
        $validations = [
            "nombre" => "required",
            "descripcion" => "required",
            "nivel_importancia" => "required",
            "dimensiones" => "required|array"
        ];
        $this->validate($request, $validations);
        $inputs = $request->all();
        $indicador = Indicador::create($inputs);
        return redirect("/indicadores");
    }

    public function edit($id)
    {
        $indicador = Indicador::find($id);
        $dimensiones = [];
        foreach ($indicador->dimensiones as $dimension) {
            $dimension_obj = Dimension::find($dimension);
            array_push($dimensiones, $dimension_obj);
        }
        $restDimensiones = Dimension::whereNotIn("_id", $indicador->dimensiones)->get();
        return view("indicadores.edit")->with([
            "indicador" => $indicador,
            "dimensiones" => $dimensiones,
            "restDimensiones" => $restDimensiones
        ]);
    }

    public function update($id, Request $request)
    {
        $validations = [
            "nombre" => "required",
            "descripcion" => "required",
            "nivel_importancia" => "required",
            "dimensiones" => "required|array"
        ];
        $this->validate($request, $validations);
        $inputs = $request->all();
        $indicador = Indicador::find($id);
        $indicador->update($inputs);
        $indicador->save();
        return redirect("/indicadores");
    }

    public function show($id)
    {
        return redirect("/indicadores/".$id."/edit");
    }

    public function delete($id, Request $request)
    {
        return view("indicadores.delete")->with(["id" => $id]);
    }

    public function deleteConfirm($id, Request $request)
    {
        $indicador = Indicador::find($id);
        $indicador->delete();
        return redirect('/indicadores');
    }
}
