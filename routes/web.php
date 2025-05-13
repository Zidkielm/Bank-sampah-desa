<?php

use App\Http\Controllers\WithdrawalController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\NasabahController;
use App\Http\Controllers\PetugasController;
use App\Http\Controllers\WasteTypeController;
use App\Http\Controllers\DepositController;
use App\Http\Controllers\MonthlyFeeController;
use App\Http\Controllers\PetugasDataNasabahController;
use App\Http\Controllers\NasabahHistoryController;

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

Route::get('/landing', function () {
    return view('pages.landing.index');
})->name('landing');

// role admin
Route::middleware(['auth:sanctum', 'verified', 'role:admin'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::get('/dashboard/iuran', [MonthlyFeeController::class, 'index'])->name('iuran');
    Route::post('/dashboard/iuran', [MonthlyFeeController::class, 'store'])->name('monthly-fee.store');
    Route::get('/dashboard/iuran/check-unpaid', [MonthlyFeeController::class, 'checkUnpaidUsers'])->name('monthly-fee.check-unpaid');
    Route::get('/dashboard/iuran/{id}', [MonthlyFeeController::class, 'show'])->name('monthly-fee.show');

    Route::get('/dashboard/tarik-saldo', [WithdrawalController::class, 'index'])->name('tarik-saldo');
    Route::post('/dashboard/tarik-saldo', [WithdrawalController::class, 'store'])->name('withdrawal.store');
    Route::get('/dashboard/tarik-saldo/{id}', [WithdrawalController::class, 'show'])->name('withdrawal.show');
    Route::get('/dashboard/user-balance/{id}', [WithdrawalController::class, 'getUserBalance'])->name('user-balance');
    Route::post('/dashboard/tarik-saldo/report', [WithdrawalController::class, 'report'])->name('withdrawal.report');

    Route::get('/dashboard/setoran', [DepositController::class, 'index'])->name('setoran');
    Route::post('/dashboard/setoran', [DepositController::class, 'store'])->name('deposit.store');
    Route::get('/dashboard/setoran/{id}', [DepositController::class, 'show'])->name('deposit.show');
    Route::get('/dashboard/waste-type-price/{id}', [DepositController::class, 'getWasteTypePrice'])->name('waste-type-price');
    Route::post('/dashboard/setoran/report', [DepositController::class, 'generateReport'])->name('deposit.report');

    Route::resource('dashboard/nasabah', NasabahController::class)->names([
        'store' => 'admin.nasabah.store',
        'update' => 'admin.nasabah.update',
        'destroy' => 'admin.nasabah.destroy',
        'index' => 'data-nasabah',
    ])->except(['create', 'show', 'edit']);

    Route::resource('dashboard/petugas', PetugasController::class)->names([
        'store' => 'admin.petugas.store',
        'update' => 'admin.petugas.update',
        'destroy' => 'admin.petugas.destroy',
        'index' => 'data-petugas',
    ])->except(['create', 'show', 'edit']);

    Route::resource('dashboard/sampah', WasteTypeController::class)->names([
        'index' => 'data-sampah',
        'store' => 'admin.waste-types.store',
        'update' => 'admin.waste-types.update',
        'destroy' => 'admin.waste-types.destroy',
    ])->except(['create', 'show', 'edit']);
});

// role petugas
Route::middleware(['auth:sanctum', 'verified', 'role:petugas'])->group(function () {
    Route::get('petugas/dashboard', [DashboardController::class, 'index'])->name('petugas.dashboard');

    Route::get('petugas/dashboard/setoran', [DepositController::class, 'petugasIndex'])->name('petugas.setoran');
    Route::post('petugas/dashboard/setoran', [DepositController::class, 'store'])->name('petugas.deposit.store');
    Route::get('petugas/dashboard/setoran/{id}', [DepositController::class, 'show'])->name('petugas.deposit.show');
    Route::get('petugas/dashboard/waste-type-price/{id}', [DepositController::class, 'getWasteTypePrice'])->name('petugas.waste-type-price');
    Route::post('petugas/dashboard/setoran/report', [DepositController::class, 'petugasGenerateReport'])->name('petugas.deposit.report');

    Route::get('/petugas/dashboard/iuran', [MonthlyFeeController::class, 'petugasIndex'])->name('petugas.iuran');
    Route::post('/petugas/dashboard/iuran', [MonthlyFeeController::class, 'store'])->name('petugas.monthly-fee.store');
    Route::get('/petugas/dashboard/iuran/check-unpaid', [MonthlyFeeController::class, 'checkUnpaidUsers'])->name('petugas.monthly-fee.check-unpaid');
    Route::get('/petugas/dashboard/iuran/{id}', [MonthlyFeeController::class, 'show'])->name('petugas.monthly-fee.show');

    Route::resource('petugas/dashboard/nasabah', PetugasDataNasabahController::class)->names([
        'store' => 'petugas.nasabah.store',
        'update' => 'petugas.nasabah.update',
        'destroy' => 'petugas.nasabah.destroy',
        'index' => 'petugas.data-nasabah',
    ])->except(['create', 'show', 'edit']);
});

// role nasabah
Route::middleware(['auth:sanctum', 'verified', 'role:nasabah'])->group(function () {
    Route::get('nasabah/dashboard', [DashboardController::class, 'index'])->name('nasabah.dashboard');

    Route::get('nasabah/dashboard/riwayat/pengambilan', [NasabahHistoryController::class, 'riwayatPengambilan'])->name('nasabah.riwayat.pengambilan');
    Route::get('nasabah/dashboard/riwayat/pembelian', [NasabahHistoryController::class, 'riwayatPembelian'])->name('nasabah.riwayat.pembelian');
    Route::get('nasabah/dashboard/riwayat/pengambilan/{id}', [NasabahHistoryController::class, 'showDepositDetail'])->name('nasabah.riwayat.pengambilan.show');
    Route::get('nasabah/dashboard/riwayat/pembelian/{id}', [NasabahHistoryController::class, 'showWithdrawalDetail'])->name('nasabah.riwayat.pembelian.show');

    Route::get('/nasabah/dashboard/iuran', [MonthlyFeeController::class, 'nasabahIndex'])->name('nasabah.iuran');
    Route::post('/nasabah/dashboard/iuran', [MonthlyFeeController::class, 'nasabahStore'])->name('nasabah.monthly-fee.store');
    Route::get('/nasabah/dashboard/iuran/check-unpaid', [MonthlyFeeController::class, 'checkUnpaidUsers'])->name('nasabah.monthly-fee.check-unpaid');
    Route::get('/nasabah/dashboard/iuran/{id}', [MonthlyFeeController::class, 'nasabahShow'])->name('nasabah.monthly-fee.show');
});
