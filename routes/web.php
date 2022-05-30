<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MovieController;

require __DIR__.'/auth.php';

//unprotected routes
Route::redirect('/','/movies');

Route::get('/movies',[MovieController::class, 'index'] )->name('movies');
Route::get('/movies/random',[MovieController::class, 'random'] )->name('movies/random');
Route::get('/movies/{id}',[MovieController::class, 'show'] )->name('showMovie');
Route::post('/movies',[MovieController::class, 'search'] )->name('searchMovies');

//protected routes
Route::middleware(['auth'])->group(function () {

    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

});