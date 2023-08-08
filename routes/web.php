<?php

use App\Models\Kajian;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KajianController;
use App\Http\Controllers\ArsipdataController;
use App\Http\Controllers\IntervensiController;
use App\Http\Controllers\KontenController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\SosialisasiController;

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

//Landing Page route
Route::get('/', function () {
    return view('index');
});

//Login route
Route::get('/sinkronisasi', [LoginController::class, 'sinkronisasi']);
Route::post('/login', [LoginController::class, 'login']);

//E-Sosialisasi route
Route::get('/modul', [SosialisasiController::class, 'modul']);
Route::get('/modul/search', [SosialisasiController::class, 'search']);
Route::get('/modul/download/{id}', [SosialisasiController::class, 'download']);
Route::get('/faq', [SosialisasiController::class, 'faq']);

//E-Kajian route
Route::get('/kajian/{kategori}', [KajianController::class, 'kajian']);
Route::get('/kajian/{kategori}/search', [KajianController::class, 'search']);
Route::get('/kajian/download/{id}', [KajianController::class, 'download']);

//E-Arsip Data route
Route::get('/petadata', [ArsipdataController::class, 'petadata']);
Route::get('/petadata/{tahun}/{bulan}', [ArsipdataController::class, 'select']);
Route::get('/petadata/{tahun}/{bulan}/search', [ArsipdataController::class, 'search']);
Route::get('/petadata/download/{tahun}/{bulan}', [ArsipdataController::class, 'download']);

//E-Intervensi route
Route::get('/laporan', [IntervensiController::class, 'laporan']);
Route::get('/laporan/search', [IntervensiController::class, 'search']);
Route::get('/laporan/download/{id}', [IntervensiController::class, 'download']);

//E-Konten route
Route::get('/warta', [KontenController::class, 'warta']);
Route::get('/warta/search', [KontenController::class, 'search']);
Route::get('/warta/{id}', [KontenController::class, 'detail']);

//Admin Permission
Route::group(['middleware' => 'permission'], function() {
    //Logout
    Route::get('/logout', [LoginController::class, 'logout']);

    //E-Sosialisasi
    Route::post('/modul/upload', [SosialisasiController::class, 'upload']);
    Route::delete('/modul/delete/{id}', [SosialisasiController::class, 'delete']);
    Route::put('/modul/edit/{id}', [SosialisasiController::class, 'edit']);

    //E-Kajian
    Route::post('/kajian/upload', [KajianController::class, 'upload']);
    Route::delete('/kajian/delete/{id}', [KajianController::class, 'delete']);
    Route::put('/kajian/edit/{id}', [KajianController::class, 'edit']);

    //E-Arsip Data
    Route::post('/petadata/upload', [ArsipdataController::class, 'import']);
    Route::delete('/petadata/delete/{tahun}/{bulan}', [ArsipdataController::class, 'delete']);
    
    //E-Intervensi
    Route::post('/laporan/upload', [IntervensiController::class, 'upload']);
    Route::delete('/laporan/delete/{id}', [IntervensiController::class, 'delete']);
    Route::put('/laporan/edit/{id}', [IntervensiController::class, 'edit']);
    
    //E-Konten
    Route::post('/warta/upload', [KontenController::class, 'upload']);
    Route::delete('/warta/delete/{id}', [KontenController::class, 'delete']);
    Route::put('/warta/edit/{id}', [KontenController::class, 'edit']);
});