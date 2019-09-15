<?php

Route::group(['prefix' => 'admin','namespace' => 'Admin', 'as' => 'admin.'], function () {
    Route::get('/', "DashboardController@index")->name('dashboard'); 
    Route::resource('/categories', 'CategoryController');; 
});