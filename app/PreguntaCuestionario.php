<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PreguntaCuestionario extends Model
{
    protected $table = 'cuestionarios_preguntas';
    
    protected $fillable = [
        'pregunta_id',
        'cuestionario_id'
    ];
}
