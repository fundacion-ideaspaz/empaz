<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cuestionario;
use App\DimensionCuestionario;
use App\Dimension;
use App\IndicadoresDimensiones;
use App\Indicador;

class WizardController extends Controller
{
    public function new(){
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

    public function indicadores($id)
    {
        $indicadoresIds = IndicadoresDimensiones
            ::where("cuestionario_id", "=", $id)->pluck("indicador_id");
        $indicadores = Indicador::whereNotIn("id", $indicadoresIds)->get();
        return view('dimensiones.indicadores')->with([
            "dimension" => $dimension,
            "indicadores" => $indicadores
        ]);
    }

    public function preguntas(){

    }

}
