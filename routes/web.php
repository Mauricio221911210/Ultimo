<?php

use App\Http\Controllers\ProviderController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SystemController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;
use App\Models\Provider;
use App\Models\User;

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

Route::get('/', function () {
    return view('welcome');
});



Route::get('/home', [SystemController::class, 'index'])->name('home');


//users 
Route::get('/users', [UserController::class, 'index'])->name('user.index');
Route::post('/users/store', [UserController::class, 'store'])->name('user.store');
Route::get('/users/edit/{user}', [UserController::class, 'edit'])->name('user.edit');
Route::put('/users/{user}/update',[UserController::class, 'update'])->name('user.update');
Route::delete('/users/delete/{user}', [UserController::class, 'destroy'])->name('user.destroy');

//Providers
Route::get('/providers', [ProviderController::class, 'index'])->name('provider.index');
Route::post('/providers/store', [ProviderController::class, 'store'])->name('provider.store');
Route::get('/providers{provider}', [ProviderController::class, 'edit'])->name('provider.edit');
Route::put('/providers/{provider}/update', [ProviderController::class, 'update'])->name('provider.update');
Route::delete('/providers/delete/{provider}', [ProviderController::class, 'destroy'])->name('provider.destroy');

//Products
Route::get('/products', [ProductController::class, 'index'])->name('product.index');
Route::post('/products/store', [ProductController::class, 'store'])->name('product.store');
Route::get('/products{product}', [ProductController::class, 'edit'])->name('product.edit');
Route::put('/products/{product}/update', [ProductController::class, 'update'])->name('product.update');
Route::delete('/products/delete/{product}', [ProductController::class, 'destroy'])->name('product.destroy');

//Pedidos


//Reportes
Route::get('order/report/{order}', [PedidoController::class, 'orderReport'] )->name('order.report');

//Informacion Empresa 
Route::get('/want', function () {return view('want');})->name('Informacion');

