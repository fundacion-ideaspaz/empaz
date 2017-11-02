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
            "estado" => "required"
        ];
        $this->validate($request, $validations);
        $inputs = $request->all();
        $indicador = Indicador::create($inputs);
        return redirect("/indicadores");
    }

    public function edit($id)
    {
        $indicador = Indicador::find($id);
        return view("indicadores.edit")->with([
            "indicador" => $indicador
        ]);
    }

    public function update($id, Request $request)
    {
        $validations = [
            "nombre" => "required",
            "descripcion" => "required",
            "estado" => "required"
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

    public function addPreguntas($id)
    {
        $indicador = Indicador::find($id);
        $preguntasIds = PreguntasIndicadores
            ::where("pregunta_id", "=", $id)->pluck("pregunta_id");
        $preguntas = Pregunta::whereNotIn("id", $preguntasIds)->get();
        return view('indicadores.preguntas')->with([
            "indicador" => $indicador,
            "preguntas" => $preguntas
        ]);
    }

    public function storePreguntas($id, $pregunta_id, Request $request)
    {
        $validations = [
            "required" => "required"
        ];
        $this->validate($request, $validations);
        $importancia = $request->nivel_importancia;
        $indicadorCuestionario = new PreguntasIndicadores();
        $indicadorCuestionario->pregunta_id = $pregunta_id;
        $indicadorCuestionario->indicador_id = $id;
        $indicadorCuestionario->nivel_importancia = $importancia;
        $indicadorCuestionario->save();
        return redirect("/indicadores/".$id."/preguntas");
    }

    public function deletePreguntas($id, $pregunta_id, Request $request)
    {
        $indicadorCuestionario = PreguntasIndicadores
            ::where("indicador_id", "=", $id)
            ->where("pregunta_id", "=", $pregunta_id)->first();
        $indicadorCuestionario->delete();
        return redirect("/indicadores/".$id."/preguntas");
    }
}
