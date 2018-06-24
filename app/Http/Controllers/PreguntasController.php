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
        $questions = Pregunta::orderBy("nombre", "asc")->paginate(25);
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
        $messages = array(
            'descripcion.required' => 'El campo descripción es requerido.',
        );
        $this->validate($request, $validations, $messages);
        $respuestas = $request->respuestas;
        $inputs = $request->except(["indicadores"]);
        $pregunta = Pregunta::create($inputs);
        // $respuestas[sizeof($respuestas)] = "No aplica";
        $respuestas[sizeof($respuestas)] = "No hay información";
        foreach ($respuestas as $number => $respuesta) {
            $newRespuesta = new OpcionesRespuestas();
            $newRespuesta->number = $number+1;
            $newRespuesta->pregunta_id = $pregunta->id;
            $newRespuesta->descripcion = $respuesta;
            $newRespuesta->save();
        }
        return redirect("/preguntas");
    }

    public function edit($id)
    {
        $pregunta = Pregunta::find($id);
        $indicadoresPreguntas = IndicadoresPreguntas
            ::where('pregunta_id', '=', $pregunta->id)
            ->first();
        $canEditEstado = true;
        if ($indicadoresPreguntas) {
            $canEditEstado = false;
        }
        return view("questions.edit")->with([
            "pregunta" => $pregunta,
            "canEditEstado" => $canEditEstado,
        ]);
    }

    public function update($id, Request $request)
    {
        $validations = [
            "nombre" => "required",
            "descripcion" => "required",
            "tipo_respuesta" => "required",
            "respuestas" => "required|array",
            "estado" => "required"
        ];
        $messages = array(
            'descripcion.required' => 'El campo descripción es requerido.',
        );
        $this->validate($request, $validations, $messages);
        $respuestas = $request->respuestas;
        $inputs = $request->all();
        $pregunta = Pregunta::find($id);
        $pregunta->update($inputs);
        $pregunta->save();

        // Check if there are missing fields in options table ---Provisional

        foreach ($pregunta->opcionesRespuestas as $opcion) {
          $options[$opcion->number] = $opcion;
        }
        if (count($options) === 4 && $opcion->number ===4) {
          $status = "minus_two";
        } elseif (count($options) === 5 && $opcion->number ===5) {
          $status = "minus_one";
        } else {
          $status = "ok";
        }

        // Assign existing and new answers

        foreach ($respuestas as $id => $respuesta) {
          // Minus two clause ----> Provisional
            if ($status === "minus_two" && $id === "new_5") {
              //Create N/A
              $newRespuesta = new OpcionesRespuestas();
              $newRespuesta->number = 5;
              $newRespuesta->pregunta_id = $pregunta->id;
              $newRespuesta->descripcion = $respuesta;
              $newRespuesta->save();
              //Create No information
              $newRespuesta = new OpcionesRespuestas();
              $newRespuesta->number = 6;
              $newRespuesta->pregunta_id = $pregunta->id;
              $newRespuesta->descripcion = "No hay información";
              $newRespuesta->save();
            }
            elseif ($id == "new_3" && $id == "new_4") {
                if ($id==="new_3") {
                  $number = 3;
                }else {
                  $number = 4;
                }
                $newRespuesta = new OpcionesRespuestas();
                $newRespuesta->number = $number;
                $newRespuesta->pregunta_id = $pregunta->id;
                $newRespuesta->descripcion = $respuesta;
                $newRespuesta->save();
            } else {
                $newRespuesta = OpcionesRespuestas::find($id);
                $newRespuesta->descripcion = $respuesta;
                $newRespuesta->save();
            }
        }
        //Minus one clause --->> Provisional
        if ($status === "minus_one" ) {
          //Create No information
          $newRespuesta = new OpcionesRespuestas();
          $newRespuesta->number = 6;
          $newRespuesta->pregunta_id = $pregunta->id;
          $newRespuesta->descripcion = "No hay información";
          $newRespuesta->save();
        }

        return redirect("/preguntas");
    }

    public function show($id)
    {
        return redirect("/preguntas/".$id."/edit");
    }

    public function delete($id, Request $request)
    {
        $preguntasCuest = IndicadoresPreguntas
                        ::where("pregunta_id", "=", $id)->get();
        if($preguntasCuest->count() > 0){
            return view("questions.delete")->with([
                "id" => $id,
                "can_delete" => false
            ]);
        }
        return view("questions.delete")->with([
            "id" => $id,
            "can_delete" => true
        ]);
    }

    public function deleteConfirm($id, Request $request)
    {
        $pregunta = Pregunta::find($id);
        $pregunta->delete();
        return redirect('/preguntas');
    }
}
