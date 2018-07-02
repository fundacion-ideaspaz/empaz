<?php

namespace App;
use Auth;

use Illuminate\Database\Eloquent\Model;
use App\Pregunta;

class Cuestionario extends Model
{
    protected $table = 'cuestionarios';

    protected $fillable = [
        'nombre',
        'descripcion',
        'version',
        'estado',
        'cuest_id_parent',
    ];

    public function dimensiones()
    {
        return $this->belongsToMany("App\Dimension", "cuestionarios_dimensiones")->withPivot("importancia");
    }

    public function validateCuestionario(){

      //Validate dimensiones
      $importancias = DimensionCuestionario::where("cuestionario_id", "=", $this->id)->pluck("importancia");
      $importanciaTotal = 0;

      foreach($importancias as $imp){
          $importanciaTotal += $imp;
      }
      if ($importanciaTotal != 100) {
        return ["invalid","Cuestionario inválido: la suma de las dimensiones no es igual al 100%"];
      }

      //Validate indicadores
      $dimensions_id = DimensionCuestionario::where("cuestionario_id", "=", $this->id)->pluck("dimension_id");
      $ind_status_array = [];

      foreach ($dimensions_id as $dimension_id) {
        $assigned_inds = IndicadoresDimensiones::where("cuestionario_id", "=", $this->id)
        ->where("dimension_id", "=", $dimension_id)->pluck("id");
        if (count($assigned_inds)>0) {
          $ind_status_array[$dimension_id] = "true";
        } else {
          $ind_status_array[$dimension_id] = "false";
        }
      }

      if (in_array('false', $ind_status_array, true)) {
        return ["invalid", "Cuestionario inválido: todas las dimensiones deben tener al menos un indicador asignado"];
      }

      //validate $preguntas
      $dimensions_id = DimensionCuestionario::where("cuestionario_id", "=", $this->id)->pluck("dimension_id");
      $quest_status_array = [];

      //Iterate over dimensions
      foreach ($dimensions_id as $dimension_id) {
        $indicadores_id = IndicadoresDimensiones::where("cuestionario_id", "=", $this->id)
        ->where("dimension_id", "=", $dimension_id)->pluck("indicador_id");
        //Iterate over indicators
        foreach ($indicadores_id as $indicador_id) {
          $assigned_quest = IndicadoresPreguntas::where("cuestionario_id", "=", $this->id)
          ->where("indicador_id", "=", $indicador_id)->pluck("id");
          if (count($assigned_quest)>0) {
            $quest_status_array[$indicador_id] = "true";
          } else {
            $quest_status_array[$indicador_id] = "false";
          }
        }
      }

      if (in_array('false', $quest_status_array, true)) {
        return ["invalid", "Cuestionario inválido: todos los indicadores deben tener al menos una pregunta asignada"];
      }

      // Cuestionary is valid
      return ["valid", "Cuestionario válido."];

    }


    public function allPreguntas()
    {
        $preguntas = Pregunta::
        select(
            "preguntas.id",
            "preguntas.nombre",
            "preguntas.descripcion",
            "preguntas.estado",
            "preguntas.tipo_respuesta",
            "indicador_pregunta.order")
            ->where("indicador_pregunta.cuestionario_id", "=", $this->id)
            ->leftJoin('indicador_pregunta', 'preguntas.id', '=', 'indicador_pregunta.pregunta_id')
            ->orderBy("indicador_pregunta.order","asc")->get();
        return $preguntas;
    }

    public function cuestionario_result(){
       return $this->hasOne("\App\CuestionarioResult");
    }

    public function cuestionario_done(){
      #check if it has a result
      $response = CuestionarioResult::where("cuestionario_id", "=", $this->id)
      ->where('completed', "=", 1)
      ->where("user_id", "=", Auth::user()->id)->first();
      if ($response) {
        return 1;
      }
    }

    public function started() {
      $response = CuestionarioResult::where("cuestionario_id", "=", $this->id)
      ->where('completed', "=", 0)
      ->where("user_id", "=", Auth::user()->id)->first();
      if ($response) {
        return 1;
      }
    }

}
