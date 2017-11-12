<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class IndicadoresPreguntas extends Model
{
    protected $table = 'indicador_pregunta';
    
    protected $fillable = [
        'pregunta_id',
        'indicador_id',
        'cuestionario_id',
        'required'
    ];
}
