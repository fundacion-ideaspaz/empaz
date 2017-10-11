<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class IndicadoresPreguntas extends Model
{
    protected $table = 'indicador_pregunta';
    
    protected $fillable = [
        'dimension_id',
        'indicador_id'
    ];
}
