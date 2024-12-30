<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\AuthApiController;
use App\Http\Controllers\API\ContenApiController;
use App\Http\Controllers\API\FormApiController;
use App\Http\Controllers\API\ScreenApi;

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

//=============== Get Daftar Antrian
Route::post('/register', [AuthApiController::class, 'register']);
Route::post('/login', [AuthApiController::class, 'login']);
Route::post('/logout', [AuthApiController::class, 'logout'])->middleware('auth:sanctum');

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/all-layanan', [ContenApiController::class, 'getListLayanan_tersedia']);
    Route::get('/antrian-layanan', [ContenApiController::class, 'getDataPendaftarAntrian']);
    Route::get('/menu-layanan', [ScreenApi::class, 'index']);
    Route::post('/ambil-antrian', [FormApiController::class, 'store']);
    Route::get('/antrian', [FormApiController::class, 'detail']);
});
