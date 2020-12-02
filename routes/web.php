<?php

use App\Http\Controllers\FacilityController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\PoolController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\PromoController;
use App\Http\Controllers\RouteController;
use App\Http\Controllers\ScheduleController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\TestimonialController;
use App\Http\Controllers\TicketController;
use App\Models\Gallery;
use App\Models\Pool;
use App\Models\Promo;
use App\Models\Setting;
use App\Models\Testimonial;
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
    $setting = Setting::firstOrNew();
    $slides = Gallery::where('placement', 'slideshow')->orderBy('order')->get();
    $galleries = Gallery::where('placement', 'content')->orderBy('order')->get()->chunk(3);
    $testimonials = Testimonial::all();
    $promos = Promo::all();
    $pools = Pool::all();

    return view('welcome', compact('setting', 'slides', 'galleries', 'testimonials', 'promos', 'pools'));
});

Route::group(['middleware' => ['auth:sanctum', 'verified']], function () {
    Route::group(['middleware' => 'admin'], function () {
        Route::resources([
            'pools' => PoolController::class,
            'routes' => RouteController::class,
            'schedules' => ScheduleController::class,
            'tickets' => TicketController::class,
            'galleries' => GalleryController::class,
            'promos' => PromoController::class,
            'facilities' => FacilityController::class,
            'posts' => PostController::class,
            'testimonials' => TestimonialController::class,
        ]);

        Route::resource('settings', SettingController::class)->only(['index', 'store']);
    });

    Route::group(['middleware' => 'user'], function () {
        Route::resource('reservations', 'ReservationController');
    });
});
