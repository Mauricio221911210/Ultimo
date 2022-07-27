<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\auth\AuthController;
use App\Http\Controllers\CarritoController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PedidoController;
use App\Http\Controllers\SystemController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProviderController;
use App\Http\Controllers\ContactanosController;
use App\Models\Pedido;
use App\Http\Controllers\MailController;
use App\Mail\ContactanosMailable;
use App\Mail\TestMail;
use Illuminate\Support\Facades\Mail;



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
})->name('login')->middleware('guest');;

Route::get('logout', [AuthController::class, 'logout'])->name('logout');

Route::post('/authenticate', [AuthController::class, 'authentication'])->name('authenticate');



Route::get('/home', [SystemController::class, 'index'])->name('home');


//users
Route::get('/users', [UserController::class, 'index'])->name('user.index')->middleware(['auth', 'admin']);
Route::post('/users/store', [UserController::class, 'store'])->name('user.store')->middleware(['auth', 'admin']);
Route::get('/users/edit/{user}', [UserController::class, 'edit'])->name('user.edit')->middleware(['auth', 'admin']);
Route::put('/users/{user}/update', [UserController::class, 'update'])->name('user.update')->middleware(['auth', 'admin']);
Route::delete('/users/delete/{user}', [UserController::class, 'destroy'])->name('user.destroy')->middleware(['auth', 'admin']);

//Providers
Route::resource('provider', ProviderController::class)->parameters(['provide' => 'provider'])->except('show', 'create')->middleware(['auth', 'admin']);

//Products
Route::get('/products', [ProductController::class, 'index'])->name('product.index')->middleware(['auth', 'admin']);
Route::post('/products/store', [ProductController::class, 'store'])->name('product.store')->middleware(['auth', 'admin']);
Route::get('/products/{product}', [ProductController::class, 'edit'])->name('product.edit')->middleware(['auth', 'admin']);
Route::put('/products/{product}/update', [ProductController::class, 'update'])->name('product.update')->middleware(['auth', 'admin']);
Route::delete('/products/delete/{product}', [ProductController::class, 'destroy'])->name('product.destroy')->middleware(['auth', 'admin']);


//Informacion Empresa
Route::get('/want', function () {
    return view('want');
})->name('Informacion');

//Carrito
Route::post('/añadir-carrito/{product}', [CarritoController::class, 'addToCart'])->name('cart.add');
Route::get('my-cart', [CarritoController::class, 'myCart'])->name('cart');
Route::delete('/delete-product/{product}', [CarritoController::class, 'deleteProductFromCart'])->name('cart.delete');

//pedidos
Route::resource('pedidos', PedidoController::class)->only(['index', 'store']);

Route::get('admin', [CarritoController::class, 'getInfoAdmin'])->name('admin');

//emails

Route::get('contactanos', [ContactanosController::class, 'index'])->name('contactanos.index');

Route::post('contactanos', [ContactanosController::class, 'store'])->name('contactanos.store');

//excel

//Route::get('/products/excel/post-export', [ProductController::class, 'export'])->name('post.excel');

//Route::get('user-list-excel', 'ProductController@exportExcel')->name('users.excel');

Route::get('/products/excel/post-export', [ProductController::class, 'exportExcel'])->name('users.excel');

Route::get('/products/excel/product-export', [ProductController::class, 'exportExcelP'])->name('products.excel');

Route::get('/products/excel/provider-export', [ProductController::class, 'exportExcelPr'])->name('providers.excel');

//PDFS 

Route::get('/products/pdf/products-pdf', [ProductController::class, 'exportPDF'])->name('products.pdf');

Route::get('/products/pdf/user-pdf', [UserController::class, 'exportPDF'])->name('users.pdf');

Route::get('/products/pdf/provider-pdf', [ProviderController::class, 'exportPDF'])->name('providers.pdf');