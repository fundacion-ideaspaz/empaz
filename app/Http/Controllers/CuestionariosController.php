<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cuestionario;
use App\Pregunta;
use App\PreguntaCuestionario;

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
        $preguntas = Pregunta::all();
        return view("cuestionarios.create")->with(["preguntas" => $preguntas]);
    }

    public function store(Request $request)
    {
        $validations = [
            "nombre" => "required",
            "descripcion" => "required",
            "estado" => "required",
            "version" => "required",
            "preguntas" => "required|array",
        ];
        $this->validate($request, $validations);
        $preguntas = $request["preguntas"];
        $cuestionario = $request->except('preguntas');
        $newCuestionario = Cuestionario::create($cuestionario);
        foreach ($preguntas as $pregunta) {
            $preguntaCuestionario = new PreguntaCuestionario();
            $preguntaCuestionario->pregunta_id = $pregunta;
            $preguntaCuestionario->cuestionario_id = $newCuestionario->id;
            $preguntaCuestionario->save();
        }
        return redirect("/cuestionarios");
    }

    public function edit($id)
    {
        $pregunta = Pregunta::find($id);
        $restIndicadores = Indicador
                        ::whereNotIn("id", $pregunta->indicadores->pluck('id'))
                        ->get();
        return view("cuestionarios.edit")->with([
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
        ->pluck("indicador_id");
        IndicadoresPreguntas::whereNotIn("indicador_id", $indicadores)
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
        return view("cuestionarios.delete")->with(["id" => $id]);
    }

    public function deleteConfirm($id, Request $request)
    {
        $pregunta = Pregunta::find($id);
        $pregunta->delete();
        return redirect('/preguntas');
    }
}
