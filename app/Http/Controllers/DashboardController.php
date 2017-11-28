<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CuestionarioResult;
use App\RespuestaCuestionario;
use App\Pregunta;
use App\IndicadoresDimensiones;
use App\Indicador;
use App\Dimension;
use App\DimensionCuestionario;
use App\CuestionarioMath;

class DashboardController extends Controller
{
    public function reporteIndicadores($cuest_id)
    {
        $cuestResult = CuestionarioResult::find($cuest_id);
        $cuestionario_id = $cuestResult->cuestionario_id;
        $preguntasCuest = RespuestaCuestionario
                    ::where("cuestionario_id", "=", $cuestionario_id)
                    ->where("cuestionario_result_id", "=", $cuest_id)
                    ->get();
        $preguntasIds = $preguntasCuest->pluck("pregunta_id");
        $preguntas = Pregunta::whereIn("id", $preguntasIds)->get();
        $indicadoresCuest = IndicadoresDimensiones
                    ::where("cuestionario_id", "=", $cuestionario_id)->get();
        $indicadoresIds = $indicadoresCuest->pluck("indicador_id");
        $dimensionesIds = $indicadoresCuest->pluck("dimension_id");
        $indicadores = Indicador::whereIn("id", $indicadoresIds)->get();
        $dimensiones = Dimension::whereIn("id", $dimensionesIds)->get();
        $dimensionesCuest = DimensionCuestionario
                        ::where("cuestionario_id", "=", $cuestionario_id)->get();
        $rIndicadores = $cuestResult->puntajeIndicadores($cuestionario_id, $preguntas, $indicadores, $preguntasCuest);

        $arrayPorcentajeDimension = array_fill(0, $dimensiones->count(), 0);
        $i=0;
        foreach ($dimensiones as $dimension) {
            $arrayPorcentajeDimension = intval($dimensionesCuest[$i]->importancia);
            $i++;
        }

        $rDimensiones = $cuestResult->puntajeDimensiones($arrayPorcentajeDimension, $cuestionario_id, $dimensiones, $indicadores, $indicadoresCuest, $rIndicadores);
        $rCuestionario = $cuestResult->puntajeCuestionario($rDimensiones);
        
        dd([
            'rIndicadores' => $rIndicadores,
            'rDimensiones' => $rDimensiones,
            'rCuestionario' => $rCuestionario,
            'preguntas' => $preguntas,
            'indicadores' => $indicadores,
            'dimensiones' => $dimensiones,
        ]);

        return view("reportes.index")->with([
            'rIndicadores' => $rIndicadores,
            'rDimensiones' => $rDimensiones,
            'rCuestionario' => $rCuestionario,
            'preguntas' => $preguntas,
            'indicadores' => $indicadores,
            'dimensiones' => $dimensiones,
        ]);
    }
}
