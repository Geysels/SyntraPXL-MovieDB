<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MovieController;
use App\Http\Controllers\FavoriteController;

require __DIR__.'/auth.php';

//unprotected routes
Route::redirect('/','/movies');

Route::get('/movies',[MovieController::class, 'index'] )->name('movies');
Route::get('/movies/random',[MovieController::class, 'random'] )->name('movies/random');
Route::get('/movies/{id}',[MovieController::class, 'show'] )->name('showMovie');
Route::post('/movies',[MovieController::class, 'search'] )->name('searchMovies');

//protected routes
Route::middleware(['auth'])->group(function () {
    Route::get('/favorites',[FavoriteController::class, 'index'] )->name('favorites');
    Route::post('/favorites/{id}',[FavoriteController::class, 'addToFavorites'] )->name('addToFavorites');
    Route::post('/favorites/{id}/delete',[FavoriteController::class, 'removeFromFavorites'] )->name('removeFromFavorites');

    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

});