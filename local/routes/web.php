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

    Route::get('img/{path}', function (League\Glide\Server $server, $path) {

        $params = ['fit' => 'crop'];

        if(!empty($_GET['w'])){
            $params['w'] = $_GET['w'];
        }

        if(!empty($_GET['h'])){
            $params['h'] = $_GET['h'];
        }

        $server->outputImage($path, $params);
    });
    Route::auth();

    Route::get('/local/auth/{verify_token}', 'Auth\VerifyController@email')->name("auth_verify");
    Route::get('/currency', 'Controller@currency')->name("currency");

    Route::resource('guest', 'GuestController');

    Route::resource('contact', 'Step\ContactController');
    Route::resource('introduction', 'Step\IntroductionController');
    Route::resource('location', 'Step\LocationController');
    Route::resource('wallet', 'Step\WalletController');

    Route::resource('info', 'Experience\InfoController');
    Route::resource('pricing', 'Experience\PricingController');
    Route::resource('images', 'Experience\ImagesController');
    Route::resource('last', 'Experience\LastController');
    Route::resource('contact-us', 'ContactController');

    Route::patch('/upload/image', 'Step\IntroductionController@upload');
    Route::post('/upload/image', 'Step\IntroductionController@upload');
    Route::post('/newsletter', 'Controller@newsletter');

    Route::get('/date/{timestamp}', 'ExperienceController@date');

    // profile resources
    Route::get('/profile/{username}', 'Profile\InfoController@show');

    // experience resources
    Route::group(['prefix' => 'experience'], function () {
        Route::get('/{slug}', 'ExperienceController@show');
        Route::get('/{id}/schedule', 'ExperienceController@schedule')->name("experience_schedule");
    });

    Route::get('/dashboard', 'SearchController@index');
    Route::get('/bookings', 'BookingController@index');

    // bookings resources
    Route::group(['prefix' => 'booking'], function () {
        Route::get('/create/{id}/{time}/{timestamp}', 'BookingController@create');
        Route::post('/confirm', 'BookingController@confirm')->name("payment_confirm");
        Route::post('/times', 'BookingController@times')->name("payment_times");
        Route::get('/success', 'BookingController@success')->name("payment_success");
        Route::get('/cancel', 'BookingController@cancel')->name("payment_cancel");
        Route::post('/verify', 'BookingController@verify')->name("payment_verify");
        Route::get('/verify', 'BookingController@verify')->name("payment_verify");
        Route::get('/forex', 'BookingController@forex');
    });

    // search resources
    Route::group(['prefix' => 'search'], function () {
        Route::get('/', 'SearchController@index');
        Route::post('/', 'SearchController@index')->name('search');
    });

    Route::get('/auth/nav', 'Profile\InfoController@nav');

    // contact resource
    Route::resource('contact-us', 'ContactController');

    // subscribe resource
//    Route::post('subscriber', 'SubscriberController');
});
