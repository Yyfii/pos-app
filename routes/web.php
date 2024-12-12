<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoriaController;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\URL;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
URL::forceScheme('https');


/// Rota para listar os produtos
Route::get('/products', [ProductController::class, 'index'])->name('products.index');

// Rota para o formulário de criação de produto
Route::get('/products/create', [ProductController::class, 'create'])->name('products.create');

// Rota para armazenar o novo produto
Route::post('/products', [ProductController::class, 'store'])->name('products.store');

// Rota para mostrar detalhes do produto
Route::get('/products/{id}', [ProductController::class, 'show'])->name('products.show');

// Rota para editar um produto
Route::get('/products/{id}/edit', [ProductController::class, 'edit'])->name('products.edit');

// Rota para atualizar um produto
Route::put('/products/{id}', [ProductController::class, 'update'])->name('products.update');

// Rota para excluir um produto
Route::delete('/products/{id}', [ProductController::class, 'destroy'])->name('products.destroy');


//Categorias
Route::get('/categorias', CategoriaController::class .'@index')->name('categorias.index');
// returns the form for adding a post
Route::get('/categorias/create', CategoriaController::class . '@create')->name('categorias.create');
// adds a post to the database
Route::post('/categorias', CategoriaController::class .'@store')->name('categorias.store');
// returns a page that shows a full post
Route::get('/categorias/{id}', CategoriaController::class .'@show')->name('categorias.show');
// returns the form for editing a post
Route::get('/categorias/{id}/edit', CategoriaController::class .'@edit')->name('categorias.edit');
// updates a post
Route::put('/categorias/{id}', CategoriaController::class .'@update')->name('categorias.update');
// deletes a post
Route::delete('/categorias/{id}', CategoriaController::class .'@destroy')->name('categorias.destroy');