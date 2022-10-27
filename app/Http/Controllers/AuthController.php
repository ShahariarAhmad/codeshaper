<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
 
    public function authenticate(Request $request)
    {

        // return response('asdasd');
       
 
        if (Auth::attempt([
            'email' => $request->email,
            'password' => 12341234,
        ])) {
            $request->session()->regenerate();
 
            return response(auth('sanctum')->user());
        }
 
        return response('The provided credentials do not match our records.');
    }
}
