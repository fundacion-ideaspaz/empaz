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

    public function dimensiones()
    {
        return $this->belongsToMany("App\Dimension", "cuestionarios_dimensiones")
            ->withPivot("importancia");
    }

    public function allPreguntas(){
        $preguntas = [];
        foreach($this->dimensiones as $dimension){
            foreach($dimension->indicadores as $indicador){
                foreach($indicador->preguntas as $pregunta){
                    array_push($preguntas, $pregunta);
                }
            }
        }
        return $preguntas;
    }
}
