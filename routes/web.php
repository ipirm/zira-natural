<?php


use App\Banner;
use App\Setting;

Route::group(['middleware' => 'locale'], function () {
    Route::get('/', 'MainController@index')->name('index');
    Route::get('/about', 'MainController@about')->name('about');
    Route::get('/catalog', 'MainController@catalog')->name('catalog');
    Route::get('/shop', 'MainController@shop')->name('shop');
    Route::get('/contact', 'MainController@contact')->name('contact');
    Route::get('/shop/product/{slug}', 'MainController@shopProduct')->name('ShopProduct');
    Route::get('/catalog/product/{slug}', 'MainController@catalogProduct')->name('catalogProduct');
    Route::get('/changelanguage/{lang}', 'MainController@changeLang');
    Route::post('/search-data', 'MainController@searchData')->name('search');
    Route::post('/basket','MainController@basket');
    Route::post('/remove','MainController@remove');
    Route::get('/catalog/{name}','MainController@searchCats')->name('catalogSearch');
    Route::get('/shop/{name}','MainController@searchShopCats')->name('shopSearch');
    \View::composer('404', function($view)
    {
        $setting = Setting::first();
        $banner = Banner::first();
        \View::share('setting',$setting);
        \View::share('banner',$banner);
        $view->with('myVariable', $banner,$setting);
    });
});


