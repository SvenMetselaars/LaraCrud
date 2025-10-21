<?php

use App\Http\Controllers\DiscController;
use App\Http\Controllers\UserController;
use App\Models\Disc;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

Route::get('/register', function () {
    $Discs = Disc::all();
    return view('Login-register/register', ['discs' => $Discs]);
});

Route::post('/register', [UserController::class, 'register']);
Route::post('/logout', [UserController::class, 'logout']);
Route::post('/login', [UserController::class, 'login']);

// disc related routes
Route::post('/add-disc', [DiscController::class, 'AddDisc']);