<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/',"FrontendController@index");

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('admin/home', 'AdminController@index');
Route::get('admin', 'Admin\LoginController@showLoginForm')->name('admin.login');
Route::post('/admin', 'Admin\LoginController@login');
Route::get('admin/logout', 'AdminController@Logout')->name('admin.logout');


///Category section
Route::get('admin/categories','Admin\CategoryController@index')->name('admin.category');
Route::post('admin/categories-store','Admin\CategoryController@StoreCat')->name('store.category');
Route::get('admin/categories/edit/{cat_id}','Admin\CategoryController@Edit');
Route::post('admin/categories-update','Admin\CategoryController@UpdateCat')->name('update.category');
Route::get('admin/categories/delete/{cat_id}','Admin\CategoryController@Delete');
Route::get('admin/categories/inactive/{cat_id}','Admin\CategoryController@Inactive');
Route::get('admin/categories/active/{cat_id}','Admin\CategoryController@Active');

//.......Brand section////....
Route::get('admin/brand','Admin\BrandController@index')->name('admin.brand');

Route::post('admin/brand-store','Admin\BrandController@Store')->name('store.brand');
Route::get('admin/brand/edit/{brand_id}','Admin\BrandController@Edit');
Route::post('admin/brand-update','Admin\BrandController@Update')->name('update.brand');

Route::get('admin/brand/delete/{brand_id}','Admin\BrandController@Delete');
Route::get('admin/brand/inactive/{brand_id}','Admin\BrandController@Inactive');
Route::get('admin/brand/active/{brand_id}','Admin\BrandController@Active');

///////Products/////
Route::get('admin/products/add','Admin\ProductController@addProduct')->name("add-products");
Route::post('admin/products/store','Admin\ProductController@storeProduct')->name("store-products");
Route::get('admin/products/manage','Admin\ProductController@manageProduct')->name('manage-products');
Route::get('admin/products/edit/{product_id}','Admin\ProductController@editProduct');
Route::post('admin/products/update','Admin\ProductController@updateProduct')->name("update-products");

Route::post('admin/products/image-update','Admin\ProductController@updateImage')->name("update-image");
Route::get('admin/products/delete/{product_id}','Admin\ProductController@destroy');
Route::get('admin/products/inactive/{product_id}','Admin\ProductController@Inactive');
Route::get('admin/products/active/{product_id}','Admin\ProductController@Active');

/**************coupon ***************/
Route::get('admin/coupon','Admin\CouponController@index')->name('admin.coupon');
Route::post('admin/coupon-store','Admin\CouponController@Store')->name('store.coupon');
Route::get('admin/coupon/edit/{coupon_id}','Admin\CouponController@couponEdit');
Route::post('admin/coupon-update','Admin\CouponController@update')->name('update.coupon'); 
Route::get('admin/coupon/delete/{coupon_id}','Admin\CouponController@couponDelete');
Route::get('admin/coupon/inactive/{coupon_id}','Admin\CouponController@Inactive');
Route::get('admin/coupon/active/{coupon_id}','Admin\CouponController@Active');