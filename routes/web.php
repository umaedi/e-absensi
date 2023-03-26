<?php

use Illuminate\Support\Facades\Route;
use Maatwebsite\Excel\Row;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('opd/admin', function () {
    return view('opd.login.index');
});

Route::prefix('opd')->group(function () {
    Route::middleware(['opd', 'pegawai'])->group(function () {
        Route::get('/dashboard', \App\Http\Controllers\Opd\Dashboard::class)->name('opd.dashboard');

        Route::controller(\App\Http\Controllers\Opd\PegawaiController::class)->group(function () {
            Route::get('/pegawai', 'index');
            Route::get('/pegawai/{id}', 'show')->name('opd.pejabat.show');
            Route::post('/pegawai/update/{id}', 'update')->name('opd.pegawai.update');
        });
    });
});

Route::get('/', function () {

    if (auth()->guard('pegawai')->check()) {
        return redirect('/pegawai/dashboard');
    }
    return view('pegawai.login.index');
});

Route::prefix('pegawai')->group(function () {
    //route login stap
    Route::post('/login', \App\Http\Controllers\Pegawai\loginController::class)->name('pegawai.login');

    Route::middleware('pegawai')->group(function () {
        //route dashboard stap
        Route::get('/dashboard', \App\Http\Controllers\Pegawai\DashboardController::class)->name('pegawai.dashboard');

        //route absensi
        Route::controller(\App\Http\Controllers\Pegawai\AbsenController::class)->group(function () {
            Route::get('absent', 'index')->name('pegawai.absent');
            Route::post('absent/store', 'store')->name('pegawai.absen.store');
        });

        //histori absensi
        Route::get('/history', [\App\Http\Controllers\Pegawai\HistoryController::class, 'index'])->name('pegawai.histories');
        Route::get('/history/print', [\App\Http\Controllers\Pegawai\HistoryController::class, 'print'])->name('pegawai.histories.print');

        Route::controller(\App\Http\Controllers\Pegawai\ProfileController::class)->group(function () {
            Route::get('/profile', 'index')->name('pegawai.profile');
            Route::post('/profile/update', 'updateProfile');
            Route::post('/profile/update/password', 'updatePassword');
        });

        Route::controller(\App\Http\Controllers\Pegawai\CutyController::class)->group(function () {
            Route::get('/izin', 'index')->name('pegawai.izin');
            Route::post('/izin/store', 'store');
            Route::post('/izin/update', 'update');
        });

        Route::get('/logout', \App\Http\Controllers\Pegawai\LogoutController::class)->name('pegawai.logout');
    });

    Route::get('/ayokabsent', function () {
        return view('pegawai.qrcode.index');
    });
});
