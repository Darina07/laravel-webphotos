<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Photo;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminHomeController extends Controller
{
    public function loginForm()
    {
        return view('admins.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
        $credentials = $request->only('email', 'password');

        // Check if the user is an admin
        if (Auth::guard('web')->attempt($credentials)) {
            $user = Auth::guard('web')->user();

            if ($user->isAdmin) {
                // The user is an admin, redirect to the admin dashboard
                return redirect()->route('admin.home');
            }
        }

        // Authentication failed, redirect back with an error message
        return redirect()->route('admin')->with('error', 'Invalid credentials.');
    }

    public function index()
    {
        $users = User::where('isAdmin', false)->latest()->take(5)->get();
        $photos = Photo::with('user')->latest()->take(5)->get();

        return view('admins.home', compact('users', 'photos'));
    }
}
