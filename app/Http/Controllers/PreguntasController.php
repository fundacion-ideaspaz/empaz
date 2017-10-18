<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pregunta;
use App\Indicador;
use App\OpcionesRespuestas;
use App\IndicadoresPreguntas;
use Storage;

class PreguntasController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'experto']);
    }

    public function index()
    {
        $questions = Pregunta::all();
        return view("questions.index")->with([
            "questions" => $questions
        ]);
    }

    public function create()
    {
        $indicadores = Indicador::all();
        return view("questions.create")->with(["indicadores" => $indicadores]);
    }

    public function store(Request $request)
    {
        $validations = [
            "nombre" => "required",
            "descripcion" => "required",
            "tipo_respuesta" => "required",
            "indicadores" => "required|array",
            "respuestas" => "required|array"
        ];
        $this->validate($request, $validations);
        $respuestas = $request->respuestas;
        $indicadores = $request->indicadores;
        $inputs = $request->except(["respuestas", "indicadores"]);
        $pregunta = Pregunta::create($inputs);
        foreach ($respuestas as $number => $respuesta) {
            if ($respuesta != null) {
                $newRespuesta = new OpcionesRespuestas();
                $newRespuesta->number = $number+1;
                $newRespuesta->pregunta_id = $pregunta->id;
                $newRespuesta->descripcion = $respuesta;
                $newRespuesta->save();
            }
        }
        foreach ($indicadores as $number => $indicador) {
            $newIndicador = new IndicadoresPreguntas();
            $newIndicador->pregunta_id = $pregunta->id;
            $newIndicador->indicador_id = $indicador;
            $newIndicador->save();
        }
        return redirect("/preguntas");
    }

    public function edit($id)
    {
        $pregunta = Pregunta::find($id);
        $restIndicadores = Indicador
                        ::whereNotIn("id", $pregunta->indicadores->pluck('id'))
                        ->get();
        return view("questions.edit")->with([
            "pregunta" => $pregunta,
            "restIndicadores" => $restIndicadores
        ]);
    }

    public function update($id, Request $request)
    {
        $validations = [
            "nombre" => "required",
            "descripcion" => "required",
            "tipo_respuesta" => "required",
            "indicadores" => "required|array"
        ];
        $this->validate($request, $validations);
        $inputs = $request->all();
        $pregunta = Pregunta::find($id);
        $pregunta->update($inputs);
        $indicadores = $request["indicadores"];
        $updateIndicadores = IndicadoresPreguntas::whereIn("indicador_id", $indicadores)
            ->where("pregunta_id", "=", $pregunta->id)
            ->pluck("indicador_id");
        IndicadoresPreguntas::whereNotIn("indicador_id", $indicadores)
            ->where("pregunta_id", "=", $pregunta->id)
            ->delete();
        $newIndicadores = Indicador::whereIn("id", $indicadores)
            ->whereNotIn("id", $updateIndicadores)
            ->get();
        foreach ($newIndicadores as $indicador) {
            IndicadoresPreguntas::create([
            "indicador_id" => $indicador->id,
            "pregunta_id" => $pregunta->id
            ]);
        }
        $pregunta->save();
        return redirect("/preguntas");
    }

    public function show($id)
    {
        return redirect("/preguntas/".$id."/edit");
    }

    public function delete($id, Request $request)
    {
        return view("questions.delete")->with(["id" => $id]);
    }

    public function deleteConfirm($id, Request $request)
    {
        $pregunta = Pregunta::find($id);
        $pregunta->delete();
        return redirect('/preguntas');
    }
}
