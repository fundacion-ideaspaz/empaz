<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Notifications\ResetPassword;

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
        'estado',
        'confirmation_code',
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

    public function empresa()
    {
        return $this->hasOne("\App\ProfileEmpresa");
    }

    /**
     * Send the password reset notification.
     *
     * @param  string  $token
     * @return void
     */
    public function sendPasswordResetNotification($token)
    {
        $this->notify(new ResetPassword($token));
    }
}
