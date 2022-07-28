<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\CheckHeader;


Route::group(['namespace' => 'API'], function ()
{


    // ======================== Api ========================

    // ======================== Api ========================




        // if isset auth
        Route::middleware('auth:api')->group(function () {


            // ======================== AuthApi ========================

                  Route::post('logout', 'AuthApi@logout');
            // ======================== AuthApi ========================

        });



});
