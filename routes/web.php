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

//frontend routes
Route::get('/','HomeController@home');
//show products
Route::get('/products_by_category/{id}','HomeController@show_products_by_category');
Route::get('/products_by_manufacture/{id}','HomeController@show_products_by_manufacture');
Route::get('/product_details/{product_id}','HomeController@productdetails');
//cart related routes
Route::post('/add_to_cart','CartController@addtocart');
Route::get('/show_cart_items','CartController@showcart');
Route::get('/delete_cart/{rowId}','CartController@deletecart');
Route::post('/update_cart','CartController@updatecart');

//checkout related routes
Route::get('/login_customer','CheckoutController@logincustomer');
//Route::get('/logout/{customer_id}','CheckoutController@logoutcustomer');
Route::get('/logout_customer','CheckoutController@logoutcustomer');
Route::post('/customer_registration','CheckoutController@customerregistration');
Route::get('/checkout','CheckoutController@checkout');
Route::post('/save_shipping_details','CheckoutController@saveShippingDetails');
Route::post('/check_customer_login','CheckoutController@checkCustomerLogin');
Route::get('/payment','CheckoutController@payment');
Route::post('/order_place','CheckoutController@orderplace');
Route::get('/manage_order','CheckoutController@manageOrder');
Route::get('/view_order/{order_id}','CheckoutController@viewOrder');








//backend routes
Route::get('/logout','SuperAdminController@logout');
Route::get('/admin','AdminController@login');
Route::get('/admin/dashboard','SuperAdminController@dashboard');
Route::post('/admin/checkadmin','AdminController@checkadmin');



//category related route
Route::get('/admin/addcategory','CategoryController@index');
Route::get('/admin/allcategory','CategoryController@allcategory');
Route::post('/admin/savecategory','CategoryController@savecategory');
Route::get('/deactive_category/{id}','CategoryController@deactivecategory');
Route::get('/active_category/{id}','CategoryController@activecategory');
Route::get('/edit_category/{id}','CategoryController@editcategory');
Route::post('/updatecategory/{id}','CategoryController@updatecategory');
Route::get('/delete_category/{id}','CategoryController@deletecategory');


//manufacture related route

Route::get('/admin/addmanufacture','ManufactureController@index');
Route::post('/admin/savemanufacture','ManufactureController@savemanufacture');
Route::get('/admin/allmanufacture','ManufactureController@allmanufacture');
Route::get('/delete_manufacture/{id}','ManufactureController@deletemanufacture');
Route::get('/deactive_manufacture/{id}','ManufactureController@deactivemanufacture');
Route::get('/active_manufacture/{id}','ManufactureController@activemanufacture');
Route::get('/edit_manufacture/{id}','ManufactureController@editmanufacture');
Route::post('/update_manufacture/{id}','ManufactureController@updatemanufacture');


//product related routes
Route::get('/admin/addproduct','ProductController@index');
Route::post('/admin/saveproduct','ProductController@saveproduct');
Route::get('/admin/allproduct','ProductController@allproduct');
Route::get('/delete_product/{product_id}','ProductController@deleteproduct');
Route::get('/deactive_product/{product_id}','ProductController@deactiveproduct');
Route::get('/active_product/{product_id}','ProductController@activeproduct');



//slider realted routes
Route::get('/admin/addslider','SliderController@index');
Route::post('/admin/saveslider','SliderController@saveslider');
Route::get('/admin/allslider','SliderController@allslider');
Route::get('/deactive_slider/{slider_id}','SliderController@deactiveslider');
Route::get('/active_slider/{slider_id}','SliderController@activeslider');
Route::get('/delete_slider/{slider_id}','SliderController@deleteslider');











