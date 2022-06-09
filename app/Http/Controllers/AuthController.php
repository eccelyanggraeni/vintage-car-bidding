<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function index(){
        return view('login', ['title'=> 'Login']);
    }

    public function authenticate(Request $request)
    {
        $credential = $request->validate([
            'email' => ['required','email'],
            'password' => ['required'],
        ]);

        if(Auth::attempt($credential)){
            $request->session()->regenerate();
            $request->session()->put('email', $request->email);
            return redirect('/');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our record',
        ])->onlyInput('email');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}
