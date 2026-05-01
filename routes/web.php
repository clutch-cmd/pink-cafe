<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;

Route::get('/', [PageController::class, 'home'])->name('home');
Route::get('/meniu', [PageController::class, 'meniu'])->name('meniu');
Route::get('/contacte', [PageController::class, 'contacte'])->name('contacte');
Route::get('/find-us', [PageController::class, 'findUs'])->name('find-us');
Route::get('/comanda', [PageController::class, 'comanda'])->name('comanda');