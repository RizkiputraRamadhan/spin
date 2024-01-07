<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class authController extends Controller
{
    public function login()
    {
        if (Auth::check()) {
            if (auth()) {
                return redirect('/pemenang');
            } 
        }
        return view('login');
    }


    public function store(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            if (Auth::check()) {
                if (auth()) {
                    return redirect('/pemenang');
                } 
            }
        }
        return back()
            ->withErrors([
                'email' => 'email atau password anda salah.',
            ])
            ->onlyInput('email');
    }
    
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
}
