<?php

use App\Http\Controllers\ContactController;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

// Raiz redireciona para login
Route::get('/', fn() => redirect()->route('login'));

// Auth
Route::get('login',  [AuthController::class, 'showLogin'])->name('login');
Route::post('login', [AuthController::class, 'login'])->name('login.process');
Route::post('logout', [AuthController::class, 'logout'])->name('logout');

// Rotas protegidas
Route::middleware('auth')->group(function () {
    // `/home` como alias para a listagem
    Route::get('home', fn() => redirect()->route('contacts.index'))->name('home');

    // CRUD completo (incluindo index)
    Route::resource('contacts', ContactController::class);
});
