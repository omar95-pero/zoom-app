<?php

namespace App\Providers;

use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {

    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {

       // app()->setLocale( ip_info("Visitor", "Country") == 'Egypt'?'ar':'en');
       // app()->getLocale();
        app()->singleton('lang',function (){
            if(session()->has('lang')){
                return session()->get('lang');
            }
            else{
                return ip_info("Visitor", "Country") == 'Egypt'?'ar':'en';
            }
        });


        app()->singleton('currency',function (){
            if(session()->has('currency')){
                return session()->get('currency');
            }
            else{
                return ip_info("Visitor", "Country") == 'Egypt'?'eg':'em';
            }
        });




        Schema::defaultStringLength('191');
    }
}
