<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Stap\CutyController;
use App\Http\Controllers\Stap\AbsenController;
use App\Http\Controllers\Stap\loginController;
use App\Http\Controllers\Stap\HistoryController;
use App\Http\Controllers\Stap\ProfileController;
use App\Http\Controllers\Stap\DashboardController;

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

Route::get('/', function () {

    if (auth()->guard('stap')->check()) {
        return redirect('/stap/dashboard');
    }
    return view('stap.login.index');
});


Route::prefix('stap')->group(function () {
    //route login stap
    Route::post('/login', loginController::class)->name('stap.login');

    Route::middleware('stap')->group(function () {
        //route dashboard stap
        Route::get('/dashboard', DashboardController::class)->name('stap.dashboard');

        //route absensi
        Route::controller(AbsenController::class)->group(function () {
            Route::get('absent', 'index')->name('stap.absent');
            Route::post('absent/store', 'store')->name('stap.absen.store');
        });

        //histori absensi
        Route::get('/history', [HistoryController::class, 'index'])->name('stap.histories');
        Route::get('/history/print', [HistoryController::class, 'print'])->name('stap.histories.print');

        Route::controller(ProfileController::class)->group(function () {
            Route::get('/profile', 'index')->name('stap.profile');
            Route::post('/profile/update', 'updateProfile');
            Route::post('/profile/update/password', 'updatePassword');
        });

        Route::controller(CutyController::class)->group(function () {
            Route::get('/cuty', 'index')->name('stap.izin');
            Route::post('/cuty/store', 'store');
            Route::post('/cuty/update', 'update');
        });

        Route::get('/logout', \App\Http\Controllers\Stap\LogoutController::class)->name('stap.logout');
    });
});
