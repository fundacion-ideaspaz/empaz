<?php

namespace App;

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
        'cuest_id_parent'
    ];

    public function dimensiones()
    {
        return $this->belongsToMany("App\Dimension", "cuestionarios_dimensiones")
            ->withPivot("importancia");
    }

    public function allPreguntas($cuest_id)
    {
        $preguntasIds = IndicadoresPreguntas::
            where("cuestionario_id", "=", $cuest_id)->pluck("pregunta_id");
        $preguntas = Pregunta::whereIn("id", $preguntasIds)->get();
        return $preguntas;
    }
}
