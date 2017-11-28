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
        switch ($this->number) {
            case 1:
                return 5;
            case 2:
                return 3;
            case 3:
                return 2;
            case 4:
                return 1;
            case -1:
                return 1;
            case -2:
                return 1;
        }
    }
}
