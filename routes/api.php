<?php

use Illuminate\Http\Request;
use App\Http\Controllers\APiFetchController;
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

Route::get('/data/master-kecamatan', [APiFetchController::class, 'MasterKecamatanData'])->name('ApiMasterKecamatan');
Route::get('/data/master-kelurahan', [APiFetchController::class, 'MasterKelurahanData'])->name('ApiMasterKelurahan');
Route::get('/data/master-caleg', [APiFetchController::class, 'MasterCalegData'])->name('ApiMasterCaleg');
Route::get('/data/master-partai', [APiFetchController::class, 'MasterPartaiData'])->name('ApiMasterPartai');
Route::get('/data/master-user', [APiFetchController::class, 'MasterUserData'])->name('ApiMasterUser');
Route::get('/data/dataLengkap', [APiFetchController::class, 'DataLengkap'])->name('ApiDataLengkap');