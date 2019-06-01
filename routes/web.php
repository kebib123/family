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

Route::get('/', function () {
    return view('welcome');
});

Route::group(['prefix' => 'admin', 'namespace' => 'Backend', 'middleware' => 'auth'], function () {
    Route::get('/index', 'AdminController@index')->name('index');
    Route::any('logout', 'AdminController@logout')->name('logout');
    Route::any('mail', 'MailController@mail')->name('mail');

    Route::group(['prefix' => 'Category'], function () {
        Route::any('category', 'CategoryController@add_category')->name('add-category');
        Route::any('show-category', 'CategoryController@show_category')->name('show-category');
        Route::any('edit-category/{id}', 'CategoryController@edit_category')->name('edit-category');
        Route::any('delete-category/{id}', 'CategoryController@delete_category')->name('delete-category');
        Route::any('update-category', 'CategoryController@update_category')->name('update-category');
    });

    Route::group(['prefix' => 'Product'], function () {
        Route::any('add-product', 'ProductController@add_product')->name('add-product');
        Route::any('show-product', 'ProductController@show_product')->name('show-product');
        Route::any('show-review', 'ProductController@show_review')->name('show-review');
        Route::any('orders', 'ProductController@show_order')->name('show-order');

    });

    Route::group(['prefix' => 'Brand'], function () {
        Route::any('manage-brand', 'BrandController@manage_brand')->name('manage-brand');
        Route::any('delete-brand/{id}', 'BrandController@delete_brand')->name('delete-brand');
        Route::any('edit-brand/{id?}', 'BrandController@edit_brand')->name('edit-brand');
    });

    Route::group(['prefix' => 'Slides'], function () {
        Route::any('manage-slide', 'SlideController@manage_slide')->name('manage-slide');
        Route::any('slide-status', 'SlideController@slide_status')->name('slide-status');
        Route::any('delete-slide/{id}', 'SlideController@delete_slide')->name('delete-slide');
        Route::any('edit-slide/{id?}', 'SlideController@edit_slide')->name('edit-slide');
    });

    Route::group(['prefix' => 'information'], function () {
        Route::any('edit-about', 'InformationController@edit_about')->name('edit-about');
        Route::any('edit-faq/{id?}', 'InformationController@edit_faq')->name('edit-faq');
        Route::any('add-contact', 'InformationController@add_contact')->name('add-contact');
        Route::any('add-faq', 'InformationController@add_faq')->name('add-faq');
        Route::any('show-faq', 'InformationController@show_faq')->name('show-faq');
        Route::any('add-media', 'InformationController@add_media')->name('add-media');
        Route::any('add-user', 'InformationController@add_user')->name('add-user');
        Route::any('show-user', 'InformationController@show_user')->name('show-user');
        Route::any('show-contact', 'InformationController@show_contact')->name('show-contact');
        Route::any('delete-contact/{id}', 'InformationController@delete_contact')->name('delete-contact');
        Route::any('delete-faq/{id}', 'InformationController@delete_faq')->name('delete-faq');
        Route::any('delete-user/{id}', 'InformationController@delete_user')->name('delete-user');
        Route::any('reply/{id}', 'InformationController@reply')->name('reply');

    });

});


Route::group(['namespace' => 'Frontend'], function () {
    Route::any('/signin', 'PageController@signin')->name('signin');
    Route::get('/', 'PageController@index')->name('home');
    Route::get('/about', 'PageController@about')->name('about');
    Route::get('/all-category', 'PageController@all_category')->name('all-category');
    Route::get('/cart', 'PageController@cart')->name('cart');
    Route::get('/category/{id?}', 'PageController@category')->name('category');
    Route::get('/checkout', 'PageController@checkout')->name('checkout');
    Route::get('/contact', 'PageController@contact')->name('contact');
    Route::get('/faq', 'PageController@faq')->name('faq');
    Route::get('/product_request', 'PageController@product_request')->name('product-request');
    Route::get('/register', 'PageController@register')->name('register');
    Route::get('/single-page', 'PageController@single_page')->name('single-page');
    Route::get('/log-in', 'PageController@login_page')->name('login-page');

    Route::group(['prefix' => 'Category'], function () {
        Route::any('show-category/{id?}', 'CategoryController@show_category')->name('show-category');
        Route::any('show-products/{id?}', 'CategoryController@show_product')->name('show-products');
        Route::any('show-featured/', 'CategoryController@show_featured')->name('show-featured');
        Route::any('featured-brand/{id?}', 'CategoryController@featured_brand')->name('featured-brand');
    });

    Route::group(['prefix' => 'Cart'], function () {
        Route::any('cart-items', 'CartController@cart_item')->name('cart-item');
        Route::get('cart-destroy/{id2}', 'CartController@cart_destroy')->name('cart-destroy');
        Route::get('delete-cart', 'CartController@delete_cart')->name('delete-cart');
        Route::post('update-cart', 'CartController@update_cart')->name('update-cart');
        Route::any('checkout', 'CartController@checkout_order')->name('checkout-order');


    });

});
