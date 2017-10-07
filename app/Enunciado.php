<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Enunciado extends Model
{
    protected $table = 'enunciados';
    
    protected $fillable = [
        "descripcion",
        "nivel_importancia",
        "dimension_id"
    ];
}
