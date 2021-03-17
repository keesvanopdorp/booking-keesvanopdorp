<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        return view("auth.login");
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            "email" => "email|required",
            "password" => "string|required",
        ]);
        if (!Auth::attempt($request->only(["email", "password"], $request->remember))) {
            return back()->with("error", "Invalid login details");
        }
        return redirect()->route("admin")->with("success", "Login succesfull");
    }

    public function destroy(Request $request)
    {
        if (Auth::logout()) {
            return redirect()->route('auth.login')->with("status", "you are successfully logged out!");
        } else {
            return redirect()->route("auth.login")->with("error", "You first need to be logged in to logout");
        }
    }
}
