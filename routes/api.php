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

Route::get('/api/data/master-kecamatan', [APiFetchController::class, 'MasterKecamatanData'])->name('ApiMasterKecamatan');
