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
        switch ($this->number) {
            case 1:
                return 5;
            case 2:
                if($tipoRespuesta === "tipo_3"){
                    return 1;
                }
                if($tipoRespuesta === "tipo_4"){
                    return 2;
                }
                return 3;
            case 3:
                if($tipoRespuesta === "tipo_1"){
                    return 2;
                }
                return 1;
            case 4:
                return 1;
            case 5:
                return null;
            case 6:
                return 1;
        }
    }

    public function pregunta(){
        return $this->belongsTo("\App\Pregunta");
    }
}
