<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\LoginController;

Route::get('/', function () {
    return view('welcome');
})->name("welcome");

// Formulario de login
Route::get('login', [LoginController::class, 'loginForm'])->name('login');

// Procesar el login
Route::post('login', [LoginController::class, 'login']);

// Logout
Route::get('logout', [LoginController::class, 'logout'])->name('logout');

// Filtro Buscador
Route::get('blogs/search', [BlogController::class, 'search'])->name('blogs.search');

// ESTO SIEMPRE ABAJO!!
Route::resource('blogs', BlogController::class);