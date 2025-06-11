<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function index()
    {
        return view("auths/register");
    }

    public function register(Request $request)
    {
        $validatedData = $request->validate([
            "name" => "required|min:5|max:30|unique:users,name",
            "email" => "required|email|unique:users,email",
            "password" => "required|min:8"
        ]);
        $validatedData["password"] = bcrypt($validatedData["password"]);
        $validatedData["slug"] = Str::random(20);
        User::create($validatedData);

        return redirect("/login")->with("success", "Register Successfull");
    }
}
