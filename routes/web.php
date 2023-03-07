<?php

use App\Http\Controllers\Stap\AbsenController;
use App\Http\Controllers\Stap\DashboardController;
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

// Route::get('/', function () {
//     return view('stap.dashboard.index');
// });

Route::prefix('stap')->group(function () {
    Route::get('/dashboard', DashboardController::class);

    //route absensi
    Route::controller(AbsenController::class)->group(function () {
        Route::get('absent', 'index')->name('stap.absent');
        Route::post('absent/store', 'store')->name('stap.absen.store');
    });
});
