<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\HistoryController;
use App\Http\Controllers\BiddingController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ApprovalController;

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

//riwayat produk
// Route::view('/crudriwayatform', 'crudriwayatform')->middleware('can:isManager');
Route::get('/crudriwayatform', [HistoryController::class, 'crudform'])->middleware('can:isManager');
Route::post('/addriwayat', [HistoryController::class, 'save'])->middleware('can:isManager');
Route::get('/hapusriwayat', [HistoryController::class, 'delete'])->middleware('can:isManager');

//bidding
Route::get('/konfirmasi_bayar/{id}', [BiddingController::class, 'view_konfirmasi_bayar'])->middleware('can:isUser');
Route::post('/konfirmasi_bayar', [BiddingController::class, 'save_konfirmasi_bayar'])->middleware('can:isUser');
Route::get('/winner_list', [BiddingController::class, 'view_winner'])->middleware('can:isUser');

//user
Route::get('/user', [UserController::class, 'index'])->middleware('can:isAdmin');
Route::get('/user/tambah', [UserController::class, 'view_tambah_user'])->middleware('can:isAdmin');
Route::post('/user/tambah', [UserController::class, 'save_user'])->middleware('can:isAdmin');
Route::get('/user/update/{id}', [UserController::class, 'view_update_user'])->middleware('can:isAdmin');
Route::post('/user/update/', [UserController::class, 'update_user'])->middleware('can:isAdmin');
Route::get('/user/hapus/{id}', [UserController::class, 'delete'])->middleware('can:isAdmin');

//approval
Route::get('/approve/show_list_bid', [ApprovalController::class, 'view_approval_winner']);
Route::get('/approve/choose_winner/{id1}/{id2}', [ApprovalController::class, 'approve_winner']);
Route::get('/approve/show_list_payment', [ApprovalController::class, 'view_approval_winner']);
Route::get('/approve/payment/{id}', [ApprovalController::class, 'approve_winner']);
