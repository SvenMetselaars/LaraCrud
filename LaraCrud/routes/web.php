<?php

use App\Http\Controllers\MovieController;
use App\Http\Controllers\UserController;
use App\Models\Movie;
use App\Models\Category;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    $movies = Movie::all();
    $categories = Category::all();
    return view('home', ['movies' => $movies, 'categories' => $categories]);
});

Route::get('/register', function () {
    return view('/register');
});

Route::get('/movies', function () {
    $movies = Movie::all();
    $categories = Category::all();
    return view('/movies', ['movies' => $movies, 'categories' => $categories]);
});

Route::post('/register', [UserController::class, 'register']);
Route::post('/logout', [UserController::class, 'logout']);
Route::post('/login', [UserController::class, 'login']);

// Movie related routes
Route::post('/add-movie', [MovieController::class, 'AddMovie']);
Route::get('/view/{movie}', [MovieController::class, 'showViewScreen']);
Route::put('/edit-movie/{movie}', [MovieController::class, 'updateMovie']);
Route::delete('/delete-movie/{movie}', [MovieController::class, 'deleteMovie']);
