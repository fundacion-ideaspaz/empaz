<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cuestionario;
use App\CuestionarioResult;
use App\RespuestaCuestionario;
use Auth;

class ResponderController extends Controller
{

    public function all()
    {
        $cuestionarios = Cuestionario::where("estado", '=', 'activo')->get();
        return view('cuestionarios')->with(['cuestionarios' => $cuestionarios]);
    }

    public function index($id)
    {
        //Check if is active
        $cuestionario = Cuestionario::find($id);
        if ($cuestionario->estado === 'inactivo') {
            return redirect('/responder');
        }
        //Check if its completed
        $cuestionario_result = CuestionarioResult::->where('cuestionario_id', $cuestionario->id)
          ->where('user_id', Auth::user())->first();

        if ($cuestionario_result) {
          if ($cuestionario_result->completed === 1) {
            return redirect('/reportes/'.$cuestionario_result->id);
          } elseif ($cuestionario_result->completed === 0) {
            return redirect('/responder/edit/'.$cuestionario_result->id);
          }
        }
        return view('cuestionario')->with(['cuestionario' => $cuestionario]);
    }

    public function store($id, Request $request)
    {
        $cuestionario = Cuestionario::find($id);
        $cuestionarioResult = new CuestionarioResult();
        $cuestionarioResult->cuestionario_id = $id;
        $cuestionarioResult->user_id = Auth::user()->id;
        $cuestionarioResult->completed = 1;
        $cuestionarioResult->save();

        //Iterate over questions
        $flag = 1;
        $answers = $request->except("_token");
        foreach ($answers as $preguntaId => $opcionRespuestaId) {
            $respuesta = new RespuestaCuestionario();
            $respuesta->opcion_respuesta_id = $opcionRespuestaId;
            $respuesta->pregunta_id = $preguntaId;
            $respuesta->cuestionario_result_id = $cuestionarioResult->id;
            $respuesta->cuestionario_id = $id;
            //Set flag to zero if there is no opcion_respuesta_id
            if (!$respuesta->opcion_respuesta_id && $flag===1) {
              //Modify cuestionario
              $flag = 0;
              $cuestionarioResult = CuestionarioResult::find($respuesta->cuestionario_result_id);
              $cuestionarioResult->completed = $flag;
              $cuestionarioResult->save();
            }
            $respuesta->save();
        }
        if ($flag===1) {
          return redirect('/reportes/'.$cuestionarioResult->id);
        } else {
          $cuestionarios = Cuestionario::where("estado", '=', 'activo')->get();
          return redirect("/responder")->with(['cuestionarios' => $cuestionarios]);
        }
    }

    public function edit($cuestionario_result_id)
    {
        //Get existing result
        $cuestionario_result = CuestionarioResult::find($cuestionario_result_id);
        $respuestas_cuest = $cuestionario_result->getRespuestas();
        //Get cuestionario
        $cuestionario = $cuestionario_result->cuestionario;
        //validate user and non completion
          if ($cuestionario_result->user_id === Auth::user()->id && $cuestionario_result->completed === 0) {
            return view('cuestionario-edit')->with(['cuestionario' => $cuestionario,
                                                'respuestas_cuest' => $respuestas_cuest,
                                                'cuestionario_result_id' => $cuestionario_result_id]);
          }
        $cuestionarios = Cuestionario::where("estado", '=', 'activo')->get();
        return redirect("/responder")->with(['cuestionarios' => $cuestionarios]);
    }

    public function update($cuestionario_result_id, Request $request)
    {
        $cuestionarioResult = CuestionarioResult::find($cuestionario_result_id);

        //Iterate over questions
        $flag = 1;
        $answers = $request->except("_token");
        foreach ($answers as $preguntaId => $opcionRespuestaId) {
            $respuesta = RespuestaCuestionario::where('cuestionario_result_id', '=', $cuestionario_result_id)
            ->where('pregunta_id', '=', $preguntaId)->first();
            //Update opcion_respuesta_id
            $respuesta->opcion_respuesta_id = $opcionRespuestaId;
            //Set flag to zero if there is no opcion_respuesta_id
            if (!$respuesta->opcion_respuesta_id && $flag===1) {
              //Modify cuestionario
              $flag = 0;
            }
            $respuesta->save();
        }
        if ($flag===1) {
          $cuestionarioResult = CuestionarioResult::find($respuesta->cuestionario_result_id);
          $cuestionarioResult->completed = $flag;
          $cuestionarioResult->save();
          return redirect('/reportes/'.$cuestionarioResult->id);
        } else {
          $cuestionarios = Cuestionario::where("estado", '=', 'activo')->get();
          return redirect("/responder")->with(['cuestionarios' => $cuestionarios]);
        }
    }
}
