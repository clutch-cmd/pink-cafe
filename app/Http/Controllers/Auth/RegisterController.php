<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function index()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|min:3',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6|confirmed',
        ], [
            'name.required' => 'Numele este obligatoriu',
            'name.min' => 'Numele trebuie să aibă minim 3 caractere',
            'email.required' => 'Email-ul este obligatoriu',
            'email.email' => 'Email-ul nu este valid',
            'email.unique' => 'Acest email este deja înregistrat',
            'password.required' => 'Parola este obligatorie',
            'password.min' => 'Parola trebuie să aibă minim 6 caractere',
            'password.confirmed' => 'Parolele nu coincid',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'rol' => 'client',
        ]);

        Auth::login($user);

        return redirect()->route('home');
    }
}