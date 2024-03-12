<?php

use App\Http\Controllers\ThreadController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::prefix('admin')->middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified'])->group(function () {
    Route::get('/products', function () {
        return view('products');
    })->name('products');

    Route::get('/posts', function () {
        return view('posts');
    })->name('posts');

    Route::get('/users', function () {
        return view('users');
    })->name('users');

    Route::get('/design', function () {
        return view('admin.design');
    })->name('design');

    Route::get('/forum', \App\Http\Livewire\ShowThreads::class)->name('forum');

    Route::get('/thread/{thread}', \App\Http\Livewire\ShowThread::class)->name('thread');

    Route::resource('threads', ThreadController::class)->except([
        'show', 'index', 'destroy',
    ]);
});

Route::prefix('category')->group(function () {
    Route::get('/women', function () {
        return view('buyer.women');
    })->name('women');
    Route::get('/men', function () {
        return view('buyer.men');
    })->name('men');
});
