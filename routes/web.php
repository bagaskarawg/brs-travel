<?php

use App\Http\Controllers\FacilityController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\PoolController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\PromoController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\RouteController;
use App\Http\Controllers\ScheduleController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\TestimonialController;
use App\Http\Controllers\TicketController;
use App\Models\Facility;
use App\Models\Gallery;
use App\Models\Pool;
use App\Models\Post;
use App\Models\Promo;
use App\Models\Route as RouteModel;
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
    $promos = Promo::all()->chunk(3);
    $pools = Pool::all();
    $routes = RouteModel::with('sourcePool:id,name', 'destinationPool:id,name')->get();
    $facilities = Facility::all();
    $posts = Post::all();

    return view('welcome', compact('setting', 'slides', 'galleries', 'testimonials', 'promos', 'pools', 'routes', 'facilities', 'posts'));
});

Route::group(['middleware' => ['auth:sanctum', 'verified']], function () {
    Route::group(['middleware' => 'admin'], function () {
        Route::resource('pools', PoolController::class)->except('show');
        Route::resource('routes', RouteController::class)->except('show');
        Route::resource('schedules', ScheduleController::class)->except('show');
        Route::resource('tickets', TicketController::class)->except('show');
        Route::resource('galleries', GalleryController::class)->except('show');
        Route::resource('promos', PromoController::class)->except('show');
        Route::resource('facilities', FacilityController::class)->except('show');
        Route::resource('posts', PostController::class)->except('show');
        Route::resource('testimonials', TestimonialController::class)->except('show');
        Route::resource('settings', SettingController::class)->only(['index', 'store']);
    });

    Route::group(['middleware' => 'user'], function () {
        Route::resource('reservations', ReservationController::class);
    });
});
