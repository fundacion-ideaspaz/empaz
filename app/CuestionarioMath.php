<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CuestionarioMath extends Model {

    protected $table = 'cuestionarios_result';
    protected $fillable = [
        'user_id',
        'cuestionario_id',
        'value'
    ];

    public function puntajeIndicadores($cuestionario_id, $preguntas, $indicadores, $preguntasCuest) {

        $cantidadPreguntas = $preguntas->count();

        $cantidadIndicadores = $indicadores->count();

        $conteoIndicadores = array_fill(0, $cantidadIndicadores, 0);

        $totalIndicadores = array_fill(0, $cantidadIndicadores, 0);

        $calificacionIndicadores = array_fill(0, $cantidadIndicadores, 0);

        $matrizRelations = array_fill(0, $cantidadIndicadores, array_fill(0, $cantidadPreguntas, 0));

        $arrayResults = array_fill(0, $cantidadPreguntas, 0);

        $resultMatriz = $matrizRelations;

        $i = 0;



        foreach ($preguntasCuest as $pregunta) {
            $arrayResults[$i] = $pregunta->opcion->valueRespuesta();
            $i++;
        }


        $i = $j = 0;
        foreach ($indicadores as $indicador) {
            $j = 0;
            foreach ($preguntas as $pregunta) {
                $isFromIndicador = IndicadoresPreguntas
                        ::where("pregunta_id", '=', $pregunta->id)
                        ->where("cuestionario_id", "=", $cuestionario_id)
                        ->where("indicador_id", "=", $indicador->id)
                        ->count();
                if ($isFromIndicador > 0) {
                    $matrizRelations[$i][$j] = 1;
                    $resultMatriz[$i][$j] = $arrayResults[$j];
                }
                $j++;
            }
            $i++;
        }

        $i = $j = 0;
        foreach ($indicadores as $indicador) {
            $j = 0;
            foreach ($preguntas as $pregunta) {
                if ($resultMatriz[$i][$j] > 0) {

                    $conteoIndicadores[$i] = $conteoIndicadores[$i] + $resultMatriz[$i][$j];

                    $totalIndicadores[$i] = $totalIndicadores[$i] + 5;
                }
                $j++;
            }
            $i++;
        }

        $i = 0;
        foreach ($indicadores as $indicador) {

            $calificacionIndicadores[$i] = $conteoIndicadores[$i] / $totalIndicadores[$i][$j];

            $i++;
        }


        return $calificacionIndicadores;
    }

    public function puntajeDimensiones($arrayPorcentajeDimension, $cuestionario_id, $dimensiones, $indicadores, $indicadoresCuest, $calificacionIndicadores) {

        $cantidadDimensiones = $dimensiones->count();

        $cantidadIndicadores = $indicadores->count();

        $matrizRelations = array_fill(0, $cantidadDimensiones, array_fill(0, $cantidadIndicadores, 0));

        $arrayResults = array_fill(0, $cantidadDimensiones, 0);

        $resultMatriz = $matrizRelations;

        $arrayDimensionTemp = array_fill(0, $cantidadDimensiones, 0);

        $sumatoriaDimensionTemp = 0;

        $arrayDimensionResultado = array_fill(0, $cantidadDimensiones, 0);

        $arrayDimensionesCalculadas = array_fill(0, $cantidadDimensiones, 0);

        $i = $j = 0;
        foreach ($dimensiones as $dimension) {
            $j = 0;
            foreach ($indicadores as $indicador) {
                $nivel_importancia = $indicadoresCuest->first(function ($value, $key) use ($indicador, $dimension) {
                            return $value->indicador_id == $indicador->id && $value->dimension_id = $dimension->id;
                        })->nivel_importancia;
                $resultMatriz[$i][$j] = intval($nivel_importancia);
                $j++;
            }
            $i++;
        }

        $i = $j = 0;
        foreach ($dimensiones as $dimension) {
            $sumatoriaDimensionTemp = 0;
            $arrayDimensionTemp = array_fill(0, $cantidadDimensiones, 0);
            $j = 0;
            foreach ($indicadores as $indicador) {
                if ($resultMatriz[$i][$j] > 0) {
                    $arrayDimensionTemp[$j] = $resultMatriz[$i][$j];
                    $sumatoriayDimensionTemp = $sumatoriaDimensionTemp + $resultMatriz[$i][$j];
                }
                $j++;
                $calificacionIndicadores[$i] = sumaProductos($arrayDimensionTemp, $calificacionIndicadores) / $sumatoriaDimensionTemp;
            }
            $i++;
        }

        $i = 0;
        foreach ($dimensiones as $dimension) {
            $arrayDimensionesCalculadas[$i] = $calificacionIndicadores[$i] * $arrayPorcentajeDimension;
            $i++;
        }

        return $arrayDimensionesCalculadas;
    }

    function sumaProductos($array1, $array2) {
        $resultado = 0;
        if (count($array1) == count($array2)) {
            for ($i = 0; $i < count($array1); $i++) {
                $resultado += $array1[$i] * $array2[$i];
            }
        }
        return $resultado;
    }

    public function puntajeCuestionario($arrayDimensionesCalculadas) {
        $diagnostico = 0;
        foreach ($arrayDimensionesCalculadas as $dimension) {
            $diagnostico = $diagnostico + $dimension;
        }
        return $diagnostico;
    }

}
