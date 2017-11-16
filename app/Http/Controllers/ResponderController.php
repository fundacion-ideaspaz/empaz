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
        $cuestionario = Cuestionario::find($id);
        if ($cuestionario->estado === 'inactivo') {
            return redirect('/home');
        }
        return view('cuestionario')->with(['cuestionario' => $cuestionario]);
    }

    public function store($id, Request $request)
    {
        $cuestionario = Cuestionario::find($id);
        $cuestionarioResult = new CuestionarioResult();
        $cuestionarioResult->cuestionario_id = $id;
        $cuestionarioResult->user_id = Auth::user()->id;
        $cuestionarioResult->save();
        $answers = $request->except("_token");
        foreach ($answers as $preguntaId => $opcionRespuestaId) {
            $respuesta = new RespuestaCuestionario();
            $respuesta->opcion_respuesta_id = $opcionRespuestaId;
            $respuesta->pregunta_id = $preguntaId;
            $respuesta->cuestionario_result_id = $cuestionarioResult->id;
            $respuesta->cuestionario_id = $id;
            $respuesta->save();
        }
        return redirect('/reportes/'.$cuestionarioResult->id);
    }
}
