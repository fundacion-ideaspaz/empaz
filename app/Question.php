<?php

namespace App;

use Jenssegers\Mongodb\Eloquent\Model as Eloquent;
use Illuminate\Support\Facades\Storage;

class Question extends Eloquent
{
    protected $fillable = [
      'texto',
      'descripcion',
      'tipo_respuesta',
      'indicadores'
    ];

    public function getTipoPreguntaAttribute($value)
    {
        switch ($value) {
            case 1:
                return "Tipo 1";
            case 2:
                return "Tipo 2";
            case 3:
                return "Tipo 3";
            case 4:
                return "Tipo 4";
        };
    }

    public function tipo_pregunta_int()
    {
        switch ($this->tipo_pregunta) {
            case "Tipo 1":
                return 1;
            case "Tipo 2":
                return 2;
            case "Tipo 3":
                return 3;
            case "Tipo 4":
                return 4;
        };
    }

}
