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
        $validation_foreign = [
            "nombre" => "required",
            "pais" => "required",
            "direccion"  => "required",
            "telefono"  => "required",
            "tamano"  => "required",
            "num_trabajadores"  => "required",
            "sector_economico"  => "required",
        ];
        $validation_colombia = [
            "nombre" => "required",
            "pais" => "required",
            "departamento" => "required",
            "municipio" => "required",
            "direccion"  => "required",
            "telefono"  => "required",
            "tamano"  => "required",
            "num_trabajadores"  => "required",
            "nit" => "required|digits:9",
            "sector_economico"  => "required",
            "ciiu_principal" => "required",
        ];

         $messages = array(
            'pais.required' => 'El campo país es requerido.',
            'direccion.required' => 'El campo dirección es requerido.',
            'telefono.required' => 'El campo teléfono es requerido.',
            'tamano.required' => 'El campo tamaño de la empresa es requerido.',
            'num_trabajadores.required' => 'El número de trabajores es requerido.',
            'sector_economico.required' => 'El sector económico es requerido.',
            'nit.required' => 'El NIT de la empresa es requerido.',
            "ciiu_principal.required" => 'El código CIIU principal de la empresa es requerido.'

        );

        //Get inputs
        $inputs = $request->all();
        $inputs["user_id"] = $id;
        $pais = $inputs["pais"];

        //Validation
        if ($pais === "Colombia") {
          $this->validate($request, $validation_colombia, $messages);
        } else {
          $this->validate($request, $validation_foreign, $messages);
        }
        ProfileEmpresa::create($inputs);
        return redirect("/profile/empresa");
    }

    public function editEmpresa($id, Request $request){
        $empresa = ProfileEmpresa::find($id);
        return view('profile.edit-profile')->with('empresa', $empresa);
    }

    public function updateEmpresa($id, Request $request)
    {
      $validation_foreign = [
          "nombre" => "required",
          "pais" => "required",
          "direccion"  => "required",
          "telefono"  => "required",
          "tamano"  => "required",
          "num_trabajadores"  => "required",
          "sector_economico"  => "required",
      ];
      $validation_colombia = [
          "nombre" => "required",
          "pais" => "required",
          "departamento" => "required",
          "municipio" => "required",
          "direccion"  => "required",
          "telefono"  => "required",
          "tamano"  => "required",
          "num_trabajadores"  => "required",
          "nit" => "required|digits:9",
          "sector_economico"  => "required",
          "ciiu_principal" => "required",
      ];

       $messages = array(
          'pais.required' => 'El campo país es requerido.',
          'direccion.required' => 'El campo dirección es requerido.',
          'telefono.required' => 'El campo teléfono es requerido.',
          'tamano.required' => 'El campo tamaño de la empresa es requerido.',
          'num_trabajadores.required' => 'El número de trabajores es requerido.',
          'sector_economico.required' => 'El sector económico es requerido.',
          'nit.required' => 'El NIT de la empresa es requerido.',
          "ciiu_principal.required" => 'El código CIIU principal de la empresa es requerido.'

      );

      //Get inputs
      $inputs = $request->all();
      $inputs["user_id"] = $id;
      $pais = $inputs["pais"];

      //Validation
      if ($pais === "Colombia") {
        $this->validate($request, $validation_colombia, $messages);
      } else {
        $this->validate($request, $validation_foreign, $messages);
      }

        $profile_empresa = ProfileEmpresa::where('user_id', '=', Auth::user()->id)->first();
        $profile_empresa->update($inputs);
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
