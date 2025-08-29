<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Produit2Controller;
use App\Http\Controllers\RapportController;

// Route::get('/', function () {
//     return view('base');
// });

Route::get('/', [RapportController::class, 'index'])->name('dashboard');

Route::resource('produits', Produit2Controller::class);
Route::get('/rapport', [RapportController::class, 'index'])->name('produits.rapport');



Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
