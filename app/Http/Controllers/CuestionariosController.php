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
            "version" => "required|integer",
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
        $cuestionario = Cuestionario::find($id);
        $restPreguntas = Pregunta
                        ::whereNotIn("id", $cuestionario->preguntas->pluck('id'))
                        ->get();
        return view("cuestionarios.edit")->with([
            "cuestionario" => $cuestionario,
            "restPreguntas" => $restPreguntas
        ]);
    }

    public function update($id, Request $request)
    {
        $validations = [
            "nombre" => "required",
            "descripcion" => "required",
            "estado" => "required",
            "version" => "required|integer",
            "preguntas" => "required|array",
        ];
        $this->validate($request, $validations);
        $inputs = $request->except("preguntas");
        $cuestionario = Cuestionario::find($id);
        $cuestionario->update($inputs);
        $preguntas = $request["preguntas"];
        $preguntasToConserve = PreguntaCuestionario::whereIn("pregunta_id", $preguntas)
            ->where("cuestionario_id", "=", $cuestionario->id)
            ->pluck("pregunta_id");
        PreguntaCuestionario::whereNotIn("pregunta_id", $preguntas)
            ->where("cuestionario_id", "=", $cuestionario->id)
            ->delete();
        $newPreguntas = Pregunta::whereIn("id", $preguntas)
        ->whereNotIn("id", $preguntasToConserve)
        ->get();
        foreach ($newPreguntas as $pregunta) {
            PreguntaCuestionario::create([
                "cuestionario_id" => $cuestionario->id,
                "pregunta_id" => $pregunta->id
            ]);
        }
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
        $pregunta = Cuestionario::find($id);
        $pregunta->delete();
        return redirect('/cuestionarios');
    }
}
