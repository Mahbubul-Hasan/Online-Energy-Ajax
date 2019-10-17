<?php

Route::group(['prefix' => 'admin','namespace' => 'Admin', 'as' => 'admin.', "middleware" => ["auth"]], function () {
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
    Route::get('/offer/products', "HomeController@offerProducts")->name("offer.products");
    Route::get('/popular/products', "HomeController@pooularProducts")->name("popular.products");
    Route::get('/product/modal/{id}', "HomeController@productModal")->name("product.modal");
    Route::get('/single/product/{id}', "HomeController@singleProduct")->name("single.product");

    Route::resource('/carts', 'CartController');
    Route::post('/carts/removeAll', 'CartController@cartsRemoveAll');
    Route::post('/carts/update/{id}', 'CartController@cartUpdate');
    Route::get('/cartPriceCount', 'CartController@cartPriceCount');

    Route::get('/checkout', 'CheckoutController@checkoutView')->name("checkout")->middleware("auth");
    Route::post('/checkout', 'CheckoutController@checkoutView')->name("checkout")->middleware("auth");
});


Route::get('/registration', 'Login\LoginController@showRegistrationForm')->name("registration");
Route::post('/registration', 'Login\LoginController@registration')->name("registration");
Route::get('/user/verify/{token}', 'Login\LoginController@userEmailVerification')->name("user.verify");

Route::get('/login', 'Login\LoginController@showLoginForm')->name("login");
Route::post('/login', 'Login\LoginController@login')->name("login");

Route::get('/logout', 'Login\LoginController@logout')->name("logout");
// Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');
