<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IRSController;
use App\Http\Controllers\KHSController;
use App\Http\Controllers\BuatIrsController;
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

Route::get('/', function(){
    return view('loginPage');
})->name('loginPage');

Route::post('/', [AuthController::class, 'login']);
Route::get('/logout', [AuthController::class, 'logout'])->middleware('auth');

Route::middleware(['auth'])->get('/selectRole', [AuthController::class, 'showRoleSelectionPage'])->name('selectRole');
Route::middleware(['auth'])->post('/selectRole', [AuthController::class, 'handleRoleSelection'])->name('handleRoleSelection');


// Dashboard Routes for Specific Roles
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard/mahasiswa', function () {
        return view('mahasiswa.mahasiswa');
    })->name('mahasiswaDash');

    Route::get('/dashboard/bagianakademik', function () {
        return view('bagianAkademik.bagianakademik');
    })->name('bagianAkademikDash');

    Route::get('/dashboard/dekan', function () {
        return view('dekan.dekan');
    })->name('dekanDash');

    Route::get('/dashboard/kaprodi', function () {
        return view('kaprodi.kaprodi');
    })->name('kaprodiDash');

    Route::get('/dashboard/pembimbingakademik', function () {
        return view('pembimbingAkademik.pembimbingakademik');
    })->name('pembimbingAkademikDash');
});

Route ::get('/dekan/pengajuan_ruangan', function(){
    return view('dekan.pengajuan_ruangan');
});

Route ::get('/dekan/pengajuan_jadwal', function(){
    return view('dekan.pengajuan_jadwal');
});

Route::get('/buat_irs', [BuatIrsController::class, 'index'])->name('buat_irs');

Route::get('/irs', [IRSController::class, 'index'])->name('irs');

Route::get('/khs', [KHSController::class, 'index'])->name('khs');

// Bagian Kaprodi
use App\Http\Controllers\KaprodiController;

Route::get('/Dashboard', [KaprodiController::class, 'index']);
Route::get('/TabelMK', [KaprodiController::class, 'tabelmatkul']);
Route::get('/TabelJD', [KaprodiController::class, 'tabeljadwal']);
Route::get('/SusunMK', [KaprodiController::class, 'susunmatkul']);
Route::get('/SusunJD', [KaprodiController::class, 'susunjadwal']);