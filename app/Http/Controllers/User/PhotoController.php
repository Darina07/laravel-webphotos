<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\Photo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Nette\Utils\Image;

class PhotoController extends Controller
{
    public function index()
    {
        // Get all photos with user information, sorted by upload date in descending order
        $allPhotos = Photo::with('user')->latest()->simplePaginate(10);

        return view('users.photos.index', ['allPhotos' => $allPhotos]);
    }

    public function show($id)
    {
        $photo = Photo::findOrFail($id);

        // Get the count of comments for the specific photo
        $commentCount = Comment::where('photo_id', $id)->count();

        $comments = Comment::where('photo_id', $id)->latest()->get();

        return view('users.photos.show', ['photo' => $photo, 'comments' => $comments, 'commentCount' => $commentCount]);
    }

    public function storeComment(Request $request, $id)
    {
      // Validate the comment data
        $request->validate([
            'comment' => 'required|string',
        ]);

        // Create a new comment
        Comment::create([
            'photo_id' => $id,
            'user_id' => auth()->user()->id,
            'comment' => $request->input('comment')
        ]);

        return redirect()->back()->with('success-comment', 'Comment posted successfully!');
    }

    public function create()
    {
        $user = Auth::user();

        // Get the count of pictures uploaded by the current user
        $photoCount = Photo::where('user_id', $user->id)->count();

        $lastCreatedPhoto = Photo::where('user_id', $user->id)
            ->latest()
            ->first();

        return view('users.photos.create', ['user' => $user, 'lastCreatedPhoto' => $lastCreatedPhoto, 'photoCount' => $photoCount]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'photo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        // Store the photo and resize it
        $image = $request->file('photo');
        $imagePath = $image->store('photos', 'public');

        // Create an instance of Nette\Utils\Image
        $resizedImage = Image::fromFile(public_path("storage/{$imagePath}"))
            ->resize(null, 250);

        // Set the height explicitly to ensure consistency
        $resizedImage->resize(null, 250);

        // Save the resized image
        $resizedImage->save(public_path("storage/{$imagePath}"));

        Photo::create([
            'user_id' => auth()->id(),
            'image_path' => $imagePath
        ]);

        return redirect()->back()->with('pic-success', 'Picture added successfully!');
    }

    public function destroy(Photo $photo)
    {
        // Delete related comments
        Comment::where('photo_id', $photo->id)->delete();

        // Delete the photo
        $photo->delete();

        return redirect()->route('photos')->with('pic-deleted', 'Picture deleted successfully!');
    }
}
