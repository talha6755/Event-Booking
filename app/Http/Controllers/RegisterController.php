<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function postRegister(Request $request)
    {
        $request->validate([

            "name"=>"required",
            "email"=>"required|email|unique:users",
            "password"=>"required|min:6",
        ]);

        $insert = User::create([
            "name" => $request->name,
            "email" => $request->email,
            "password" => Hash::make($request->password),

        ]);

        return response()->json([
                "status" => 200,
                "message" => "Great! You have Successfuly Registered Account",
                "data" => $insert,
            ]);

    }
}

