<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Indicador;
use App\Dimension;
use App\IndicadoresDimensiones;
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
        $inputs = $request->except("dimensiones");
        $indicador = Indicador::create($inputs);
        foreach ($request["dimensiones"] as $dimension) {
            IndicadoresDimensiones::create([
            "dimension_id" => $dimension,
            "indicador_id" => $indicador->id
            ]);
        }
        return redirect("/indicadores");
    }

    public function edit($id)
    {
        $indicador = Indicador::find($id);
        $dimensiones = [];
        $dimensionesIds = [];
        foreach ($indicador->dimensiones as $dimension) {
            array_push($dimensiones, $dimension);
            array_push($dimensionesIds, $dimension->id);
        }
        $restDimensiones = Dimension::whereNotIn("id", $dimensionesIds)->get();
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
        $inputs = $request->except("dimensiones");
        $indicador = Indicador::find($id);
        $indicador->update($inputs);
        $indicador->save();
        $dimensiones = $request["dimensiones"];
        $updateDimensiones = IndicadoresDimensiones::whereIn("dimension_id", $dimensiones)
            ->pluck("dimension_id");
        IndicadoresDimensiones::whereNotIn("dimension_id", $dimensiones)
            ->delete();
        $newDimensiones = Dimension::whereIn("id", $dimensiones)
            ->whereNotIn("id", $updateDimensiones)
            ->get();
        foreach ($newDimensiones as $dimension) {
            IndicadoresDimensiones::create([
                "dimension_id" => $dimension->id,
                "indicador_id" => $indicador->id
            ]);
        }
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
