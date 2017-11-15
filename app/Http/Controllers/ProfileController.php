<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;
use App\ProfileEmpresa;

class ProfileController extends Controller
{
    public function activateAccount($id, $code)
    {
        $user = User::find($id);
        if ($user->confirmation_code == $code) {
            $user->estado = 'activo';
            $user->confirmation_code = '';
            $user->save();
        }
        Auth::login($user);
        return redirect('/home');
    }

    public function profileEmpresa()
    {
        $empresa = ProfileEmpresa::where('user_id', '=', Auth::user()->id)->first();
        if ($empresa) {
            return view('profile.empresa')->with([
                'empresa' => $empresa
            ]);
        } else {
            return view('profile.edit');
        }
    }

    public function profileUser()
    {
        return view('profile.user');
    }

    public function saveEmpresa($id, Request $request)
    {
        $validations = [
            "nombre" => "required",
            "pais" => "required",
            "departamento" => "required",
            "municipio"  => "required",
            "direccion"  => "required",
            "telefono"  => "required",
            "web"  => "required",
            "nit"  => "required",
            "tamano"  => "required",
            "num_trabajadores"  => "required",
            "sector_economico"  => "required",
            "codigo_ciiu"  => "required",
         ];
        $this->validate($request, $validations);
        $inputs = $request->all();
        $inputs["user_id"] = $id;
        ProfileEmpresa::create($inputs);
        return redirect("/");
    }
}
