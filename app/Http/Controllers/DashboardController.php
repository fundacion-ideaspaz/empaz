<?php

namespace App\Http\Controllers;

use App\Cuestionario;
use App\CuestionarioResult;
use App\Dimension;
use App\DimensionCuestionario;
use App\Indicador;
use App\IndicadoresDimensiones;
use App\Pregunta;
use App\ProfileEmpresa;
use App\RespuestaCuestionario;
use Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $cuestionarios_resueltos = CuestionarioResult::all();
        return view('dashboard.index')->with([
            'cuestionarios_resueltos' => $cuestionarios_resueltos,
        ]);
    }

    public function indexCuest($cuest_id)
    {
        $cuestionarios_resueltos = CuestionarioResult
            ::where('cuestionario_id', '=', $cuest_id)->get();
        return view('dashboard.index')->with([
            'cuestionarios_resueltos' => $cuestionarios_resueltos,
        ]);
    }

    public function view($cuest_respuesta_id)
    {
        $cuestRes = CuestionarioResult::find($cuest_respuesta_id);
        $respuestas = RespuestaCuestionario
            ::where('cuestionario_result_id', '=', $cuest_respuesta_id)->get();
        $cuestionario = Cuestionario::find($cuestRes->cuestionario_id);
        return view('dashboard.view')->with([
            'cuestionario' => $cuestionario,
            'respuestas' => $respuestas,
        ]);
    }

    public function resultadoCuestionario($cuest_id)
    {
        $empresa = ProfileEmpresa::where('user_id', '=', Auth::user()->id)->first();
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
        $enunciados = array_fill(0, $dimensiones->count(), 0);
        $arrayPorcentajeDimension = array_fill(0, $dimensiones->count(), 0);
        $i = 0;
        foreach ($dimensiones as $dimension) {
            $arrayPorcentajeDimension[$i] = intval($dimensionesCuest[$i]->importancia);
            $i++;
            //
        }

        $rDimensiones = $cuestResult->puntajeDimensiones($arrayPorcentajeDimension, $cuestionario_id, $dimensiones, $indicadores, $indicadoresCuest, $rIndicadores);
        $rCuestionario = $cuestResult->puntajeCuestionario($rDimensiones);

        $i = 0;
        foreach ($rIndicadores as $rindicador) {
            $rIndicadores[$i] = intval($rindicador * 100);
            $i++;
            //  Convert the indicadores result to percent
        }

        $i = 0;
        $nivel = "bajo";
        foreach ($dimensiones as $dimension) {
            $rDimensiones[$i] = ($rDimensiones[$i] / $arrayPorcentajeDimension[$i]) * 100;
            if ($rDimensiones[$i] >= 0 && $rDimensiones[$i] <= 15) {
                $nivel = "bajo";
            } elseif ($rDimensiones[$i] >= 16 && $rDimensiones[$i] <= 30) {
                $nivel = "bajo";
            } elseif ($rDimensiones[$i] >= 31 && $rDimensiones[$i] <= 50) {
                $nivel = "medio";
            } elseif ($rDimensiones[$i] >= 51 && $rDimensiones[$i] <= 85) {
                $nivel = "alto";
            } elseif ($rDimensiones[$i] >= 86 && $rDimensiones[$i] <= 100) {
                $nivel = "muy alto";
            }

            $enunciados[$i] = Enunciado::where("dimension_id", "=", $dimension->id)->where("nivel_importancia", "=", $nivel)->first();
            //bajo 0-15% - bajo
            //medio bajo 16-30% - medio
            //medio 31-50% - alto
            //medio alto 51-85% - Muy alto
            //alto 86-100% - Muy alto
            $i++;
            // get the value of a dimension from 1% to 100%
        }

        return view("reportes.index")->with([
            'empresa' => $empresa,
            'rImportancia' => $arrayPorcentajeDimension,
            'rIndicadores' => $rIndicadores,
            'rDimensiones' => $rDimensiones,
            'rCuestionario' => $rCuestionario,
            'preguntas' => $preguntas,
            'indicadores' => $indicadores,
            'dimensiones' => $dimensiones,
            'eDimensiones' => $enunciados,
        ]);
    }

}
