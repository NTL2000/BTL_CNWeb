<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use Illuminate\Support\Facades\Session;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get("index",[PageController::class,'getIndex'])->name('trang-chu');
Route::get("cart",[PageController::class,'getCart'])->name('gio-hang');
Route::get("list_Product/{id_type}",[PageController::class,'getlistProduct'])->name('danh-sach-sp');
Route::get("product/{id_product}",[PageController::class,'getProduct'])->name('san-pham');
//upload file
// Route::get('uploadFile',function(){
// 	return view('fileUpload');
// });
// Route::post('postFile',[PageController::class, 'postFile'])->name('postFile');
//delete file
// Route::get('deleteFile',[PageController::class, 'deleteFile'])->name('postFile');
Route::get("signin",[PageController::class,'getSignin'])->name('dang-ky');
Route::post('record_customer',[PageController::class,'record_Customer'])->name('ghi_khachhang');
//login && logout
Route::post('login_ht',[PageController::class,'enter_login'])->name('thuc-hien-dang-nhap');
Route::get('logout_ht',[PageController::class,'log_out'])->name('dang-xuat');
Route::get("login",[PageController::class,'getLogin'])->name('dang-nhap');
//cart
Route::group(['middleware'=>['web']],function(){
	Route::post('add_cart_post',[PageController::class,'postAddToCart']);
	Route::get('add_cart_get',[PageController::class,'getAddToCart']);
	Route::get('remove_cart/{id}',[PageController::class,'delItemCart']);
	Route::post('increase_cart',[PageController::class,'postAddToCart']);
	route::get('page_cart_get',[PageController::class,'page_cart_get']);
	Route::post('reduction_cart',[PageController::class,'reduction_cart']);
	Route::post('record_cart',[PageController::class,'record_cart'])->name('ghi-gio-hang');
});
//search
Route::get('search',[PageController::class,'search'])->name('tim-kiem');
//view all ajax
Route::get('view_all1',[PageController::class,'view_all1']);
Route::get('re_view_all1',[PageController::class,'re_view_all1']);
Route::get('view_all2',[PageController::class,'view_all2']);
Route::get('re_view_all2',[PageController::class,'re_view_all2']);
Route::get('view_all3',[PageController::class,'view_all3']);
Route::get('re_view_all3',[PageController::class,'re_view_all3']);
//route admin
//login_admin
Route::get('login_admin',[PageController::class,'get_login_admin']);
Route::group(['prefix'=>'admin'],function(){
	Route::group(['prefix'=>'category'],function(){
		Route::get('category_add',[PageController::class,'category_add_admin']);
		Route::get('category_edit',[PageController::class,'category_edit_admin']);
		Route::get('category_list',[PageController::class,'category_list_admin']);
	});
	Route::group(['prefix'=>'product'],function(){
		Route::get('product_add',[PageController::class,'product_add_admin']);
		Route::get('product_edit',[PageController::class,'product_edit_admin']);
		Route::get('product_list',[PageController::class,'product_list_admin']);
	});
});
