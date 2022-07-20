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
            return"you have successfuly logged in";
        }

        return"opps!you have entered invalid credentials";

    }


}

