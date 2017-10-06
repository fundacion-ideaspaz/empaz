<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'nombre',
        'email',
        'cargo',
        'role',
        'telefono',
        'password',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    public static function getValidateInputs($role)
    {
        $validate = [
            "nombre" => "required",
            "email" => "required|unique:users|email",
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
