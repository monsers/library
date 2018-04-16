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

Route::get('/',function(){
    return view('welcome');
});

Route::group(['middleware' => ['web']], function () {
//验证码
    Route::get("/verify", function () {
        $im = \App\Handle::getVerify();
        return response()->stream(function () use ($im) {
            imagepng($im);
            imagedestroy($im);
        }, 200, ["Content-type" => "image/png"]);
    });
    //后台
    Route::group(['prefix' => 'admin', 'namespace' => 'admin', 'middleware' => 'guests'], function () {
        Route::resource('/', 'IndexController');
        Route::resource('test', 'TestController');
        Route::post('news/change', 'NewsController@change');
        Route::resource('news', 'NewsController');
        Route::resource('partner', 'PartnerController');
        Route::get('book/borrow','BookController@borrow');
        Route::get('book/outtime','BookController@outtime');
        Route::resource('book', 'BookController');
        Route::get('search','IndexController@Searchs');
//        Route::post('slide/change', 'SlideController@change');
//        Route::resource('slide', 'SlideController');
    });
    Route::post('user/logincheck', 'admin\UserController@logincheck');
    Route::post('user/register', 'admin\UserController@Register');
    Route::get('user/destroy','admin\UserController@destroy');
    Route::resource('user', 'admin\UserController');


});