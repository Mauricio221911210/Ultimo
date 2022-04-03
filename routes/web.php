<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PedidoController;
use App\Http\Controllers\SystemController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProviderController;

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

Route::get('/login', function () {
    return view('welcome');
})->name('login');
Route::get('logout', [AuthController::class, 'logout'])->name('logout');

Route::post('/authenticate', [AuthController::class, 'authentication'])->name('authenticate');

Route::get('/home', [SystemController::class, 'index'])->name('home');


//users
Route::get('/users', [UserController::class, 'index'])->name('user.index')->middleware(['auth', 'admin']);
Route::post('/users/store', [UserController::class, 'store'])->name('user.store')->middleware(['auth', 'admin']);
Route::get('/users/edit/{user}', [UserController::class, 'edit'])->name('user.edit')->middleware(['auth', 'admin']);
Route::put('/users/{user}/update',[UserController::class, 'update'])->name('user.update')->middleware(['auth', 'admin']);
Route::delete('/users/delete/{user}', [UserController::class, 'destroy'])->name('user.destroy')->middleware(['auth', 'admin']);

//Providers
Route::resource('provider', ProviderController::class)->parameters(['provide' => 'provider'])->except('show', 'create')->middleware(['auth', 'admin']);

//Products
Route::get('/products', [ProductController::class, 'index'])->name('product.index')->middleware(['auth', 'admin']);
Route::post('/products/store', [ProductController::class, 'store'])->name('product.store')->middleware(['auth', 'admin']);
Route::get('/products{product}', [ProductController::class, 'edit'])->name('product.edit')->middleware(['auth', 'admin']);
Route::put('/products/{product}/update', [ProductController::class, 'update'])->name('product.update')->middleware(['auth', 'admin']);
Route::delete('/products/delete/{product}', [ProductController::class, 'destroy'])->name('product.destroy')->middleware(['auth', 'admin']);

//Pedidos


//Reportes
Route::get('order/report/{order}', [PedidoController::class, 'orderReport'] )->name('order.report')->middleware(['auth', 'admin']);

//Informacion Empresa
Route::get('/want', function () {return view('want');})->name('Informacion');

