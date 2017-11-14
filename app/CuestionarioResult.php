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

    public function buildMatrizIndicadores()
    {
        $cuestionario_id = $this->cuestionario_id;
        $preguntasIds = RespuestaCuestionario
                    ::where("cuestionario_id", "=", $cuestionario_id)
                    ->pluck("pregunta_id");
        $preguntas = Pregunta::whereIn("id", $preguntasIds)->get();
        $indicadoresIds = IndicadoresDimensiones
                        ::where("cuestionario_id", "=", $cuestionario_id)
                        ->pluck("indicador_id");
        $indicadores = Indicador::whereIn("id", $indicadoresIds)->get();
        foreach ($indicadores as $indicador) {
            foreach ($preguntas as $pregunta) {
                $matriz[][] = $indicador->preguntas($cuestionario_id)->contains($pregunta) ? 1 : 0;
            }
        }
        dd($matriz);
    }

    public function puntajeIndicadores()
    {
        $cuestionario_id = $this->cuestionario_id;
        $preguntasCuest = RespuestaCuestionario
                    ::where("cuestionario_id", "=", $cuestionario_id)->get();
        $preguntasIds = $preguntasCuest->pluck("pregunta_id");
        $preguntas = Pregunta::whereIn("id", $preguntasIds)->get();
        $indicadoresIds = IndicadoresDimensiones
                        ::where("cuestionario_id", "=", $cuestionario_id)
                        ->pluck("indicador_id");
        $indicadores = Indicador::whereIn("id", $indicadoresIds)->get();
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
        dd($resultMatriz);

        // $matrizPercentages = $matrizRelations;
        // $i=$j=0;
        // foreach ($indicadores as $indicador) {
        //     $i=0;
        //     foreach ($preguntas as $pregunta) {
        //         $divisorResult = (5 * $this->contador($resultMatriz, $i, $cantidadPreguntas));
        //         if ($divisorResult == 0) {
        //             $matrizPercentages[$i][$j] = 0;
        //         } else {
        //             $matrizPercentages[$i][$j] = $resultMatriz[$i][$j] / $divisorResult;
        //         }
        //         $i++;
        //     }
        //     $j++;
        // }

        // dd($matrizPercentages);
    }

    public function contador($matriz, $i, $cantidadPreguntas)
    {
        $cantidad=0;
        for ($j=0; $j<$cantidadPreguntas-1; $j++) {
            if ($matriz[$i][$j]>0) {
                  $cantidad++;
            }
        }
        return $cantidad;
    }
}
