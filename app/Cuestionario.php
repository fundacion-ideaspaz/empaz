<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cuestionario extends Model
{
    protected $table = 'cuestionarios';
    
    protected $fillable = [
        'nombre',
        'descripcion',
        'version',
        'estado'
    ];

    public function preguntas()
    {
        return $this->belongsToMany("App\Pregunta", "cuestionarios_preguntas");
    }
}
