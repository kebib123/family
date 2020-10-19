<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['namespace' => 'Api'], function () {
    Route::get('/about', 'FooterController@about')->name('about');
    Route::get('/faq', 'FooterController@faq')->name('faq');
    Route::get('/contact', 'FooterController@contact')->name('contact');
    Route::get('/social-media', 'FooterController@media')->name('contact');

    Route::get('/home', 'IndexController@home')->name('home');

    Route::get('/category/{id?}/products','Categorycontroller@show_category');
    Route::get('/product/{id}','Categorycontroller@show_category');

});

