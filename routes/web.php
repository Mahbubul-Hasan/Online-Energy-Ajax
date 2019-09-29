<?php

Route::group(['prefix' => 'admin','namespace' => 'Admin', 'as' => 'admin.'], function () {
    Route::get('/', "DashboardController@index")->name('dashboard');

    Route::resource('/categories', 'CategoryController');
    Route::get('/getAllcategory', 'CategoryController@getAllcategory');
    Route::get('/getAllcategoryByPagination', 'CategoryController@getAllcategory');
    Route::get('/categorySearch', 'CategoryController@categorySearch');

    Route::resource('/products', 'ProductController');
    Route::get('/getAllProduct', 'ProductController@getAllProduct');
    Route::get('/getAllProductByPagination', 'ProductController@getAllProduct');
    Route::get('/productSearch', 'ProductController@productSearch');
});

Route::group(['namespace' => 'Front'], function () {
    Route::get('/', "HomeController@index")->name("/");
    Route::get('/category/products/{id}', "HomeController@categoryProducts")->name("category.products");
});
