<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OpcionesRespuestas extends Model
{
    protected $table = 'opciones_respuestas';
    
    protected $fillable = [
        'pregunta_id',
        'number',
        'descripcion'
    ];
}
