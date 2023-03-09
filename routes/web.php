<?php

use App\Http\Controllers\Stap\AbsenController;
use App\Http\Controllers\Stap\DashboardController;
use App\Http\Controllers\Stap\HistoryController;
use App\Http\Controllers\Stap\loginController;
use Illuminate\Support\Facades\Route;

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
    });
});
