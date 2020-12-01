<?php

use App\Http\Controllers\PoolController;
use App\Http\Controllers\RouteController;
use App\Http\Controllers\ScheduleController;
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
    return view('welcome');
});

Route::group(['middleware' => ['auth:sanctum', 'verified']], function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::group(['middleware' => 'admin'], function () {
        Route::resources([
            'pools' => PoolController::class,
            'routes' => RouteController::class,
            'schedules' => ScheduleController::class,
        ]);
    });

    Route::group(['middleware' => 'user'], function () {
        Route::resource('reservations', 'ReservationController');
    });
});
