<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Api\ProduitControllerApi;
use App\Http\Controllers\CategorieController;

Route::Resource('produitapi', ProduitControllerApi::class);

Route::Resource('categorieapi', CategorieController::class);

