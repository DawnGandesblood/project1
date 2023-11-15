<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DataController;
use App\Http\Controllers\SiswaController;
use App\Models\Siswa;

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

Route::get('/', [DashboardController::class, 'index'])->middleware('isLogin');

Route::get('dashboard', [DashboardController::class, 'index'])->middleware('isLogin');

Route::controller(SessionController::class)->group(function () {
    Route::get('/login', 'login')->middleware('isGuard');
    Route::post('/login', 'loginStore')->middleware('isGuard');
    Route::get('/register', 'register')->middleware('isGuard');
    Route::post('/register', 'registerStore')->middleware('isGuard');
    Route::get('/logout', 'logout');
});

Route::resource('data', DataController::class)->middleware('isLogin');

// Route::get('/siswa', [SiswaController::class, 'index']);
// Route::get('/siswa/edit', [SiswaController::class, 'edit']);
// Route::patch('/siswa/edit', [SiswaController::class, 'update']);
// Route::delete('/siswa', [SiswaController::class, 'delete']);

Route::controller(SiswaController::class)->group(function () {
    Route::get('/siswa', 'index');
    Route::get('/siswa/tampil', 'tampil');
    Route::patch('/siswa/tambah', 'tambah');
    Route::get('/siswa/edit', 'edit');
    Route::patch('/siswa/edit', 'update');
    Route::delete('/siswa/delete', 'delete');
});
