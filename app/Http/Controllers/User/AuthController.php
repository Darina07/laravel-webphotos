<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $formFields = $request->validate([
            'name' => 'required|string|min:3|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:3|max:255',
        ]);

        $formFields['password'] = Hash::make($formFields['password']);

        $user = User::create($formFields);

        Auth::login($user);

        return redirect()->route('home')->with('signin-message', 'User created successfully!');
    }

    public function login(Request $request)
    {
        $formFields = $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
        ]);

        if (auth()->attempt($formFields)) {
            $request->session()->regenerate();

            return redirect()->route('home')->with('signin-message', 'Logged in successfully!');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }

    public function logout(Request $request)
    {
        auth()->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('home')->with('logout', 'Logged out successfully!');
    }
}
