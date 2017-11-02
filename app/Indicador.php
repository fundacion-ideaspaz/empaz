<?php

namespace App;

use Illuminate\Support\Facades\Storage;
use Eloquent;

class Indicador extends Eloquent
{

    protected $table = 'indicadores';

    protected $fillable = [
        "nombre",
        "descripcion",
        "estado"
    ];

    public function dimensiones()
    {
        return $this->belongsToMany("App\Dimension");
    }
}
