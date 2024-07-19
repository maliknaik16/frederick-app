<?php

use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FileUploader;
use App\Http\Controllers\MovieController;

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::get('/login', function() {
    return view('login');
})->name('login');

Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

Route::post('/login', [LoginController::class, 'authenticate']);

Route::group(['middleware' => ['auth']], function() {

    Route::get('/movies', [MovieController::class, 'index'])->name('movies.index');
    Route::get('/movies/{id}', [MovieController::class, 'show'])->name('movies.show');

    Route::post('/movies/{id}', [ MovieController::class, 'update' ]);

    Route::post('/upload', [ FileUploader::class, 'upload' ])->middleware(['auth']);
//    Route::get('/api/movies', [ MovieController::class, 'index' ])->middleware(['auth']);
//    Route::get('/api//movies/{id}', [ MovieController::class, 'show' ]);
    Route::post('/movies/delete/{id}', [ MovieController::class, 'delete' ]);

});
