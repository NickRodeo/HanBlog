<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        return view("auths/login");
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            "name" => "required|min:5|max:30",
            "password" => "required|min:8"
        ]);

        if(Auth::attempt($credentials)){
            $request->session()->regenerate();
            return redirect()->intended("/");
        }

        return back()->with("loginFailed", "Failed to Login!");
    }

    public function logout(Request $request)
    {
        if($request->isMethod("GET"))
            return redirect(url("/"));

        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect(url("/login"));
    }
}
