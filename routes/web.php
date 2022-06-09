<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\BiddingController;

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

//bidding
Route::get('/konfirmasi_bayar/{id}', [BiddingController::class, 'view_konfirmasi_bayar'])->middleware('can:isUser');
Route::post('/konfirmasi_bayar', [BiddingController::class, 'save_konfirmasi_bayar'])->middleware('can:isUser');
Route::post('/winner_list', [BiddingController::class, 'view_winner'])->middleware('can:isUser');