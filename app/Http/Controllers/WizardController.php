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
        $dimensiones = Dimension::whereNotIn("id", $dimensionesIds)
                        ->where("estado", "=", "activo")->get();
        return view('cuestionarios.dimensiones')->with([
            "cuestionario" => $cuestionario,
            "dimensiones" => $dimensiones
        ]);
    }

    public function validateDimensiones($cuest_id){
        $dimensionesCuest = DimensionCuestionario
            ::where("cuestionario_id", "=", $cuest_id)->get();
        $total = 0;
        foreach($dimensionesCuest as $dimCuest){
            $total += (int)$dimCuest->importancia;
        }
        if($total < 100){
            return redirect("/cuestionarios/".$cuest_id."/dimensiones")
                ->withErrors([
                    "total" => "La suma de importancia de las dimensiones no da 100%"
                ]);
        }
        return redirect("/cuestionarios/".$cuest_id."/indicadores");
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
        $indicadoresDimensiones = IndicadoresDimensiones::where('cuestionario_id', '=', $cuest_id)->first();
        if(!$indicadoresDimensiones){
            return redirect('/cuestionarios/'.$cuest_id.'/indicadores')->withErrors([
                'error.blank' => 'Debes agregar al menos un indicador'
            ]);
        }
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

    public function validatePreguntas($cuest_id){
        $indicadoresPreguntas = IndicadoresPreguntas::where('cuestionario_id', '=', $cuest_id)->first();
        if(!$indicadoresPreguntas){
            return redirect('/cuestionarios/'.$cuest_id.'/preguntas')->withErrors([
                'error.blank' => 'Debes agregar al menos una pregunta'
            ]);
        }else{
            return redirect('/cuestionarios');
        }
    }
}
