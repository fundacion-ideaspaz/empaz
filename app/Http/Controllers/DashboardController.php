<?php

namespace App\Http\Controllers;

use App\Cuestionario;
use App\CuestionarioResult;
use App\Dimension;
use App\DimensionCuestionario;
use App\Enunciado;
use App\Indicador;
use App\IndicadoresDimensiones;
use App\Pregunta;
use App\ProfileEmpresa;
use App\RespuestaCuestionario;

class DashboardController extends Controller
{

    public function index()
    {
        $cuestionarios_resueltos = CuestionarioResult::paginate(20);
        return view('dashboard.index')->with([
            'cuestionarios_resueltos' => $cuestionarios_resueltos,
        ]);
    }

    public function indexCuest($cuest_id)
    {
        $cuestionarios_resueltos = CuestionarioResult
            ::where('cuestionario_id', '=', $cuest_id)->paginate(20);
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
        $indicadores = Indicador
            ::
            select(
                "indicadores.id",
                "indicadores.nombre",
                "indicadores.descripcion",
                "indicadores.estado",
                "dimension_indicador.dimension_id"
            )
            ->
            whereIn("indicadores.id", $indicadoresIds)
            ->join('dimension_indicador', 'dimension_indicador.indicador_id', '=', 'indicadores.id')
            ->get();
        // dd($indicadores);
        $empresa = ProfileEmpresa::where('user_id', '=', $cuestResult->user_id)->first();

        $dimensiones = Dimension::whereIn("id", $dimensionesIds)->get();
        $dimensionesCuest = DimensionCuestionario
            ::where("cuestionario_id", "=", $cuestionario_id)->get();
        $puntajeIndicadores = $cuestResult->puntajeIndicadores($cuestionario_id, $preguntas, $indicadores, $preguntasCuest);
        $enunciados = array_fill(0, $dimensiones->count(), 0);
        $arrayPorcentajeDimension = array_fill(0, $dimensiones->count(), 0);
        $i = 0;
        foreach ($dimensiones as $dimension) {
            $arrayPorcentajeDimension[$i] = intval($dimensionesCuest[$i]->importancia);
            $i++;
            //
        }

        $puntajeDimensiones = $cuestResult->puntajeDimensiones($arrayPorcentajeDimension, $cuestionario_id, $dimensiones, $indicadores, $indicadoresCuest, $puntajeIndicadores);
        $rCuestionario = round($cuestResult->puntajeCuestionario($puntajeDimensiones), 2);

        $i = 0;
        foreach ($puntajeIndicadores as $rindicador) {
            $puntajeIndicadores[$i] = intval($rindicador * 100);
            $i++;
            //  Convert the indicadores result to percent
        }

        $i = 0;
        $nivel = "bajo";
        foreach ($dimensiones as $dimension) {
            $puntajeDimensiones[$i] = round(($puntajeDimensiones[$i] / $arrayPorcentajeDimension[$i]) * 100, 2);
            if ($puntajeDimensiones[$i] >= 0 && $puntajeDimensiones[$i] <= 15) {
                $nivel = "bajo";
            } elseif ($puntajeDimensiones[$i] >= 16 && $puntajeDimensiones[$i] <= 30) {
                $nivel = "bajo";
            } elseif ($puntajeDimensiones[$i] >= 31 && $puntajeDimensiones[$i] <= 50) {
                $nivel = "medio";
            } elseif ($puntajeDimensiones[$i] >= 51 && $puntajeDimensiones[$i] <= 85) {
                $nivel = "alto";
            } elseif ($puntajeDimensiones[$i] >= 86 && $puntajeDimensiones[$i] <= 100) {
                $nivel = "muy alto";
            }

            $enunciados[$i] = Enunciado::where("dimension_id", "=", $dimension->id)->where("nivel_importancia", "=", $nivel)->first();

            $i++;

        }

        return view("reportes.index")->with([
            'empresa' => $empresa,
            'rImportancia' => $arrayPorcentajeDimension,
            'puntajeIndicadores' => $puntajeIndicadores,
            'puntajeDimensiones' => $puntajeDimensiones,
            'rCuestionario' => $rCuestionario,
            'preguntas' => $preguntas,
            'indicadores' => $indicadores,
            'dimensiones' => $dimensiones,
            'eDimensiones' => $enunciados,
        ]);
    }

}
