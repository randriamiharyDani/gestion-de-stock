<?php

use App\Http\Controllers\AccueilController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProduitController;
use App\Http\Controllers\StockController;
use Illuminate\Foundation\Configuration\Middleware;
use Illuminate\Support\Facades\Route;

// Route::get('index', function () {
//     return view('index');
// });
// route publique
Route::get('/', [AuthController::class ,'index'])->name('login') ;
Route::get('auth/register', [AuthController::class, 'register'])->name('register');
Route::post('auth/login', [AuthController::class, 'auth'])->name('auth.authLogin');
Route::post('auth/traitementRegister', [AuthController::class, 'traitementRegister'])->name('auth.traitementRegister');
Route::get('logout', [AuthController::class, 'deconnexion'])->name('logout');

// route protege
// route protege
Route::get('/accueil', [AccueilController::class, 'index'])->name('accueil');
Route::post('/article', [ProduitController::class, 'add_product'])->name('add-product');
Route::get('/article', [ProduitController::class, 'article'])->name('article');
Route::get('/product-list', [ProduitController::class, 'product_list'])->name('product-list');
Route::get('/delete-product/{id}', [ProduitController:: class, 'delete_product'])->name('delete-product');
Route::get('/select-product/{id}', [ProduitController::class, 'select_product'])->name('select-product');

Route::get('/manager_stock', [StockController::class, 'listStock'])->name('manager_stock');
Route::post('/add_stock', [StockController::class , 'addStock'])->name('add_stock') ;


