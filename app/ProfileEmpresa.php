<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProfileEmpresa extends Model
{
    protected $table = 'empresa_profile';
    
    protected $fillable = [
        'nombre',
        'pais',
        'departamento',
        'municipio',
        'direccion',
        'telefono',
        'web',
        'tamano',
        'num_trabajadores',
        'sector_economico',
        'codigo_ciiu',
        'user_id',
        'nit'
    ];
}
