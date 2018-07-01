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
        'ciiu_principal',
        'ciiu_secundario',
        'user_id',
        'nit'
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
