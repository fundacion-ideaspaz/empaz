<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Mail\AccountCreated;
use Mail;
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
        return redirect('/profile/empresa');
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
            "direccion"  => "required",
            "telefono"  => "required",
            "tamano"  => "required",
            "num_trabajadores"  => "required",
            "sector_economico"  => "required",
        ];
         $messages = array(
            'pais.required' => 'El campo país es requerido.',
            'direccion.required' => 'El campo dirección es requerido.',
            'telefono.required' => 'El campo teléfono es requerido.',
            'tamano.required' => 'El campo tamaño de la empresa es requerido.',
            'num_trabajadores.required' => 'El número de trabajores es requerido.',
            'sector_economico.required' => 'El sector económico es requerido.',

        );
        $this->validate($request, $validations, $messages);
        $inputs = $request->all();
        $inputs["user_id"] = $id;
        ProfileEmpresa::create($inputs);
        return redirect("/profile/empresa");
    }

    public function editEmpresa($id, Request $request){
        $empresa = ProfileEmpresa::find($id);
        return view('profile.edit-profile')->with('empresa', $empresa);
    }

    public function updateEmpresa($id, Request $request)
    {
        $validations = [
            "nombre" => "required",
            "pais" => "required",
            "direccion"  => "required",
            "telefono"  => "required",
            "tamano"  => "required",
            "num_trabajadores"  => "required",
            "sector_economico"  => "required",
        ];
         $messages = array(
            'pais.required' => 'El campo país es requerido.',
            'direccion.required' => 'El campo dirección es requerido.',
            'telefono.required' => 'El campo teléfono es requerido.',
            'tamano.required' => 'El campo tamaño de la empresa es requerido.',
            'num_trabajadores.required' => 'El número de trabajores es requerido.',
            'sector_economico.required' => 'El sector económico es requerido.',

        );
        $this->validate($request, $validations, $messages);
        $inputs = $request->all();
        $inputs["user_id"] = $id;
        ProfileEmpresa::create($inputs);
        return redirect("/profile/empresa");
    }

    public function registro()
    {
        return view('users.registro')->with(["role" => "empresa"]);
    }

    public function saveRegistro(Request $request)
    {
        $role = $request->role;
        if ($role === "empresa") {
            $validate = User::getValidateInputs($role);
            $this->validate($request, $validate);
            $inputs = $request->all();
            $inputs["role"] = $role;
            $inputs["password"] = bcrypt($request->password);
            $inputs["estado"] = 'inactivo';
            $inputs["confirmation_code"] = str_random(12);
            $user = User::create($inputs);
            Mail::to($user->email)->send(new AccountCreated($user));
            return redirect("/registro/exito");
        } else {
            return redirect()->back();
        }
    }

    public function registroExito(){
        return view('users.registro-exito');
    }
}
