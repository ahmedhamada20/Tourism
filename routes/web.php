<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Front\AboutController;
use App\Http\Controllers\Front\BlogController;
use App\Http\Controllers\Front\CartController;
use App\Http\Controllers\Front\ContactController;
use App\Http\Controllers\Front\DestenationController;
use App\Http\Controllers\Front\FaqController;
use App\Http\Controllers\Front\NewsController;
use App\Http\Controllers\Front\OrderController;
use App\Http\Controllers\Front\PackageController;
use App\Http\Controllers\Front\PrivacyController;
use App\Http\Controllers\Front\SerachController;
use App\Http\Controllers\Front\HomeController;
use App\Http\Controllers\Front\TransferController;
use App\Http\Controllers\Front\TripController;
use App\Http\Controllers\Front\UserDashboardController;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;


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


Route::group(['prefix' => LaravelLocalization::setLocale(), 'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']], function () {
    require __DIR__ . '/auth.php';
    Route::get('/', [HomeController::class, 'index'])->name('home');
    Route::get('/invoice', [HomeController::class, 'Invoice'])->name('invoice');
    Route::get('faq', [FaqController::class, 'index'])->name('user_faq');
    Route::get('privacy', [PrivacyController::class, 'index'])->name('user_privacy');
    Route::post('/cart-store', [CartController::class, 'store'])->name('cart_store');
    Route::post('/order-store', [OrderController::class, 'store'])->name('order_store');

    Route::group(['middleware' => 'prevent-back-history'], function () {

        Route::get('destinations/{id}', [DestenationController::class, 'edit'])->name('user_destination_details');
        Route::get('blogs', [BlogController::class, 'index'])->name('user_blog');
        Route::view('single_invoices', 'front.transfer-wizered')->name('single_invoices');
        Route::get('transfer/{id}', [TransferController::class, 'show'])->name('user_transfer_details');
        Route::get('trip_dis/{id}', [TripController::class, 'show'])->name('user_trips_dis');
        Route::get('trips/{id}', [TripController::class, 'details'])->name('user_trips_details');

        Route::get('/package/{id}', [HomeController::class, 'GitPackage'])->name('package_details');


        Route::get('trips-info/{id}', [TripController::class, 'tours_check'])->name('user_trips_info');
        Route::get('transfer-info/{id}', [TripController::class, 'transfer_check'])->name('user_transfer_info');
        Route::get('trips-cart/{id}', [TripController::class, 'tours_cart'])->name('user_trips_cart');
        Route::get('transfer-cart/{id}', [TripController::class, 'transfer_cart'])->name('user_transfer_cart');
        Route::get('package-cart/{id}', [TripController::class, 'toursuser_package_cartcart'])->name('user_package_cart');



        Route::post('cart', [CartController::class, 'cart'])->name('cart.store');
        Route::post('transfer', [CartController::class, 'carttransfer'])->name('cart.transfer');
        Route::post('cart/package', [CartController::class, 'cartpackage'])->name('cart.package');
        Route::get('package-info/{id}', [TripController::class, 'package_check'])->name('user_package_info');




        Route::get('cartDeleted', [CartController::class, 'cartDeleted']);
        Route::post('deletedCart/{id}', [CartController::class, 'deletedCart'])->name('deleted.cart');

        Route::get('blog-details/{id}', [BlogController::class, 'show'])->name('user_blog_details');
        Route::post('search-result', [SerachController::class, 'trips'])->name('trips');
        Route::get('route_form/{id}', [SerachController::class, 'route_form'])->name('route_form');
        Route::get('route_to/{id}', [SerachController::class, 'route_to'])->name('route_to');
        Route::get('about-us', [AboutController::class, 'index'])->name('about');
        Route::get('contact-us', [ContactController::class, 'index'])->name('contact');
        Route::post('contact-store', [ContactController::class, 'store'])->name('contact_store');
        Route::post('news-store', [NewsController::class, 'store'])->name('news_store');
        Route::post('search-result-transfer', [SerachController::class, 'TransferSearch'])->name('transfer_result');
        Route::get('/trip/{id}', [HomeController::class, 'GitTrips'])->name('trip_details');
        
        Route::get('transfer', [TransferController::class, 'index'])->name('user_transfer');
        Route::get('trips', [TripController::class, 'index'])->name('user_trips');
        Route::get('offers', [PackageController::class, 'index'])->name('user_offer');
        Route::get('destination/{id}', [DestenationController::class, 'show'])->name('user_destination');

        Route::post('change_curacy',[HomeController::class,'change_curacy'])->name('change_curacy');

        Route::prefix('client-area')->middleware('auth')->group(function () {
            Route::get('/user-dashboard', [UserDashboardController::class, 'index'])->name('user_dashboard');
            Route::get('cart', [CartController::class, 'index'])->name('cart');
            Route::get('/cart-delet/{id}', [CartController::class, 'destroy'])->name('cart_delete');

        });
    });
});
//Route::view('test', 'front.about');




