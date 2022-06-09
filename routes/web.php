<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\ProductController;

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
    return view('main', ['title' => 'Home']);
});

//login
Route::get('/login', [AuthController::class, 'index']);
Route::post('/auth', [AuthController::class, 'authenticate']);
Route::get('/logout', [AuthController::class, 'logout']);

//register
Route::get('/register', [RegisterController::class, 'index']);
Route::post('/register', [RegisterController::class, 'register']);

//produk
Route::get('/produk', [ProductController::class, 'get']);
Route::get('/detail', [ProductController::class, 'get']);
Route::get('/crudproduk', [ProductController::class, 'getcrud'])->middleware('can:isManager');
Route::view('/addprodukform', 'crudprodukform')->middleware('can:isManager');
Route::post('/addproduk', [ProductController::class, 'save'])->middleware('can:isManager');
Route::get('/editprodukform', [ProductController::class, 'editform'])->middleware('can:isManager');
Route::post('/editproduk', [ProductController::class, 'edit'])->middleware('can:isManager');
Route::get('/hapusproduk', [ProductController::class, 'delete'])->middleware('can:isManager');