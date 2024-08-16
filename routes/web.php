<?php

use App\Http\Controllers\AjaxController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\Auth\SignInController;
use App\Http\Controllers\Auth\SignUpController;
use App\Http\Controllers\Calculation\AjaxCalculationController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\Dashboard\Test\TestController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Leader\CatalogIndividualController;
use App\Http\Controllers\Leader\CatalogLegalPersonController;
use App\Http\Controllers\Moonshine\IndividualCalc;
use App\Http\Controllers\Moonshine\LegalPersonCalc;
use App\Http\Controllers\Pages\CompanyController;
use App\Http\Controllers\Pages\PageController;
use App\Http\Middleware\RedirectIfAuthenticated;
use App\Http\Middleware\UserBlockedMiddleware;
use App\Http\Middleware\UserPublishedMiddleware;
use Illuminate\Support\Facades\Route;


Route::controller(HomeController::class)->group(function () {
    Route::get('/', 'home')->name('home');
});



/**
 * Auth
 */

Route::controller(SignInController::class)->group(function () {

    Route::get('/login', 'page')
        ->name('login')->middleware(RedirectIfAuthenticated::class);
    Route::post('/login', 'handle')

        ->name('login.handle');

});

Route::controller(SignUpController::class)->group(function () {

    Route::get('/sign-up', 'page')
        ->name('register')
        ->middleware(RedirectIfAuthenticated::class);

    Route::post('/sign-up', 'handle')
        ->name('register.handle');

});

Route::controller(ForgotPasswordController::class)->group(function () {

    Route::get('/forgot-password', 'page')
        ->name('forgot')
        ->middleware(RedirectIfAuthenticated::class);

    Route::post('/forgot-password', 'handle')
        ->name('forgot.handel')
        ->middleware(RedirectIfAuthenticated::class);

});

Route::controller(ResetPasswordController::class)->group(function () {

    Route::get('/reset-password/{token}','page')
        ->name('password.reset')
        ->middleware(RedirectIfAuthenticated::class);

    Route::post('/reset-password', 'handle')
        ->name('password.handle')
        ->middleware(RedirectIfAuthenticated::class);

});

Route::controller(LogoutController::class)->group(function () {

    Route::post('/logout', 'page')->name('logout');

});

/**
 *  Auth
 */


/**
 *  Cabinet
 */

Route::controller(DashboardController::class)->group(function () {

    Route::get('/cabinet', 'page')
        ->name('cabinet')
        ->middleware(UserPublishedMiddleware::class);



    Route::get('/cabinet-blocked', 'blocked')
        ->name('blocked')
        ->middleware(UserBlockedMiddleware::class);


    Route::post('/cabinet/setting.handel', 'settingHandel')
        ->name('setting.handel')
        ->middleware(UserPublishedMiddleware::class);


    Route::post('/cabinet/setting-password.handel', 'settingPasswordHandel')
        ->name('setting.password.handel')
        ->middleware(UserPublishedMiddleware::class);


});


Route::controller(TestController::class)->group(function () {

    Route::get('/cabinet/test', 'page')
        ->name('cabinet.test')
        ->middleware(UserPublishedMiddleware::class);



});


/**
 *  Cabinet
 */



Route::controller(ContactController::class)->group(function () {
    Route::get('/contacts', 'page')->name('contacts');
});


/**
 * Данны ajax
 */
Route::controller(AjaxController::class)->group(function () {

    Route::post('/send-mail/order-call', 'OrderCall');
    /* отпрака с калькулятора*/
    Route::post('/calcSend/big_data', 'calcSend');

    /* загрузка аватара*/ // нет метода!!31.08 todo
    Route::post('/cabinet/upload-avatar', 'uploadAvatar')->name('uploadAvatar');

});

/**
 * Из калькулятора, с методом (methodName) с bigData
 */
Route::controller(AjaxCalculationController::class)->group(function () {
    Route::post('/calcResult.calculation.responce', 'calculationData');

});

Route::controller(CatalogIndividualController::class)->group(function () {
    Route::get(config('links.links.individuals'), 'category')->name('individual_category');
    Route::get(config('links.links.individuals').'/'. '{slug}', 'page')->name('individual_page');
});

Route::controller(CatalogLegalPersonController::class)->group(function () {
    Route::get(config('links.links.legal-persons'), 'category')->name('legalperson_category');
    Route::get(config('links.links.legal-persons').'/'. '{slug}', 'page')->name('legalperson_page');

});

Route::controller(CompanyController::class)->group(function () {

    Route::get(config('links.links.company').'/'. '{slug}', 'company')->name('company');

});



/**
 * Из админки moonshine
 */
Route::controller(IndividualCalc::class)->group(function () {
    Route::post('/moonshine/individual/individual-calc-property', 'individualCalcProperty');
    Route::post('/moonshine/individual/individual-calc-CASKO', 'individualCalcCASKO');

});


/**
 * Из админки moonshine
 */
Route::controller(LegalPersonCalc::class)->group(function () {
    Route::post('/moonshine/legal_person/legal_person-calc-life', 'legal_personCalcLife');
    Route::post('/moonshine/legal_person/legal_person-calc-accident', 'legal_personCalcAccident');
    Route::post('/moonshine/legal_person/legal_person-calc-CASKO2', 'legal_personCalcCASKO2');
    Route::post('/moonshine/legal_person/legal_person-calc-property2', 'legal_personCalcProperty2');
    Route::post('/moonshine/legal_person/legal_person-calc-avance', 'legal_personCalcAvance');
    Route::post('/moonshine/legal_person/legal_person-calc-responsibility', 'legal_personCalcResponsibility');

});



Route::controller(PageController::class)->group(function () {

    Route::get('{page:slug}', 'page')->name('page');

});
