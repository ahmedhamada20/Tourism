<?php

use App\Http\Controllers\Admin\AboutUsController;
use App\Http\Controllers\Admin\AdditionalController;
use App\Http\Controllers\Admin\AdditionalPakageController;
use App\Http\Controllers\PrelangController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\Admin\CallToActionController;
use App\Http\Controllers\Admin\ContactController;
use App\Http\Controllers\Admin\CurrenciesController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\DatesController;
use App\Http\Controllers\Admin\DestenationController;
use App\Http\Controllers\Admin\ExcludedController;
use App\Http\Controllers\Admin\ExcludedPakageController;
use App\Http\Controllers\Admin\ExtraController;
use App\Http\Controllers\Admin\IncludedController;
use App\Http\Controllers\Admin\IncludedPakageController;
use App\Http\Controllers\Admin\MoreDetailsController;
use App\Http\Controllers\Admin\MoreDetailsPakageController;
use App\Http\Controllers\Admin\NewsletterController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\OurPartenController;
use App\Http\Controllers\Admin\PackageController;
use App\Http\Controllers\Admin\PrivacyPolicyController;
use App\Http\Controllers\Admin\QuestionsAnswerController;
use App\Http\Controllers\Admin\ReviewController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\Admin\TermsServiceController;
use App\Http\Controllers\Admin\TransferController;
use App\Http\Controllers\Admin\TripsController;
use App\Http\Controllers\Admin\TripsTypeController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\WhyController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


require __DIR__ . '/auth.php';

Route::prefix('admin')->middleware(['auth'])->group(function () {

    Route::group(['middleware' => 'prevent-back-history'], function () {


        Route::get('/dashboard', function () {
            return view('admin/dashboard');
        })->name('dashboard');


        Route::resource('/destenation', DestenationController::class)->names('destenation');

        Route::resource('currencies', CurrenciesController::class);

        Route::resource('extra', ExtraController::class);

        Route::resource('transfer', TransferController::class);

        Route::resource('dates', DatesController::class);

        Route::resource('trips', TripsController::class);

        Route::resource('excluded', ExcludedController::class);

        Route::resource('included', IncludedController::class);

        Route::resource('additional', AdditionalController::class);

        Route::resource('moreDetails', MoreDetailsController::class);


        Route::resource('excluded_pakage', ExcludedPakageController::class);

        Route::resource('included_pakage', IncludedPakageController::class);

        Route::resource('additional_pakage', AdditionalPakageController::class);

        Route::resource('moreDetails_pakage', MoreDetailsPakageController::class);



        Route::resource('package', PackageController::class);

        Route::get('order/{status}', [OrderController::class, 'getOrder'])->name('admin_orders');

        Route::get('getAllOrder', [OrderController::class, 'getAllOrder'])->name('admin_getAllOrder');

        Route::post('change_status/{id}', [OrderController::class, 'change_status'])->name('change_status');

        Route::post('deleted_status/{id}', [OrderController::class, 'deleted_status'])->name('deleted_status');

        Route::resource('create_admin', AdminController::class);

        Route::resource('create_user', UserController::class);

        Route::resource('setting', SettingController::class);

        Route::resource('contact_us', ContactController::class);

        Route::resource('Newsletter', NewsletterController::class);

        Route::get('TripsType', [TripsTypeController::class, 'index'])->name('TripsType');
        Route::get('add-TripsType', [TripsTypeController::class, 'create'])->name('add_TripsType');
        Route::get('edit-TripsType/{id}', [TripsTypeController::class, 'edit'])->name('edit_TripsType');
        Route::get('delete-TripsType/{id}', [TripsTypeController::class, 'destroy'])->name('delete_TripsType');
        Route::post('update-TripsType/{id}', [TripsTypeController::class, 'update'])->name('update_TripsType');
        Route::post('store-TripsType', [TripsTypeController::class, 'store'])->name('store_TripsType');

        Route::get('why', [WhyController::class, 'index'])->name('why');
        Route::get('add-why', [WhyController::class, 'create'])->name('add_why');
        Route::get('edit-why/{id}', [WhyController::class, 'edit'])->name('edit_why');
        Route::get('delete-why/{id}', [WhyController::class, 'destroy'])->name('delete_why');
        Route::post('update-why/{id}', [WhyController::class, 'update'])->name('update_why');
        Route::post('store-why', [WhyController::class, 'store'])->name('store_why');

        Route::get('review', [ReviewController::class, 'index'])->name('review');
        Route::get('add-review', [ReviewController::class, 'create'])->name('add_review');
        Route::get('edit-review/{id}', [ReviewController::class, 'edit'])->name('edit_review');
        Route::get('delete-review/{id}', [ReviewController::class, 'destroy'])->name('delete_review');
        Route::post('update-review/{id}', [ReviewController::class, 'update'])->name('update_review');
        Route::post('store-review', [ReviewController::class, 'store'])->name('store_review');

        Route::get('slider', [SliderController::class, 'index'])->name('slider');
        Route::get('edit-slider/{id}', [SliderController::class, 'edit'])->name('edit_slider');
        Route::get('delete-slider/{id}', [SliderController::class, 'destroy'])->name('delete_slider');
        Route::post('update-slider/{id}', [SliderController::class, 'update'])->name('update_slider');
        Route::post('store-slider', [SliderController::class, 'store'])->name('store_slider');
        
        
        Route::get('prelang', [PrelangController::class, 'index'])->name('prelang');
        Route::get('edit-prelang/{id}', [PrelangController::class, 'edit'])->name('edit_prelang');
        Route::post('delete-prelang/{id}', [PrelangController::class, 'destroy'])->name('delete_prelang');
        Route::post('update-prelang/{id}', [PrelangController::class, 'update'])->name('update_prelang');
        Route::post('store-prelang', [PrelangController::class, 'store'])->name('store_prelang');


        Route::resource('blog', BlogController::class);

        Route::resource('questionsAnswer', QuestionsAnswerController::class);

        Route::resource('termsService', TermsServiceController::class);

        Route::resource('privacyPolicy', PrivacyPolicyController::class);

        Route::resource('ourParten', OurPartenController::class);

        Route::resource('aboutUs', AboutUsController::class);

        Route::resource('callToAction', CallToActionController::class);

    
    });
});
