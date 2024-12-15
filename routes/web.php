<?php

use App\Http\Controllers\BlogController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\GoogleController;

Route::get('/', [BlogController::class, 'index'])->name('home');

Route::middleware('auth')->group(function () {
    Route::get('/posts/{post}', [BlogController::class, 'ViewPost'])->name('viewpost');
    Route::post('/logout', [BlogController::class, 'logout'])->name('logout');
    Route::get('/addpost', [BlogController::class, 'viewaddpost'])->name('makepost');
    Route::post('/addpost', [BlogController::class, 'addpost'])->name('addpost');
    Route::post('/delepost/{post}', [BlogController::class, 'deletepost'])->name('deletepost');
});

Route::middleware('guest')->group(function () {
    Route::get('/login', [BlogController::class, 'loginform'])->name('loginform');
    Route::post('/login', [BlogController::class, 'login'])->name('login');

    Route::get('/register', [BlogController::class, 'create'])->name('create.user');
    Route::post('/register', [BlogController::class, 'store'])->name('store.user');

    Route::get('/auth/google/redirect', [GoogleController::class, 'redirectToGoogle'])->name('google.redirect');
    Route::get('/auth/google/callback', [GoogleController::class, 'handleGoogleCallback'])->name('google.callback');
});
