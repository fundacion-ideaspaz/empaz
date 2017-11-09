<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RespuestaCuestionario extends Model
{
    protected $table = 'respuestas_cuestionarios';
    
    protected $fillable = [
        'opcion_respuesta_id',
        'pregunta_id',
        'cuestionario_result_id'
    ];
}
