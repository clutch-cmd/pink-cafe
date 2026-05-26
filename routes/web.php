<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
//Pagnile principale
Route::get('/', [PageController::class, 'home'])->name('home');
Route::get('/meniu', [PageController::class, 'meniu'])->name('meniu');
Route::get('/contacte', [PageController::class, 'contacte'])->name('contacte');
Route::get('/find-us', [PageController::class, 'findUs'])->name('find-us');
Route::get('/comanda', [PageController::class, 'comanda'])->name('comanda');
//Logarea și înregistrarea
Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::get('/register', [RegisterController::class, 'index'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
// Comanda
Route::get('/comanda', [App\Http\Controllers\ComandaController::class, 'index'])->name('comanda');
Route::post('/comanda', [App\Http\Controllers\ComandaController::class, 'store'])->name('comanda.store');
Route::get('/comanda/succes/{id}', [App\Http\Controllers\ComandaController::class, 'succes'])->name('comanda.succes');
// Admin routes
Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [App\Http\Controllers\AdminController::class, 'dashboard'])->name('dashboard');
    Route::get('/comenzi', [App\Http\Controllers\AdminController::class, 'comenzi'])->name('comenzi');
    Route::post('/comenzi/{id}/status', [App\Http\Controllers\AdminController::class, 'schimbaStatus'])->name('comenzi.status');
    Route::delete('/comenzi/{id}', [App\Http\Controllers\AdminController::class, 'stergeComanda'])->name('comenzi.sterge');
    Route::get('/produse', [App\Http\Controllers\AdminController::class, 'produse'])->name('produse');
    Route::post('/produse', [App\Http\Controllers\AdminController::class, 'adaugaProdus'])->name('produse.adauga');
    Route::delete('/produse/{id}', [App\Http\Controllers\AdminController::class, 'stergeProdus'])->name('produse.sterge');
    Route::put('/produse/{id}', [App\Http\Controllers\AdminController::class, 'editeazaProdus'])->name('produse.editeaza');
});
Route::post('/comanda', [ComandaController::class, 'store'])
    ->name('comanda.store')
    ->middleware('throttle:5,1'); // max 5 comenzi pe minut