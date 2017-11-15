<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\User;
use App\Mail\AccountCreated;
use Auth;

class UserController extends Controller
{

    public function __construct()
    {
        $this->middleware(['auth', 'superadmin']);
    }

    protected $roles = ['consulta','superadmin','experto','empresa'];
    protected $rolesSelect = [
        'consulta' => 'consulta',
        'superadmin' => 'superadmin',
        'experto' => 'experto',
        'empresa' => 'empresa'
    ];

    public function index()
    {
        $users = User::all();
        return view('users.index')->with(['users' => $users]);
    }

    public function create($role)
    {
        if (in_array($role, $this->roles)) {
            return view('users.create')->with(["role" => $role]);
        }
        return view('errors.404');
    }

    public function show($id)
    {
        return redirect("/users/".$id."/edit");
    }

    public function edit($id)
    {
        $user = User::find($id);
        return view("users.edit")->with(["user" => $user, "role" => $user->role, "roles" => $this->rolesSelect]);
    }

    public function update($id, Request $request)
    {
        $user = User::find($id);
        if (!$request->password) {
            $user->update($request->except('password'));
        } else {
            $request["password"] = bcrypt($request->password);
            $user->update($request->all());
            $user->save();
        }
        return redirect("/users");
    }

    public function store(Request $request)
    {
        $role = $request->role;
        if (in_array($role, $this->roles)) {
            $validate = User::getValidateInputs($role);
            $this->validate($request, $validate);
            $inputs = $request->all();
            $inputs["role"] = $role;
            $inputs["password"] = bcrypt($request->password);
            $inputs["estado"] = 'inactivo';
            $inputs["confirmation_code"] = str_random(12);
            $user = User::create($inputs);
            Mail::to($user->email)->send(new AccountCreated($user));
            return redirect("/users");
        } else {
            return redirect()->back();
        }
    }

    public function delete($id, Request $request)
    {
        return view("users.delete")->with(["id" => $id]);
    }

    public function deleteConfirm($id, Request $request)
    {
        $user = User::find($id);
        $user->delete();
        return redirect('/users');
    }
}
