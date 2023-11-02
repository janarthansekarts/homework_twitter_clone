<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function register()
    {
        return view('auth.register');
    }

    public function store(Request $request)
    {
        $request->validate([
            'email' => 'required|email|unique:users,email',
            'password' => 'required|confirmed|min:6',
            'name' => 'required|min:3|max:25'
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);

        $credentials = $request->only('email', 'password');
        Auth::attempt($credentials);
        $request->session()->regenerate();

        return redirect()->route('homepage');
    }

    public function login()
    {
        return view('auth.login');
    }

    public function authenticate()
    {
        $validated = request()->validate(
            [
                'email' => 'required|email',
                'password' => 'required|min:6'
            ]
        );

        if (Auth::attempt($validated)) {
            request()->session()->regenerate();
            return redirect()->route('homepage')->with('success', 'Logged in successfully!');
        }

        return redirect()->route('login')->withErrors([
            'password' => "User not found. Please check the email and the password entered."
        ]);
    }

    public function logout()
    {
        Auth::logout();

        return redirect()->route('homepage')->with('success', 'logged out successfully');
    }
}
