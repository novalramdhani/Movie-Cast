<?php

use App\Http\Controllers\{
    ActorController,
    MovieController,
    TvShowController
};

use Illuminate\Support\Facades\Route;

Route::get('/', [MovieController::class, 'index'])->name('movies.index');
Route::get('/movies/{movie}', [MovieController::class, 'show'])->name('movies.show');

Route::get('/actors', [ActorController::class, 'index'])->name('actors.index');
Route::get('/actors/page/{page?}', [ActorController::class, 'index']);
Route::get('/actors/{actor}', [ActorController::class, 'show'])->name('actors.show');

Route::get('/tv', [TvShowController::class, 'index'])->name('tv.index');
Route::get('/tv/{id}', [TvShowController::class, 'show'])->name('tv.show');
