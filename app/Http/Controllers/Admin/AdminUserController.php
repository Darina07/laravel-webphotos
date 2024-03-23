<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Photo;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminUserController extends Controller
{
    public function index()
    {
        $users = User::where('isAdmin', false)
                  ->orderBy('created_at', 'desc')
                  ->simplePaginate(10);

        return view('admins.users.index', compact('users'));
    }

    public function show(User $user)
    {
        $photos = $user->photos()->simplePaginate(2);

        return view('admins.users.show', compact('user', 'photos'));
    }

    public function destroy(Photo $photo)
    {
        // Delete the photo from storage
        Storage::delete($photo->image_path);

        // Delete the photo from the database
        $photo->delete();

        return redirect()->back()->with('pic-deleted', 'Photo deleted successfully');
    }
}
