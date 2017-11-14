<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CuestionarioResult extends Model
{
    protected $table = 'cuestionarios_result';
    
    protected $fillable = [
        'user_id',
        'cuestionario_id',
        'value'
    ];

    public function puntajeIndicadores($cuestionario_id, $preguntas, $indicadores, $preguntasCuest )
    {
        $cantidadPreguntas= $preguntas->count();
        $cantidadIndicadores= $indicadores->count();
        $matrizRelations = array_fill(0, $cantidadIndicadores, array_fill(0, $cantidadPreguntas, 0));
        $arrayResults = array_fill(0, $cantidadPreguntas, 0);
        $resultMatriz = $matrizRelations;
        $i=0;
        foreach ($preguntasCuest as $pregunta) {
            $arrayResults[$i] = $pregunta->opcion->valueRespuesta();
            $i++;
        }
        $i=$j=0;
        foreach ($indicadores as $indicador) {
            $i=0;
            foreach ($preguntas as $pregunta) {
                $isFromIndicador = IndicadoresPreguntas
                ::where("pregunta_id", '=', $pregunta->id)
                ->where("cuestionario_id", "=", $cuestionario_id)
                ->where("indicador_id", "=", $indicador->id)
                ->count();
                if ($isFromIndicador > 0) {
                    $matrizRelations[$i][$j] = 1;
                    $resultMatriz[$i][$j] = $matrizRelations[$i][$j] * $arrayResults[$j];
                }
                $i++;
            }
            $j++;
        }
        $matrizPercentages = $matrizRelations;
        $i=$j=0;
        foreach ($indicadores as $indicador) {
            $i=0;
            foreach ($preguntas as $pregunta) {
                $divisorResult = (5 * $this->contador($resultMatriz, $j, $cantidadPreguntas));
                if ($divisorResult == 0) {
                    $matrizPercentages[$i][$j] = 0;
                } else {
                    $matrizPercentages[$i][$j] = $resultMatriz[$i][$j] / $divisorResult;
                }
                $i++;
            }
            $j++;
        }

        return $matrizPercentages;
    }

    public function contador($matriz, $j, $cantidadPreguntas)
    {
        $cantidad=0;
        for ($i=0; $i<$cantidadPreguntas; $i++) {
            if ($matriz[$i][$j]>0) {
                  $cantidad++;
            }
        }
        return $cantidad;
    }
}
