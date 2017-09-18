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

    public function store(Request $request)
    {
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
}
