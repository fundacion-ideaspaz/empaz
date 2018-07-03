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
                        ->where("estado", "=", "activo")->orderBy("nombre", "asc")->get();

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
                    "total" => "La suma de importancia de las dimensiones debe ser igual a 100%"
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
        $dimensiones = Dimension::whereIn("id", $dimensionesIds)->orderBy("nombre", "asc")->get();
        $indicadores = Indicador::where("estado", "=", "activo")
                        ->whereNotIn("id", $indicadoresIds)->orderBy("nombre", "asc")
                        ->get();
        return view('dimensiones.indicadores')->with([
            "dimensiones" => $dimensiones,
            "cuestionario" => $cuestionario,
            "indicadores" => $indicadores
        ]);
    }

    public function preguntas($cuest_id)
    {
        //Validate indicadores
        $dimensions_id = DimensionCuestionario::where("cuestionario_id", "=", $cuest_id)->pluck("dimension_id");
        $ind_status_array = [];

        foreach ($dimensions_id as $dimension_id) {
          $assigned_inds = IndicadoresDimensiones::where("cuestionario_id", "=", $cuest_id)
          ->where("dimension_id", "=", $dimension_id)->pluck("id");
          if (count($assigned_inds)>0) {
            $ind_status_array[$dimension_id] = "true";
          } else {
            $ind_status_array[$dimension_id] = "false";
          }
        }

        if (in_array('false', $ind_status_array, true)) {
          return redirect('/cuestionarios/'.$cuest_id.'/indicadores')->withErrors([
              'error.blank' => 'Todas las dimensiones deben tener al menos un indicador asignado'
          ]);
        }

        //Continue with questions
        $cuestionario = Cuestionario::find($cuest_id);
        $indicadoresIds = IndicadoresDimensiones
        ::where("cuestionario_id", "=", $cuest_id)->pluck("indicador_id");
        $preguntasIds = IndicadoresPreguntas
            ::where("cuestionario_id", "=", $cuest_id)->orderBy('created_at', 'asc')->pluck("pregunta_id");
        $indicadores = Indicador::whereIn("id", $indicadoresIds)->orderBy("nombre", "asc")->get();
        $preguntas = Pregunta::where("estado", "=", "activo")
                        ->whereNotIn("id", $preguntasIds)
                        ->orderBy("nombre", "asc")->get();
        return view('indicadores.preguntas')->with([
            "indicadores" => $indicadores,
            "cuestionario" => $cuestionario,
            "preguntas" => $preguntas
        ]);
    }

    public function validatePreguntas($cuest_id){

      //validate $preguntas
      $dimensions_id = DimensionCuestionario::where("cuestionario_id", "=", $cuest_id)->pluck("dimension_id");
      $quest_status_array = [];

      //Iterate over dimensions
      foreach ($dimensions_id as $dimension_id) {
        $indicadores_id = IndicadoresDimensiones::where("cuestionario_id", "=", $cuest_id)
        ->where("dimension_id", "=", $dimension_id)->pluck("indicador_id");
        //Iterate over indicators
        foreach ($indicadores_id as $indicador_id) {
          $assigned_quest = IndicadoresPreguntas::where("cuestionario_id", "=", $cuest_id)
          ->where("indicador_id", "=", $indicador_id)->pluck("id");
          if (count($assigned_quest)>0) {
            $quest_status_array[$indicador_id] = "true";
          } else {
            $quest_status_array[$indicador_id] = "false";
          }
        }
      }

      if (in_array('false', $quest_status_array, true)) {
        return redirect('/cuestionarios/'.$cuest_id.'/preguntas')->withErrors([
            'error.blank' => 'Todos los indicadores deben tener al menos una pregunta asignada']);
      }else{
            return redirect('/cuestionarios');
      }
    }
}
