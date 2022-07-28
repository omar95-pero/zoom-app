<?php

// Route::group(
// [
// 	'prefix' => LaravelLocalization::setLocale(),
// 	'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]
// ], function(){
//


    Route::get('power', 'Admin\AdminAuth@login');

    Route::group(['prefix' => 'admin', 'namespace' => 'Admin'], function () {


            Config::set('auth.defines', 'admin');
             app()->setLocale('ar');



            //================ Auth ================
//            Route::get('login', 'AdminAuth@login');
            Route::post('power', 'AdminAuth@dologin');
            Route::get('forgot/password', 'AdminAuth@forgot_password');
            Route::post('forgot/password', 'AdminAuth@forgot_password_post');
            Route::get('reset/password/{token}', 'AdminAuth@reset_password');
            Route::post('reset/password/{token}', 'AdminAuth@reset_password_final');


        //********************* after login *********************
            Route::group(['middleware' => 'admin:admin'], function () {



                        Route::get('/', function () {
                                return view('admin.index');
                            });


                        //================ admin ================
                        Route::resource('admin', 'AdminController');
                        Route::delete('admin/destroy/all', 'AdminController@multi_delete')->name('delete_all_admin');


                        //================ slider ================
                        Route::resource('slider', 'SliderController');
                        Route::delete('slider/destroy/all', 'SliderController@multi_delete')->name('delete_all_slider');



                        //================ Zoom ================
                        Route::resource('zoom', 'Meets\MeetingController');
                        Route::delete('slider/destroy/all', 'SliderController@multi_delete')->name('delete_all_slider');



                        //================ contact ================
                        Route::resource('contact', 'ContactController');
                        Route::delete('contact/destroy/all', 'ContactController@multi_delete')->name('delete_all_contact');







                       //================ settings ================
                        Route::get('settings', 'SettingController@setting_page');
                        Route::post('operate_page', 'SettingController@operate_page')->name('operate_page');
                        Route::post('settings', 'SettingController@send_settings')->name('send_settings');



                        Route::any('logout', 'AdminAuth@logout');

                });

        });

	//
	// });
