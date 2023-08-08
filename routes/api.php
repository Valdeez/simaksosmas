<?php

use App\Http\Controllers\ArsipdataController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KajianController;
use App\Http\Controllers\SosialisasiController;

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

Route::post('uploadModul', [SosialisasiController::class, 'upload']);
Route::post('uploadKajian', [KajianController::class, 'upload']);
Route::post('uploadDummy', [ArsipdataController::class, 'uploadDummy']);
Route::post('tambahFaq', [SosialisasiController::class, 'tambahFaq']);
Route::post('importExcel', [ArsipdataController::class, 'import']);