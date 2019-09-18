<?php

Route::group(['prefix' => 'admin','namespace' => 'Admin', 'as' => 'admin.'], function () {
    Route::get('/', "DashboardController@index")->name('dashboard');
    Route::resource('/categories', 'CategoryController');
    Route::get('/getAllcategory', 'CategoryController@getAllcategory');
    Route::get('/getAllcategoryByPagination', 'CategoryController@getAllcategory');
});
