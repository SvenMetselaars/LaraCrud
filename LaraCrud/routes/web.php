<?php

use App\Http\Controllers\DiscController;
use App\Http\Controllers\UserController;
use App\Models\Disc;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    $Discs = Disc::all();
    return view('home', ['discs' => $Discs]);
});

Route::get('/register', function () {
    $Discs = Disc::all();
    return view('/register', ['discs' => $Discs]);
});

Route::get('/movies', function () {
    $Discs = Disc::all();
    return view('/movies', ['discs' => $Discs]);
});

Route::post('/register', [UserController::class, 'register']);
Route::post('/logout', [UserController::class, 'logout']);
Route::post('/login', [UserController::class, 'login']);

// disc related routes
Route::post('/add-disc', [DiscController::class, 'AddDisc']);
Route::get('/view/{disc}', [DiscController::class, 'showViewScreen']);
Route::put('/edit-disc/{disc}', [DiscController::class, 'updateDisc']);
Route::delete('/delete-disc/{disc}', [DiscController::class, 'deleteDisc']);
