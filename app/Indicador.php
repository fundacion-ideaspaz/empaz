<?php

namespace App;

use Illuminate\Support\Facades\Storage;
use Eloquent;

class Indicador extends Eloquent
{

    protected $table = 'indicadores';

    protected $fillable = [
        "nombre",
        "descripcion",
        "estado"
    ];

    public function preguntas()
    {
        return $this->belongsToMany("App\Pregunta", 'indicador_pregunta')
            ->withPivot("required");
    }
}
