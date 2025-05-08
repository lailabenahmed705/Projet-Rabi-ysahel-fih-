<?php
// app/Http/Controllers/Auth/CustomAuthController.php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class CustomAuthController extends Controller
{
    public function showLoginForm()
    {
        return view('mediplus.auth.login');
    }

    public function showRegisterForm()
    {
        return view('mediplus.auth.register');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');
    
        if (Auth::attempt($credentials, $request->filled('remember'))) {
            $request->session()->regenerate();
            return redirect()->route('dashboard'); // 🔁 TOUS vont ici après login
        }
    
        return back()->withErrors(['email' => 'Identifiants incorrects']);
    }
    
    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed|min:6',
            'account_type' => 'required|in:patient,medical',
        ]);
    
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
    
        $user->assignRole($request->account_type); // si tu utilises Spatie
    
        Auth::login($user);
    
        if ($request->account_type === 'medical') {
            return redirect()->route('mediplus.plans');
        }
    
        return redirect()->route('dashboard');
    }
    
}
