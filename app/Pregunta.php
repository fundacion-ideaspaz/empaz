<?php

namespace App;

use Illuminate\Support\Facades\Storage;
use Eloquent;

class Pregunta extends Eloquent
{
    protected $table = 'preguntas';

    protected $fillable = [
      'nombre',
      'descripcion',
      'tipo_respuesta',
      'estado'
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

    public function opcionesRespuestas()
    {
        return $this->hasMany("App\OpcionesRespuestas");
    }

    public function isRequired($cuest_id)
    {
        
        $indPreg = IndicadoresPreguntas::
            where("pregunta_id", "=", $this->id)
            ->where("cuestionario_id", "=", $cuest_id)->first();
        return $indPreg->required;
    }
}
