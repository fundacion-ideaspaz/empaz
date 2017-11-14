<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CuestionarioResult;
use App\RespuestaCuestionario;
use App\Pregunta;
use App\IndicadoresDimensiones;
use App\Indicador;

class DashboardController extends Controller
{
    public function reporteIndicadores($cuest_id)
    {
        $cuestResult = CuestionarioResult::find($cuest_id);
        $cuestionario_id = $cuestResult->cuestionario_id;
        $preguntasCuest = RespuestaCuestionario::where("cuestionario_id", "=", $cuestionario_id)->get();
        $preguntasIds = $preguntasCuest->pluck("pregunta_id");
        $preguntas = Pregunta::whereIn("id", $preguntasIds)->get();
        $indicadoresIds = IndicadoresDimensiones::where("cuestionario_id", "=", $cuestionario_id)
            ->pluck("indicador_id");
        $indicadores = Indicador::whereIn("id", $indicadoresIds)->get();
        $rIndicadores = $cuestResult->puntajeIndicadores($cuestionario_id, $preguntas, $indicadores, $preguntasCuest);
        return view("reportes.indicadores")->with([
            'rIndicadores' => $rIndicadores,
            'preguntas' => $preguntas,
            'indicadores' => $indicadores
        ]);
    }
}
