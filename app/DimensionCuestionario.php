<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DimensionCuestionario extends Model
{
    protected $table = 'cuestionarios_dimensiones';
    
    protected $fillable = [
        'dimension_id',
        'cuestionario_id',
        'importancia'
    ];
}
