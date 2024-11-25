<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoleController;

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

Route::middleware(['auth'])->get('/selectRole', [AuthController::class, 'showRoleSelectionPage'])->name('selectRole');
Route::middleware(['auth'])->post('/selectRole', [AuthController::class, 'handleRoleSelection'])->name('handleRoleSelection');


// Dashboard Routes for Specific Roles
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard/mahasiswa', function () {
        return view('dashboard.mahasiswa');
    })->name('mahasiswaDash');

    Route::get('/dashboard/bagianakademik', function () {
        return view('dashboard.bagianakademik');
    })->name('bagianAkademikDash');

    Route::get('/dashboard/dekan', function () {
        return view('dashboard.dekan');
    })->name('dekanDash');

    Route::get('/dashboard/kaprodi', function () {
        return view('dashboard.kaprodi');
    })->name('kaprodiDash');

    Route::get('/dashboard/pembimbingakademik', function () {
        return view('dashboard.pembimbingakademik');
    })->name('pembimbingAkademikDash');
});

Route ::get('/dekan/pengajuan_ruangan', function(){
    return view('dekan.pengajuan_ruangan');
});

Route ::get('/dekan/pengajuan_jadwal', function(){
    return view('dekan.pengajuan_jadwal');
});