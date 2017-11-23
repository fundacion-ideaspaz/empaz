<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class IndicadoresDimensiones extends Model
{
    protected $table = 'dimension_indicador';
    
    protected $fillable = [
        'dimension_id',
        'indicador_id',
        'cuestionario_id',
        'nivel_importancia'
    ];
}
