<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DataLengkapController;
use App\Http\Controllers\DataLengkapMemberController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\MasterKecamatanController;
use App\Http\Controllers\MasterKelurahanController;
use App\Http\Controllers\MasterCalegController;
use App\Http\Controllers\MasterPartaiController;
use App\Http\Controllers\MasterUserController;

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

Route::get('/', function () {
    return view('auth.login');
})->middleware("guest");

Route::controller(DataLengkapMemberController::class)->prefix('/member/')->group(function(){
    Route::get('dataLengkap', 'index')->name('dataLengkapMember')->middleware('auth');
    Route::get('dataLengkap/create', 'create')->name('dataLengkapMemberCreate')->middleware('auth');
    Route::post('dataLengkap/store', 'store')->name('dataLengkapMemberStore')->middleware('auth');
    Route::get('dataLengkap/{id}/show', 'show')->name('dataLengkapMemberShow')->middleware('auth');
    Route::get('dataLengkap/{id}/edit', 'edit')->name('dataLengkapMemberEdit')->middleware('auth');
    Route::patch('dataLengkap/{id}', 'update')->name('dataLengkapMemberUpdate')->middleware('auth');
    Route::delete('dataLengkap/delete/{id}', 'destroy')->name('dataLengkapMemberDelete')->middleware('auth');
});

Route::controller(DashboardController::class)->group(function(){
    Route::get('dashboard', 'index')->name('dashboard')->middleware('auth');
    // Route::get('dashboard/create', 'create')->name('dashboardCreate')->middleware(['auth','check.role']);
    // Route::post('dashboard/store', 'store')->name('dashboardStore')->middleware(['auth','check.role']);
    // Route::get('dashboard/{id}/show', 'show')->name('dashboardShow')->middleware(['auth','check.role']);
    // Route::get('dashboard/{id}/edit', 'edit')->name('dashboardEdit')->middleware(['auth','check.role']);
    // Route::patch('dashboard/{id}', 'update')->name('dashboardUpdate')->middleware(['auth','check.role']);
    // Route::delete('dashboard/delete/{id}', 'delete')->name('dashboardDelete')->middleware(['auth','check.role']);
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::prefix('/admin/')->middleware(['auth', 'check.role'])->group(function () {

    //DATA LENGKAP

    Route::get('dataLengkap', [DataLengkapController::class, 'index'])->name('dataLengkap');
    Route::get('dataLengkap/create',[DataLengkapController::class, 'create'])->name('dataLengkapCreate');
    Route::post('dataLengkap/store', [DataLengkapController::class, 'store'])->name('dataLengkapStore');
    Route::get('dataLengkap/{id}/show', [DataLengkapController::class, 'show'])->name('dataLengkapShow');
    Route::get('dataLengkap/{id}/edit', [DataLengkapController::class, 'edit'])->name('dataLengkapEdit');
    Route::patch('dataLengkap/{id}', [DataLengkapController::class, 'update'])->name('dataLengkapUpdate');
    Route::delete('dataLengkap/delete/{id}/', [DataLengkapController::class, 'destroy'])->name('dataLengkapDelete');
    // Route::get('dataLengkap/export/queue', [DataLengkapController::class, 'export'])->name('dataLengkapExport');
    Route::get('dataLengkap/export/queue/spatie', [DataLengkapController::class, 'spatie'])->name('spatie');

    //END DATA LENGKAP

    //MASTER KECAMATAN

    Route::get('master-kecamatan', [MasterKecamatanController::class, 'index'])->name('kecamatanIndex');
    Route::get('master-kecamatan/create', [MasterKecamatanController::class, 'create'])->name('kecamatanCreate');
    Route::post('master-kecamatan', [MasterKecamatanController::class, 'store'])->name('kecamatanStore');
    Route::get('master-kecamatan/{id}', [MasterKecamatanController::class, 'show'])->name('kecamatanShow');
    Route::get('master-kecamatan/{id}/edit', [MasterKecamatanController::class, 'edit'])->name('kecamatanEdit');
    Route::patch('master-kecamatan/{id}', [MasterKecamatanController::class, 'update'])->name('kecamatanUpdate');
    Route::delete('master-kecamatan/delete/{id}', [MasterKecamatanController::class, 'destroy'])->name('kecamatanDestroy');

    //END MASTER KECAMATAN

    //MASTER KELURAHAN

    Route::get('master-kelurahan', [MasterKelurahanController::class, 'index'])->name('kelurahanIndex');
    Route::get('master-kelurahan/create', [MasterKelurahanController::class, 'create'])->name('kelurahanCreate');
    Route::post('master-kelurahan', [MasterKelurahanController::class, 'store'])->name('kelurahanStore');
    Route::get('master-kelurahan/{id}', [MasterKelurahanController::class, 'show'])->name('kelurahanShow');
    Route::get('master-kelurahan/{id}/edit', [MasterKelurahanController::class, 'edit'])->name('kelurahanEdit');
    Route::patch('master-kelurahan/{id}', [MasterKelurahanController::class, 'update'])->name('kelurahanUpdate');
    Route::delete('master-kelurahan/delete/{id}', [MasterKelurahanController::class, 'destroy'])->name('kelurahanDestroy');

    //END MASTER KELURAHAN

    //MASTER CALEG

    Route::get('master-caleg', [MasterCalegController::class, 'index'])->name('calegIndex');
    Route::get('master-caleg/create', [MasterCalegController::class, 'create'])->name('calegCreate');
    Route::post('master-caleg', [MasterCalegController::class, 'store'])->name('calegStore');
    Route::get('master-caleg/{id}', [MasterCalegController::class, 'show'])->name('calegShow');
    Route::get('master-caleg/{id}/edit', [MasterCalegController::class, 'edit'])->name('calegEdit');
    Route::patch('master-caleg/{id}', [MasterCalegController::class, 'update'])->name('calegUpdate');
    Route::delete('master-caleg/delete/{id}', [MasterCalegController::class, 'destroy'])->name('calegDestroy');

    //END MASTER CALEG

    //MASTER PARTAI

    Route::get('master-partai', [MasterPartaiController::class, 'index'])->name('partaiIndex');
    Route::get('master-partai/create', [MasterPartaiController::class, 'create'])->name('partaiCreate');
    Route::post('master-partai', [MasterPartaiController::class, 'store'])->name('partaiStore');
    Route::get('master-partai/{id}', [MasterPartaiController::class, 'show'])->name('partaiShow');
    Route::get('master-partai/{id}/edit', [MasterPartaiController::class, 'edit'])->name('partaiEdit');
    Route::patch('master-partai/{id}', [MasterPartaiController::class, 'update'])->name('partaiUpdate');
    Route::delete('master-partai/delete/{id}', [MasterPartaiController::class, 'destroy'])->name('partaiDestroy');

    //END MASTER PARTAI

    // MASTER USER

    Route::get('master-user', [MasterUserController::class, 'index'])->name('userIndex');
    Route::get('master-user/create', [MasterUserController::class, 'create'])->name('userCreate');
    Route::post('master-user', [MasterUserController::class, 'store'])->name('userStore');
    Route::get('master-user/{id}', [MasterUserController::class, 'show'])->name('userShow');
    Route::get('master-user/{id}/edit', [MasterUserController::class, 'edit'])->name('userEdit');
    Route::patch('master-user/{id}', [MasterUserController::class, 'update'])->name('userUpdate');
    Route::delete('master-user/delete/{id}', [MasterUserController::class, 'destroy'])->name('userDestroy');
});
