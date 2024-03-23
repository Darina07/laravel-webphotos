<?php

use App\Http\Controllers\Admin\AdminHomeController;
use App\Http\Controllers\Admin\AdminPhotoController;
use App\Http\Controllers\Admin\AdminUserController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\User\ContactController;
use App\Http\Controllers\User\PhotoController;
use App\Http\Controllers\User\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\User\AuthController;

// User Routes
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/users', [UserController::class, 'index'])->name('users');

// Authentication routes
Route::group(['middleware' => 'guest'], function () {
    Route::post('/register', [AuthController::class, 'register'])->name('register');
    Route::post('/login', [AuthController::class, 'login'])->name('login');
});

// Logged Users
Route::group(['middleware' => 'auth'], function () {
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
    Route::get('/profile', [ProfileController::class, 'show'])->name('profile');

    Route::put('/profile/update', [ProfileController::class, 'update'])->name('profile-update');
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile-edit');

    Route::get('/profile/pic', [PhotoController::class, 'create'])->name('profile-upload-pic');
    Route::post('/profile/upload', [PhotoController::class, 'store'])->name('profile-store-pic');
});

    // Photos
    Route::group(['prefix' => 'photos'], function () {
        Route::get('/', [PhotoController::class, 'index'])->name('photos');
        Route::get('/{id}', [PhotoController::class, 'show'])->name('view-photo');
        Route::post('/{id}/comment', [PhotoController::class, 'storeComment'])->name('add-comment')->middleware('auth');
        Route::delete('/{photo}', [PhotoController::class, 'destroy'])->name('delete-photo')->middleware('auth');
    });

    // Contacts
    Route::group(['prefix' => 'contacts'], function () {
        Route::get('/', [ContactController::class, 'index'])->name('contacts');
        Route::post('/', [ContactController::class, 'submit'])->name('submit-contact');
    });


// Admin Routes
Route::prefix('admin')->group(function () {
    Route::get('/', [AdminHomeController::class, 'loginForm'])->name('admin');
    Route::post('/login', [AdminHomeController::class, 'login'])->name('admin.login');

    Route::middleware(['admin'])->group(function () {
        Route::get('/home', [AdminHomeController::class, 'index'])->name('admin.home');
        Route::get('/users', [AdminUserController::class, 'index'])->name('admin.users');
        Route::get('/users/{user}/photos', [AdminUserController::class, 'show'])->name('admin.users-photos');
        Route::delete('/users/photos/{photo}', [AdminUserController::class, 'destroy'])->name('admin.delete-photo');
        Route::get('/photos', [AdminPhotoController::class, 'index'])->name('admin.photos');
        Route::delete('/photos/{photo}', [AdminPhotoController::class, 'destroy'])->name('admin.photos-delete');
        Route::get('/photos/{photo}/comments', [AdminPhotoController::class, 'show'])->name('admin.photos-comments');
        Route::delete('/photos/comments/{comment}', [AdminPhotoController::class, 'destroyComment'])->name('admin.delete-comment');
    });
});



