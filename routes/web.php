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
Route::get('/profile', function () {
    return view('profile');
});

Route::get('/', function () {
    return view('welcome');
});

Route::get('/Admin', 'AdminController@index');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
/*------------------------------*/
Route::group(['middleware'=>'UserAuth'],function(){

	Route::get('/add-category', 'CategoryController@addCategory');
	Route::post('/save-category', 'CategoryController@saveCategory');
	Route::get('/manage-category', 'CategoryController@manageCategory');
	Route::get('/edit-category/{edit_id}', 'CategoryController@editCategory');
	Route::post('/update-category/', 'CategoryController@updateCategory');
	Route::get('/delete-category/{delete_id}', 'CategoryController@deleteCategory');
	/*--------------------------------*/
	Route::get('/add-product', 'ProductController@addProduct');
	Route::post('/save-product', 'ProductController@saveProduct');

	Route::get('/manage-product', 'ProductController@manageProduct');
	Route::get('/view-product/{id}', 'ProductController@viewProduct');
	Route::get('/edit-product/{up_id}', 'ProductController@editProduct');
	Route::post('/update-product', 'ProductController@updateProduct');
	Route::get('/delete-product/{delete_id}', 'ProductController@deleteProduct');
	
	/*------------Cart---------------*/
	Route::get('/cart', 'CartController@index');
	
	Route::post('/cart-add', 'CartController@addToCart');
	Route::get('/cart-show', 'CartController@cartShow');
	
	
	Route::post('/update-cart', 'CartController@updateCart');
	Route::get('/delete-cart/{row_Id}', 'CartController@deleteCart');

});




















