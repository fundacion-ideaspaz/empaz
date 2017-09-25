<?php

namespace App;

use Jenssegers\Mongodb\Eloquent\Model as Eloquent;
use Illuminate\Support\Facades\Storage;

class Indicador extends Eloquent
{
    protected $fillable = [
        "nombre",
        "descripcion",
        "nivel_importancia",
        "dimensiones"
    ];

    public function getNivelImportanciaAttribute($value)
    {
        switch ($value) {
            case 1:
                return "bajo";
            case 2:
                return "medio";
            case 3:
                return "alto";
            case 4:
                return "muy alto";
        };
    }

    public function nivel_importancia_int()
    {
        switch ($this->nivel_importancia) {
            case "bajo":
                return 1;
            case "medio":
                return 2;
            case "alto":
                return 3;
            case "muy alto":
                return 4;
        };
    }
}
