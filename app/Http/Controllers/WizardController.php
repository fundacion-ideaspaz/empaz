<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cuestionario;
use App\DimensionCuestionario;
use App\Dimension;
use App\IndicadoresDimensiones;
use App\Indicador;
use App\IndicadorCuestionario;
use App\IndicadoresPreguntas;
use App\Pregunta;

class WizardController extends Controller
{
    public function new()
    {
        return view("cuestionarios.create");
    }

    public function dimensiones($cuest_id)
    {
        $cuestionario = Cuestionario::find($cuest_id);
        $dimensionesIds = DimensionCuestionario
            ::where("cuestionario_id", "=", $cuest_id)->pluck("dimension_id");
        $dimensiones = Dimension::whereNotIn("id", $dimensionesIds)->get();
        return view('cuestionarios.dimensiones')->with([
            "cuestionario" => $cuestionario,
            "dimensiones" => $dimensiones
        ]);
    }

    public function indicadores($cuest_id)
    {
        $cuestionario = Cuestionario::find($cuest_id);
        $dimensionesIds = DimensionCuestionario
        ::where("cuestionario_id", "=", $cuest_id)->pluck("dimension_id");
        $indicadoresIds = IndicadoresDimensiones
            ::where("cuestionario_id", "=", $cuest_id)->pluck("indicador_id");
        $dimensiones = Dimension::whereIn("id", $dimensionesIds)->get();
        $indicadores = Indicador::where("estado", "=", "activo")
                        ->whereNotIn("id", $indicadoresIds)
                        ->get();
        return view('dimensiones.indicadores')->with([
            "dimensiones" => $dimensiones,
            "cuestionario" => $cuestionario,
            "indicadores" => $indicadores
        ]);
    }

    public function preguntas($cuest_id)
    {
        $cuestionario = Cuestionario::find($cuest_id);
        $indicadoresIds = IndicadoresDimensiones
        ::where("cuestionario_id", "=", $cuest_id)->pluck("indicador_id");
        $preguntasIds = IndicadoresPreguntas
            ::where("cuestionario_id", "=", $cuest_id)->pluck("pregunta_id");
        $indicadores = Indicador::whereIn("id", $indicadoresIds)->get();
        $preguntas = Pregunta::where("estado", "=", "activo")
                        ->whereNotIn("id", $preguntasIds)
                        ->get();
        return view('indicadores.preguntas')->with([
            "indicadores" => $indicadores,
            "cuestionario" => $cuestionario,
            "preguntas" => $preguntas
        ]);
    }
}
