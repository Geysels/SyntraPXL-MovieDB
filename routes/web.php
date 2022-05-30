<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MovieController;

require __DIR__.'/auth.php';

//unprotected routes
Route::get('/', function () {
    return view('welcome');
});

//protected routes
Route::middleware(['auth'])->group(function () {

    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

});