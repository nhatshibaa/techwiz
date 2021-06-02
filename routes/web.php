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
Route::get('home2', 'HomeController@testLang' );
Route::get('/','PageController@getIndex');


Route::get('locale/{locale?}',function($locale){
	Session::put('locale',$locale);
	return redirect()->back();
});
 /*loginFacebook*/
Route::get('auth/facebook', 'FacebookAuthController@redirectToProvider')->name('facebook.login') ;
Route::get('auth/facebook/callback', 'FacebookAuthController@handleProviderCallback');
 /*...*/

Route::get('home','PageController@getIndex')->name('home'); /* home , home */
Route::get('shop/{type?}','PageController@getProduct')->name('store'); /* cua-hang */
Route::get('detail/{id?}','PageController@getProductdetail')->name('productdetail');/*chi-tiet-san-pham */
Route::get('contact','ContactController@getContact')->name('contact'); /* lien-he */
Route::post('contact','ContactController@postContact'); /* lien-he */
Route::get('about','PageController@getAbout')->name('about'); /*  gioi-thieu */
Route::get('cart','PageController@getCart');  // gio-hang
Route::get('admin','AdminController@getAdmin')->name('admin');

/*Route  Admin*/
Route::prefix('admin')->middleware('CheckLoginAdmin')->group(function(){
	Route::get('category','CategoryController@category')->name('category');  /*  danhmuc  */
	Route::get('products','ProductController@products')->name('products');   /*  sanpham  */
	Route::get('news','NewsController@news')->name('news');  /*  tintuc  */
	Route::get('order','OderController@oder')->name('oder');  /*  dondathang  */
	/*Quản lý danh mục*/
	Route::group(['prefix'=>'category'],function(){
		/*thêm danh mục*/
		Route::get('add','CategoryController@getCategory')->name('add.category');
		Route::post('add','CategoryController@postCategory');
		/*sửa danh mục*/
		Route::get('edit/{id?}','CategoryController@getEdit')->name('edit.category');
		Route::post('edit/{id?}','CategoryController@postEdit');
		/*xóa danh mục*/
		Route::get('delete/{id?}','CategoryController@delete')->name('del.category');
	});

	/*Quản lý sản phẩm*/

	Route::group(['prefix'=>'products'],function(){
		Route::get('all','ProductController@product')->name('product');
		/*add product*/
		Route::get('add','ProductController@getproduct')->name('add.product');
		Route::post('add','ProductController@postproduct');
		/*edit product*/

		Route::get('edit/{id?}','ProductController@geteditproduct')->name('edit.product');
		Route::post('edit/{id?}','ProductController@posteditproduct');

		/* delete product */

		Route::get('delete/{id?}','ProductController@deleteproduct')->name('delete.product');
	});
	/*quản lý đơn hàng*/

	Route::group(['prefix'=>'order'],function(){
		Route::get('all','OderController@oder')->name('oder');
		Route::get('view/{id?}','OderController@getdetail')->name('view.oder');
		Route::post('view/{id?}','OderController@postdetail');
		Route::get('delete/{id?}','OderController@delete')->name('del.oder');

		Route::get('send-email','OderController@sendMailOder')->name('admin.email.sendMailOder');

	});

	/*Quản lý tin tức*/
	/*quản lí khách hàng*/
	Route::group(['prefix'=>'client'],function(){
		Route::get('all','UserController@user')->name('user');
	});

	/*Quản lí admin*/

	Route::group(['prefix'=>'Staff'],function(){
		Route::get('all','AdminUserController@nhanvien')->name('nhanvien');  // nhan vien
	});

	/*Quản lý kho*/
	Route::group(['prefix'=>'warehouse'],function(){
		Route::get('all','WarehouseController@khohang')->name('khohang');
	});

	/*Trang ajax*/

	Route::group(['prefix'=>'ajax'],function(){
		Route::get('soidtu/{iddanhmuc}','AjaxController@getIdtype');
	});

});

	Route::prefix('shopping')->group(function () {
	    Route::get('/add/{id?}','ShoppingcartController@addProduct')->name('addcart');
	    Route::get('/delete/{id?}','ShoppingcartController@deleteProduct')->name('deletecart');
	    Route::get('/danh-sach-gio-hang','ShoppingcartController@getList')->name('listcart');
	});

	Route::group(['prefix'=>'cart','middleware'=>'CheckLoginUser'],function(){
		Route::get('checkout','ShoppingcartController@getCheckout')->name('checkout');
		Route::post('checkout','ShoppingcartController@postCheckout')->name('post.checkout');
	});

	/*đăng nhập /đăng ký admin*/
	Route::prefix('authenticate')->group(function(){
		Route::get('login','AdminController@getLogin')->name('auth.login');
		Route::post('login','AdminController@postLogin');
		Route::get('logout','AdminController@LogoutAdmin')->name('logout.admin');
	});
	Auth::routes(['verify' => true]);

	Route::group(['namespace'=>'Auth'],function(){
		/*reset mat khau*/
	Route::get('reset-password','ForgotPasswordController@getFormResetPassword')->name('reset.password');
	Route::post('reset-password','ForgotPasswordController@sendCodeReset');

	Route::get('password/reset','ForgotPasswordController@resetPassword')->name('get.link.reset.password');
	Route::post('password/reset','ForgotPasswordController@saveResetPassword');
		/*Route::get('dang-ky','RegisterController@getRegister')->name('get.register');
		Route::post('dang-ky','RegisterController@postRegister')->name('post.register');

		Route::get('dang-nhap','LoginController@getLogin')->name('get.login');
		Route::post('dang-nhap','LoginController@postLogin')->name('post.login');*/

	});
	Route::get('logout','PageController@getLogout')->name('logout');
	/*comment*/
	Route::post('comment/{id?}','CommentController@postComment');
	/*...*/
//	Route::get('/home', 'HomeController@index')->name('home')->middleware('verified');
