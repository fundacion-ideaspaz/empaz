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

    public function valueRespuesta()
    {
        $tipoRespuesta = $this->pregunta->tipo_respuesta;
        if($this->descripcion == 'No aplica'){
            return null;
        }
        if($this->descripcion == 'No hay información'){
            return 1;
        }
        switch ($this->number) {
            case 1:
                return 5;
            case 2:
                if($tipoRespuesta == 3){
                    return 1;
                }
                if($tipoRespuesta == 4){
                    return 2;
                }
                return 3;
            case 3:
                if($tipoRespuesta == 1){
                    return 2;
                }
                return 1;
            case 4:
                return 1;
        }
    }

    public function pregunta(){
        return $this->belongsTo("\App\Pregunta");
    }
}
