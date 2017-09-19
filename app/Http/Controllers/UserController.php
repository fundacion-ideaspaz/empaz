<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

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

    public function index(){
        $users = User::all();
        return view('users.index')->with(['users' => $users]);
    }

    public function create($role){
        if (in_array($role, $this->roles)) {
            return view('users.create')->with(["role" => $role]);
        }
        return view('errors.404');
    }

    public function show($id){
        return redirect("/users/".$id."/edit");
    }

    public function edit($id){
        $user = User::find($id);
        return view("users.edit")->with(["user" => $user, "role" => $user->role, "roles" => $this->rolesSelect]);
    }

    public function update($id, Request $request){
        $user = User::find($id);
        if(!$request->password){
            $user->update($request->except('password'));
        }else{
            $request["password"] = bcrypt($request->password);
            $user->update($request->all());
            $user->save();
        }
        return redirect("/users");
    }

    public function store(Request $request){
        $role = $request->role;
        if (in_array($role, $this->roles)) {
            $validate = User::getValidateInputs($role);
            $this->validate($request, $validate);
            $inputs = $request->all();
            $inputs["role"] = $role;
            $inputs["password"] = bcrypt($request->password);
            $user = User::create($inputs);
            return redirect("/users");
        } else {
            return redirect()->back();
        }
    }

    public function delete($id, Request $request){
        $user = User::find($id);
        return view("users.delete")->with(["user" => $user]);
    }

    public function deleteConfirm($id, Request $request){
        $user = User::find($id);
        $user->delete();
        return redirect('/users');
    }
}
