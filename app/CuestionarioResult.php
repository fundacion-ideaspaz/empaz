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

    public function puntajeIndicadores($cuestionario_id, $preguntas, $indicadores, $preguntasCuest)
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
            $j=0;
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
                $j++;
            }
            $i++;
        }
        $matrizPercentages = $matrizRelations;
        $i=$j=0;
        foreach ($indicadores as $indicador) {
            $j=0;
            foreach ($preguntas as $pregunta) {
                $divisorResult = (5 * $this->contador($resultMatriz, $i, $cantidadPreguntas));
                if ($divisorResult == 0) {
                    $matrizPercentages[$i][$j] = 0;
                } else {
                    $matrizPercentages[$i][$j] = $resultMatriz[$i][$j] / $divisorResult;
                }
                $j++;
            }
            $i++;
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

    public function puntajeDimensiones($cuestionario_id, $dimensiones, $indicadores, $indicadoresCuest, $matrizIndicadores)
    {
        $cantidadDimensiones = $dimensiones->count();
        $cantidadIndicadores = $indicadores->count();
        $matrizRelations = array_fill(0, $cantidadDimensiones, array_fill(0, $cantidadIndicadores, 0));
        $arrayResults = array_fill(0, $cantidadDimensiones, 0);
        $resultMatriz = $matrizRelations;
        $arraySumatorias = array_fill(0, $cantidadDimensiones, 0);
        $i=$j=0;
        foreach ($dimensiones as $dimension) {
            $j=0;
            $sumatoriaT = 0;
            $sumatoriaSr = 0;
            foreach ($indicadores as $indicador) {
                $nivel_importancia = $indicadoresCuest->first(function ($value, $key) use ($indicador, $dimension) {
                    return $value->indicador_id == $indicador->id && $value->dimension_id = $dimension->id;
                })->nivel_importancia;
                $resultMatriz[$i][$j] = intval($nivel_importancia);
                $sumatoriaT += intval($nivel_importancia) || 0;
                $sumatoriaSr += intval($nivel_importancia) * intval($matrizIndicadores[$i]);
                $j++;
            }
            $arraySumatorias[$i] = ($sumatoriaSr)/$sumatoriaT;
            $i++;
        }
        return $arraySumatorias;
    }
}
