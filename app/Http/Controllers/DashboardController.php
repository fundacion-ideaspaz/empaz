<?php

namespace App\Http\Controllers;

use App\Cuestionario;
use App\CuestionarioResult;
use App\Dimension;
use App\DimensionCuestionario;
use App\IndicadoresPreguntas;
use App\Enunciado;
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
        if ((Auth::user()->id != $cuestRes->user_id) && (Auth::user()->role === "empresa")) {
          $cuestionarios = Cuestionario::where("estado", '=', 'activo')->get();
          return view('cuestionarios')->with(['cuestionarios' => $cuestionarios]);
        }
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
        if ((Auth::user()->id != $cuestResult->user_id) && (Auth::user()->role === "empresa")) {
          $cuestionarios = Cuestionario::where("estado", '=', 'activo')->get();
          return view('cuestionarios')->with(['cuestionarios' => $cuestionarios]);
        }
        $cuestionario_id = $cuestResult->cuestionario_id;
        $preguntasCuest = RespuestaCuestionario
            ::where("cuestionario_id", "=", $cuestionario_id)
            ->where("cuestionario_result_id", "=", $cuest_id)->get();
        $preguntasIds = $preguntasCuest->pluck("pregunta_id");

        $preguntas = IndicadoresPreguntas::select(
                "preguntas.id",
                "preguntas.nombre",
                "preguntas.descripcion",
                "preguntas.estado",
                "preguntas.tipo_respuesta",
                "preguntas.created_at",
                "preguntas.updated_at",
                "indicador_pregunta.order")->whereIn("preguntas.id", $preguntasIds)
                ->where("cuestionario_id", "=", $cuestionario_id)
                ->leftJoin('preguntas', 'preguntas.id', '=', 'indicador_pregunta.pregunta_id')->get();

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
                "dimension_indicador.dimension_id",
                "dimension_indicador.cuestionario_id"
            )
            ->
            whereIn("indicadores.id", $indicadoresIds)->where('cuestionario_id', $cuestionario_id)
            ->join('dimension_indicador', 'dimension_indicador.indicador_id', '=', 'indicadores.id')->get();


        // // dd($indicadores);
        $empresa = ProfileEmpresa::where('user_id', '=', $cuestResult->user_id)->first();


        $dimensionesCuest = DimensionCuestionario
            ::where("cuestionario_id", "=", $cuestionario_id)
            ->orderBy('importancia', 'desc')
            ->get();


        $dimensionesIds = $dimensionesCuest->pluck('dimension_id');

        $dimensiones = Dimension
            ::
            select(
                "dimensiones.id",
                "dimensiones.nombre",
                "dimensiones.descripcion",
                "dimensiones.estado",
                "dimensiones.created_at",
                "dimensiones.updated_at")
            ->whereIn("dimensiones.id", $dimensionesIds)->where('cuestionario_id', $cuestionario_id)
            ->join('cuestionarios_dimensiones', 'cuestionarios_dimensiones.dimension_id', '=', 'dimensiones.id')
            ->orderBy('cuestionarios_dimensiones.importancia', 'desc')->get();

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
        $rCuestionario = round($cuestResult->puntajeCuestionario($puntajeDimensiones), 0);

        //Add value to database
        $cuestResult->value = $rCuestionario;
        $cuestResult->save();

        $i = 0;
        foreach ($puntajeIndicadores as $rindicador) {
          $puntajeIndicadores[$i] = intval($rindicador * 100);
          $i++;
          //  Convert the indicadores result to percent
        }

        $i = 0;
        $niveles = [];
        $nivel = "bajo";
        foreach ($dimensiones as $dimension) {
            $puntajeDimensiones[$i] = round(($puntajeDimensiones[$i] / $arrayPorcentajeDimension[$i]) * 100, 0);
            if ($puntajeDimensiones[$i] >= 0 && $puntajeDimensiones[$i] <= 15) {
                $nivel = "bajo";
                $texto = "principiante";
            } elseif ($puntajeDimensiones[$i] >= 16 && $puntajeDimensiones[$i] <= 40) {
                $nivel = "medio bajo";
                $texto = "básico";
            } elseif ($puntajeDimensiones[$i] >= 41 && $puntajeDimensiones[$i] <= 60) {
                $nivel = "medio";
                $texto = "intermedio";
            } elseif ($puntajeDimensiones[$i] >= 61 && $puntajeDimensiones[$i] <= 85) {
                $nivel = "medio alto";
                $texto = "avanzado";
            } elseif ($puntajeDimensiones[$i] >= 86 && $puntajeDimensiones[$i] <= 100) {
                $nivel = "alto";
                $texto = "líder";
            }

            $enunciados[$i] = Enunciado::where("dimension_id", "=", $dimension->id)->where("nivel_importancia", "=", $nivel)->first();
            $niveles[$i] = $texto;
            $i++;

        }

        return view("reportes.index")->with([
            'cuestionario'=> $cuestResult,
            'empresa' => $empresa,
            'rImportancia' => $arrayPorcentajeDimension,
            'puntajeIndicadores' => $puntajeIndicadores,
            'puntajeDimensiones' => $puntajeDimensiones,
            'rCuestionario' => $rCuestionario,
            'preguntas' => $preguntas,
            'indicadores' => $indicadores,
            'dimensiones' => $dimensiones,
            'eDimensiones' => $enunciados,
            'niveles' => $niveles,
        ]);
    }

}
