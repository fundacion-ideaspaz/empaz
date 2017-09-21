<?php

namespace App;

use Jenssegers\Mongodb\Eloquent\Model as Eloquent;
use Illuminate\Support\Facades\Storage;

class Dimension extends Eloquent
{
    protected $fillable = [
        "nombre",
        "descripcion",
        "nivel_importancia",
        "logo"
    ];

    public function getNivelImportanciaAttribute($value){
        switch($value){
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
}
