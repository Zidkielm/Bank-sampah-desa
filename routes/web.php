<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DataFeedController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\JobController;
use App\Http\Controllers\CampaignController;
use App\Http\Controllers\NasabahController;
use App\Http\Controllers\PetugasController;

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

Route::redirect('/', 'login');

// role admin
Route::middleware(['auth:sanctum', 'verified', 'role:admin'])->group(function () {

    Route::get('/json-data-feed', [DataFeedController::class, 'getDataFeed'])->name('json_data_feed');

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/dashboard/data-nasabah', [AdminController::class, 'dataNasabah'])->name('data-nasabah');
    Route::get('/dashboard/data-petugas', [AdminController::class, 'dataPetugas'])->name('data-petugas');
    Route::get('/dashboard/data-sampah', [AdminController::class, 'dataSampah'])->name('data-sampah');
    Route::get('/dashboard/setoran', [AdminController::class, 'setoran'])->name('setoran');
    Route::get('/dashboard/tarik-saldo', [AdminController::class, 'tarikSaldo'])->name('tarik-saldo');
    Route::get('/dashboard/iuran', [AdminController::class, 'iuran'])->name('iuran');
});

// role petugas
Route::middleware(['auth:sanctum', 'verified', 'role:petugas'])->group(function () {
    Route::get('petugas/dashboard', [DashboardController::class, 'index'])->name('petugas.dashboard');
    Route::get('petugas/dashboard/setoran', [PetugasController::class, 'setoran'])->name('petugas.setoran');
    Route::get('petugas/dashboard/iuran', [PetugasController::class, 'iuran'])->name('petugas.iuran');
});

// role nasabah
Route::middleware(['auth:sanctum', 'verified', 'role:nasabah'])->group(function () {
    Route::get('nasabah/dashboard', [DashboardController::class, 'index'])->name('nasabah.dashboard');
    Route::get('nasabah/dashboard/iuran', [NasabahController::class, 'iuran'])->name('nasabah.iuran');
    Route::get('nasabah/dashboard/riwayat', [NasabahController::class, 'riwayat'])->name('nasabah.riwayat');
});
