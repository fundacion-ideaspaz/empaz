<?php

namespace App;

use Illuminate\Support\Facades\Storage;
use Eloquent;
use DB;

class Indicador extends Eloquent
{

    protected $table = 'indicadores';

    protected $fillable = [
        "nombre",
        "descripcion",
        "estado"
    ];

    public function preguntas($cuestionario_id)
    {
        $indicador_id = $this->id;
        return DB::table("indicador_pregunta")
            ->where("indicador_id", "=", $indicador_id)
            ->where("cuestionario_id", "=", $cuestionario_id)
            ->join("preguntas", "indicador_pregunta.pregunta_id", "=", "preguntas.id")
            ->get();
    }
}
