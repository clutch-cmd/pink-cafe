<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;

Route::get('/', [PageController::class, 'home'])->name('home');
Route::get('/meniu', [PageController::class, 'meniu'])->name('meniu');
Route::get('/contacte', [PageController::class, 'contacte'])->name('contacte');
Route::get('/find-us', [PageController::class, 'findUs'])->name('find-us');
Route::get('/comanda', [PageController::class, 'comanda'])->name('comanda');

Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::get('/register', [RegisterController::class, 'index'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');