<?php

use App\Http\Controllers\add_carsController;
use App\Http\Controllers\adminController;
use App\Http\Controllers\carsController;
use App\Http\Controllers\dashboardController;
use App\Http\Controllers\loginController;
use App\Http\Controllers\orderController;
use App\Http\Controllers\pelangganController;
use App\Http\Controllers\registerController;
use App\Http\Controllers\riwayatController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('auth.login');
// });
Route::get('/cars', [carsController::class, 'index'])->middleware('auth');
Route::get('/admin', [adminController::class, 'index'])->middleware('auth');
Route::get('/order', [orderController::class, 'index'])->middleware('auth');
Route::get('/riwayat', [riwayatController::class, 'index'])->middleware('auth');
Route::get('/pelanggan', [pelangganController::class, 'index'])->middleware('auth');
Route::get('/dashboard', [dashboardController::class, 'index'])->middleware('auth');

Route::get('/add_cars', [add_carsController::class, 'index'])->middleware('auth');
Route::post('/add', [add_carsController::class, 'store'])->name('store.add')->middleware('auth');

Route::get('/', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/log', [LoginController::class, 'login'])->name('login.store');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');


Route::get('/register', [registerController::class, 'index'])->name('register');
Route::post('/register', [RegisterController::class, 'store'])->name('register.store');

// route sidebar aktif
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
Route::get('/order', [orderController::class, 'index'])->name('order');
Route::get('/pelanggan', [pelangganController::class, 'index'])->name('pelanggan');
Route::get('/riwayat', [riwayatController::class, 'index'])->name('riwayat');
Route::get('/cars', [carsController::class, 'index'])->name('cars');
Route::post('/add_cars', [add_carsController::class, 'index'])->name('add_cars');
