<?php

namespace App\Http\Controllers;

use App\Models\Photo;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $recentPhotos = Photo::with('user')->latest()->take(10)->get();

        return view('home', ['recentPhotos' => $recentPhotos]);
    }
}
