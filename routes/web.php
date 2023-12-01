<?php

use App\Http\Controllers\ThreadController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified'])->group(function () {
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

    Route::get('/forum', \App\Http\Livewire\ShowThreads::class )->name('forum');
    
    Route::get('/thread/{thread}', \App\Http\Livewire\ShowThread::class )->name('thread');

    Route::resource('threads', ThreadController::class)->except([
        'show', 'index', 'destroy'
    ]);
});
