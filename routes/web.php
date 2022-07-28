<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;

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


// Route::group(
// [
// 	'prefix' => LaravelLocalization::setLocale(),
// 	'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath'],
//    'namespace' => 'Website'
// ], function(){
////

Route::get('/', function (){
    return 'welcome';
});



Route::group(['namespace' => 'Website'], function () {

    config(['auth.defaults.guard' => 'web']);

    /* auth */
    Route::group(['middleware' => ['auth']], function () {




        Route::get('logout','WebAuth@logout');//logout action

    });

});




//Clear route cache:
Route::get('/clear_cache', function() {
//    $exitCode = Artisan::call('route:cache');
    $exitCode = Artisan::call('config:cache');
    $exitCode = Artisan::call('cache:clear');
    $exitCode = Artisan::call('view:clear');
    return 'cache cleared';
});
