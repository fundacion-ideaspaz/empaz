<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CuestionarioResult extends Model
{
    protected $table = 'cuestionarios_result';
    
    protected $fillable = [
        'user_id',
        'cuestionario_id',
        'value'
    ];
}
