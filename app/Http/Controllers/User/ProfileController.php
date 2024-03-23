<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function show()
    {
        $user = auth()->user();

        return view('users.profile', compact('user'));
    }

    public function edit()
    {
        $user = Auth::user();

        return view('users.edit', ['user' => $user]);
    }

    public function update(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'name' => 'required|string|min:3|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'photo' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $user->name = $request->input('name');
        $user->email = $request->input('email');

        // Update profile picture if a new photo is uploaded
        if ($request->hasFile('photo')) {
            $user->image_path = $request->file('photo')->store('profiles', 'public');
        }

        $user->save();

        return redirect()->route('profile')->with('edit-success', 'Profile updated successfully!');
    }
}
