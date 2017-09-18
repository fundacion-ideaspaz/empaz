<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Jenssegers\Mongodb\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nombre',
        'correo',
        'cargo',
        'role',
        'telefono',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public static function getValidateInputs($role)
    {
        $validate = [
            "nombre" => "required",
            "correo" => "required|unique:users|email",
            "password" => "required|min:5",
        ];
        switch ($role) {
            case "superadmin":
                break;
            case "consulta":
                break;
            case "empresa":
                $validate["cargo"] = "required";
                $validate["telefono"] = "required|numeric";
                break;
            case "experto":
                $validate["cargo"] = "required";
                break;
        }
        return $validate;
    }
}
