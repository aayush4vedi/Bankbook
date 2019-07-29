<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    
    public function signin()
    {
        return view('auth.signin');
        // TODO return redirect('/dashboard')
    } 
    public function signup()
    {
        return view('auth.signup');
        // return redirect('/singin');
    } 
}

