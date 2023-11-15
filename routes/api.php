<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DatasController;
use App\Http\Controllers\SiswaController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/', function () {
    return response()->json([
        'status' => false,
        'message' => 'akses dilarang',
    ], 401);
    // dd('TEST API');
})->name('login');

Route::controller(DatasController::class)->group(function () {
    Route::get('/data', 'index')->middleware('auth:sanctum');
    Route::get('/data', 'store')->middleware('auth:sanctum');
    Route::post('/user', 'user');
    Route::post('/login', 'login');
});

// Route::get('/siswa', function(){
//     view('siswa/index');
// });

Route::get('/siswa', [SiswaController::class,'index']);
