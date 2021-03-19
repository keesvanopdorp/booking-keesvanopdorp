<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;

class AdminUserController extends Controller
{
    //

    public function index()
    {
        $users = User::all();
        return view('admin.users.index', ["users" => $users]);
    }

    public function create()
    {
        $roles = Role::all();
        return view('admin.users.create', ["roles" => $roles]);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            "email" => "required|email|max:255",
            "password" => "required|confirmed|string",
            "password_confirmation" => "required",
            "role" => "required|numeric|exists:roles,id"
        ]);

    }
}
