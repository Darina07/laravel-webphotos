<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function index()
    {
        $users = User::select('users.*')
            ->withCount('photos')
            ->orderByDesc('photos_count')
            ->simplePaginate(10);

        return view('users.index', compact('users'));
    }
}
