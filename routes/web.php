<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HomePageController;
use App\Http\Controllers\MovieController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth')->group(function () {
Route::get('/book/{movie_id}/{screening_id}', [MovieController::class, 'showBooking']);
Route::post('/book/{movie_id}/{screening_id}', [MovieController::class, 'addTempBooking']);
Route::post('/checkout/{movie_id}/{screening_id}', [MovieController::class, 'CheckoutBooking']);
Route::delete('/book/{movie_id}/{screening_id}', [MovieController::class, 'deleteTempBooking']);
Route::get('/booked/{movie_id}/{screening_id}', [MovieController::class, 'showBooked']);

});


Route::get('/', [HomePageController::class, 'index']);
Route::get('/currently-running-movies', [MovieController::class, 'indexRunningMovies']);
Route::get('/show/{slug}', [MovieController::class, 'index']);
Route::get('/book/{movie_id}', [MovieController::class, 'showScreenings']);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
