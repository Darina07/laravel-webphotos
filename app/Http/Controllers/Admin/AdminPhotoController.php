<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\Photo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminPhotoController extends Controller
{
    public function index()
    {
        $photos = Photo::orderByDesc('created_at')->simplePaginate(10);

        return view('admins.photos.index', compact('photos'));
    }

    public function destroy(Photo $photo)
    {
        // Delete associated comments
        $photo->comments()->delete();

        // Delete the photo from storage
        Storage::delete($photo->image_path);

        // Delete the photo from the database
        $photo->delete();

        return redirect()->back()->with('pic-deleted', 'Photo deleted successfully');
    }

    public function show(Photo $photo)
    {
        $comments = $photo->comments()->latest()->get();

        return view('admins.photos.show', compact('photo', 'comments'));
    }

    public function destroyComment($comment)
    {
        $commentModel = Comment::findOrFail($comment);
        $commentModel->delete();

        return redirect()->back()->with('comment-deleted', 'Comment deleted successfully');
    }
}
