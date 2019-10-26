<?php
// Admin-------------------------------------------
Route::group(['prefix' => 'admin','namespace' => 'Admin', 'as' => 'admin.', "middleware" => ["admin"]], function () {
    Route::get('/dashboard', "DashboardController@index")->name('dashboard');

    Route::resource('/categories', 'CategoryController');
    Route::get('/getAllcategory', 'CategoryController@getAllcategory');
    Route::get('/getAllcategoryByPagination', 'CategoryController@getAllcategory');
    Route::get('/categorySearch', 'CategoryController@categorySearch');

    Route::resource('/products', 'ProductController');
    Route::get('/getAllProduct', 'ProductController@getAllProduct');
    Route::get('/getAllProductByPagination', 'ProductController@getAllProduct');
    Route::get('/productSearch', 'ProductController@productSearch');

    Route::resource('/orders', 'OrderController');
    Route::get('allOrder', 'OrderController@allOrder');
});

// user----------------------------------------------------
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

    Route::group(['middleware' => ['auth']], function () {
        Route::get('/checkout', 'CheckoutController@checkoutView')->name("checkout");
        Route::post('/checkout', 'CheckoutController@checkout')->name("checkout");
    
        Route::get('/order/history', 'CheckoutController@orderHistory')->name("order.history");
        Route::get('/order/details/{id}', 'CheckoutController@orderDetails')->name("order.details");
    });
});

// login-----------------------------------------------------------------
Route::group(['namespace' => "Login"], function () { 
    // user--------------------------------------------------
    Route::get('/registration', 'LoginController@showRegistrationForm')->name("registration");
    Route::post('/registration', 'LoginController@registration')->name("registration");
    Route::get('/user/verify/{token}', 'LoginController@userEmailVerification')->name("user.verify");
    
    Route::get('/login', 'LoginController@showLoginForm')->name("login");
    Route::post('/login', 'LoginController@login')->name("login");

    Route::get('/logout', 'LoginController@logout')->name("logout");

    // socialite---------------------------------------
    Route::get('/login/{socialite}', 'LoginController@redirectToProvider');
    Route::get('/login/{socialite}/callback', 'LoginController@handleProviderCallback');

    // Admin-------------------------------------------------------
    Route::group(['prefix' => 'admin', 'as' => 'admin.'], function () {
        Route::get('/login', 'LoginController@showAdminLoginForm')->name("login");
        Route::post('/login', 'LoginController@adminLogin')->name("login");
        
        Route::get('/logout', 'LoginController@admniLogout')->name("logout");
    });
    
});

// Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');
