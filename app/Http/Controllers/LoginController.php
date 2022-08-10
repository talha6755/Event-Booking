<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function postLogin(Request $request)
    {

        $request->validate([
            "email"=>"required",
            "password"=>"required",
        ]);

        $credentials= $request->only(["email","password"]);
        if(Auth::attempt($credentials)){
            return response()->json([
                "status" => 200,
                "message" => "you have Successfuly logged in",
            ]);
        }

        return response()->json([
            "status" => 200,
            "message" => "Opps! You have Entered invalid Credentials",
        ]);

    }


}

