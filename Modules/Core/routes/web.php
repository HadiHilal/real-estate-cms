<?php

use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
use Modules\Core\app\Http\Controllers\CountryController;
use Modules\Core\app\Http\Controllers\HomeController;

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

    Route::get('/', [HomeController::class , 'index'])->name('home');
    Route::get('getStates', [CountryController::class, 'getStates'])->name('getStates');

    Route::get('getCities', [CountryController::class, 'getCities'])->name('getCities');

    Route::get('getDistricts', [CountryController::class, 'getDistricts'])->name('getDistricts');

});

