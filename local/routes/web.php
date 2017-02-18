<?php

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

Route::group(['prefix' => 'local'], function () {
    Route::get('/', function () {
        return view('welcome');
    });

    Route::auth();

    Route::resource('contact', 'Step\ContactController');
    Route::resource('introduction', 'Step\IntroductionController');
    Route::resource('location', 'Step\LocationController');
    Route::resource('wallet', 'Step\WalletController');

    // profile resources
    Route::get('/profile/{username}', 'Profile\InfoController@show');

    // contact resource
    Route::resource('contact-us', 'ContactController');

    // subscribe resource
//    Route::post('subscriber', 'SubscriberController');
});
