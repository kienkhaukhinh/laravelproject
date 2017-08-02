<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

/*Route::get('/', function () {
    return view('user.pages.home');
});*/



Route::get('/','HomeController@index');
Route::get('loai-san-pham/{id}/{tenloai}',['as'=>'loaisanpham','uses'=>'HomeController@loaisanpham']);
Route::get('chi-tiet-san-pham/{id}/{tenloai}',['as'=>'chitietsanpham','uses'=>'HomeController@chitietsanpham']);
Route::get('mua-hang/{id}/{tensanpham}',['as'=>'muahang','uses'=>'HomeController@muahang']);
Route::get('gio-hang',['as'=>'giohang','uses'=>'HomeController@giohang']);
Route::get('xoa-san-pham/{id}',['as'=>'xoasanpham','uses'=>'HomeController@xoasanpham']);
Route::get('lien-he',['as'=>'getLienhe','uses'=>'HomeController@getLienhe']);
Route::post('lien-he',['as'=>'postLienhe','uses'=>'HomeController@postLienhe']);
Route::get('cap-nhat/{id}/{qty}',['as'=>'capnhat','uses'=>'HomeController@capnhat']);
Route::get('tim-kiem',['as'=>'timkiem','uses'=>'HomeController@timkiem']);
Route::get('dang-ky',['as'=>'getDangky','uses'=>'HomeController@getDangky']);
Route::post('dang-ky',['as'=>'postDangky','uses'=>'HomeController@postDangky']);
Route::get('dang-nhap',['as'=>'getDangnhap','uses'=>'HomeController@getDangnhap']);
Route::post('dang-nhap',['as'=>'postDangnhap','uses'=>'HomeController@postDangnhap']);
Route::get('logout','UserController@Logout');

Route::group(['prefix'=>'auth'],function(){
	Route::get('login',['as'=>'auth.getlogin','uses'=>'Auth\AuthController@getLogin']);
	Route::get('logout',['as'=>'auth.getlogout','uses'=>'Auth\AuthController@getLogout']);
	Route::post('login',['as'=>'auth.postlogin','uses'=>'Auth\AuthController@postLogin']);
});
Route::group(['prefix'=>'admin','middleware'=>'auth'],function(){
	Route::group(['prefix'=>'cate'],function(){
		Route::get('list',['as'=>'admin.cate.getList','uses'=>'CateController@getList']);
		Route::get('add',['as'=>'admin.cate.getAdd','uses'=>'CateController@getAdd']);
		Route::post('add',['as'=>'admin.cate.postAdd','uses'=>'CateController@postAdd']);
		Route::get('delete/{id}',['as'=>'admin.cate.getDelete','uses'=>'CateController@getDelete']);
		Route::get('edit/{id}',['as'=>'admin.cate.getEdit','uses'=>'CateController@getEdit']);
		Route::post('edit/{id}',['as'=>'admin.cate.postEdit','uses'=>'CateController@postEdit']);
	});
	Route::group(['prefix'=>'product'],function(){
		Route::get('list',['as'=>'admin.product.getList','uses'=>'ProductController@getList']);
		Route::get('add',['as'=>'admin.product.getAdd','uses'=>'ProductController@getAdd']);
		Route::post('add',['as'=>'admin.product.postAdd','uses'=>'ProductController@postAdd']);
		Route::get('delete/{id}',['as'=>'admin.product.getDelete','uses'=>'ProductController@getDelete']);
		Route::get('edit/{id}',['as'=>'admin.product.getEdit','uses'=>'ProductController@getEdit']);
		Route::post('edit/{id}',['as'=>'admin.product.postEdit','uses'=>'ProductController@postEdit']);
		Route::get('delimg/{id}',['as'=>'admin.product.getDelImage','uses'=>'ProductController@getDelImg']);
	});

	Route::group(['prefix'=>'user'],function(){
		Route::get('list',['as'=>'admin.user.list','uses'=>'UserController@getList']);
		Route::get('add',['as'=>'admin.user.getAdd','uses'=>'UserController@getAdd']);
		Route::post('add',['as'=>'admin.user.postAdd','uses'=>'UserController@postAdd']);
		Route::get('delete/{id}',['as'=>'admin.user.getDelete','uses'=>'UserController@getDelete']);
		Route::get('edit/{id}',['as'=>'admin.user.getEdit','uses'=>'UserController@getEdit']);
		Route::post('edit/{id}',['as'=>'admin.user.postEdit','uses'=>'UserController@postEdit']);
		
	});
});

Route::get('testuser',function(){
	return view('user.pages.category');
});