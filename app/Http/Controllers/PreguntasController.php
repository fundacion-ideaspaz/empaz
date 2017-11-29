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
        return view("questions.create");
    }

    public function store(Request $request)
    {
        $validations = [
            "nombre" => "required",
            "descripcion" => "required",
            "tipo_respuesta" => "required",
            "respuestas" => "required|array",
            "estado" => "required"
        ];
        $this->validate($request, $validations);
        $respuestas = $request->respuestas;
        $inputs = $request->except(["indicadores"]);
        $pregunta = Pregunta::create($inputs);
        $respuestas[sizeof($respuestas)] = "No aplica";
        $respuestas[sizeof($respuestas)] = "No hay información";
        foreach ($respuestas as $number => $respuesta) {
            if ($respuesta != null) {
                $newRespuesta = new OpcionesRespuestas();
                $newRespuesta->number = $number+1;
                $newRespuesta->pregunta_id = $pregunta->id;
                $newRespuesta->descripcion = $respuesta;
                $newRespuesta->save();
            }
        }
        return redirect("/preguntas");
    }

    public function edit($id)
    {
        $pregunta = Pregunta::find($id);
        return view("questions.edit")->with([
            "pregunta" => $pregunta
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
        $inputs = $request->except('tipo_respuesta');
        $pregunta = Pregunta::find($id);
        $pregunta->update($inputs);
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
