<?php

use Illuminate\Support\Facades\Route;

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


//frontendside
Route::get('/',  'HomeshowController@index');

//category by product show routes

Route::get('/CategoryByproduct/{id}','HomeshowController@CategoryByProduct');
Route::get('/ManufactureByproduct/{manufacture_id}','HomeshowController@ManufactureByProduct');
Route::get('/View/Product/details/{product_id}','HomeshowController@Productdetalis_Id');


//cart routes are here 
Route::post('addtoCart','AddCartController@AddToCart');
Route::get('/showCart','AddCartController@ShowCart');
Route::get('deleteToCart/{id}','AddCartController@DeleteTOCart');
Route::post('UpdateCart','AddCartController@UpdateCart');

//checkout and login routes are here

Route::get('loginCheck','checkoutController@loginCheck');
Route::post('user/Registration','checkoutController@UserRegistration');
Route::post('user/Login','checkoutController@UserLogin');
Route::get('Checkout','checkoutController@CheckOut');
Route::post('saveShipping','checkoutController@saveShipping');
Route::get('customerLogout','checkoutController@CustomerLogout');

//Payment method routes are here
Route::get('payment','checkoutController@Payment');
Route::post('orderPlace','checkoutController@OrderPlace');

//Mnange Order Routes
Route::get('manageOrder','checkoutController@ManageOrder');

Route::get('Deleteorder/{order_id}', 'checkoutController@Deleteorder');
Route::get('Order/Updateinactive/{order_id}','checkoutController@Inactiveorder'); //inactive 
Route::get('Order/Updateactive/{order_id}', 'checkoutController@Activeorder'); //active

Route::get('Vieworder/{order_id}', 'checkoutController@Vieworder');



//backend
Route::get('/logout', 'SuperAdminController@logout')->name('logout');
Route::get('/backslash',  'AdminController@index');
Route::get('/dashboard',  'SuperAdminController@index');
Route::post('/admindashboard','AdminController@Dashboard')->name('admin.dashboard');

//categoy routes
Route::post('saveCategory', 'CategoryController@SaveCategory');
Route::get('/addCategory', 'CategoryController@index');
Route::get('/allCategory', 'CategoryController@AllCategory');

Route::get('Updateinactive/{id}', 'CategoryController@Inactivecategory'); //inactive 

Route::get('Updateactive/{id}', 'CategoryController@Activecategory'); //active

Route::get('Editcategory/{id}', 'CategoryController@Editcategory');

Route::post('Update/category/{id}', 'CategoryController@Updatecategory');

Route::get('Deletecategory/{id}', 'CategoryController@Deletecategory');

//manufacture routes

Route::get('/addManufacture', 'ManufactureController@index');

Route::post('saveManufacture', 'ManufactureController@SaveManufacture');

Route::get('/allManufacture', 'ManufactureController@AllManufacture');

Route::get('Deletemanufacture/{manufacture_id}', 'ManufactureController@Deletemanufacture');
Route::get('UpdateinactiveManufacture/{manufacture_id}', 'ManufactureController@Inactivemanufacture'); //inactive 

Route::get('UpdateactiveManufacture/{manufacture_id}', 'ManufactureController@Activemanufacture'); //active

Route::get('Edit/manufacture/{manufacture_id}', 'ManufactureController@Editmanufacture');
Route::post('Update/manufacture/{manufacture_id}', 'ManufactureController@Updatemanufacture');

//product routes are here

Route::get('/addProduct', 'ProductController@index');
Route::post('saveProduct', 'ProductController@SaveProduct');
Route::get('/allProduct', 'ProductController@AllProduct');

Route::get('Deleteproduct/{product_id}', 'ProductController@Deleteproduct');
Route::get('UpdateinactiveProduct/{product_id}','ProductController@Inactiveproduct'); //inactive 
Route::get('UpdateactiveProduct/{product_id}', 'ProductController@Activeproduct'); //active

Route::get('Edit/product/{product_id}', 'ProductController@Editproduct');
Route::post('Update-product/{product_id}', 'ProductController@Updateproduct');

//slider routes are here

Route::get('/addSlider', 'SliderController@index');

Route::get('/allSlider', 'SliderController@AllSlider');

Route::post('saveSlider', 'SliderController@SaveSlider');

Route::get('Deleteslider/{slider_id}', 'SliderController@Deleteslider');
Route::get('UpdateinactiveSlider/{slider_id}','SliderController@Inactiveslider'); //inactive 
Route::get('UpdateactiveSlider/{slider_id}', 'SliderController@Activeslider'); //active