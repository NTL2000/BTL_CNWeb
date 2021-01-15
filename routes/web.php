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
//admin page
Route::group(['prefix'=>'admin'],function(){
	Route::group(['prefix'=>'category'],function(){
		Route::get('category_add',[PageController::class,'category_add_admin'])->name('them-loai-san-pham');
		Route::post('category_add_exe',[PageController::class,'category_add_admin_exe'])->name('them-loai-san-pham_exe');
		Route::get('category_delete_exe/{id}',[PageController::class,'category_delete_admin_exe']);
		Route::get('category_edit/{id_typeProduct}',[PageController::class,'category_edit_admin'])->name('sua-loai-san-pham');
		Route::post('category_edit_exe',[PageController::class,'category_edit_admin_exe'])->name('sua-loai-san-pham_exe');
		Route::get('category_list',[PageController::class,'category_list_admin'])->name('danh-sach-loai-san-pham');
		route::get('paginate_category_admin/{stt}',[PageController::class,'paginate_category_admin']);
		//view all
		route::get('view_all_category_exe',[PageController::class,'view_all_category_exe']);
	});
	Route::group(['prefix'=>'product'],function(){
		Route::get('product_add',[PageController::class,'product_add_admin'])->name('them-san-pham');
		Route::post('product_add_admin_exe',[PageController::class,'product_add_admin_exe'])->name('them-san-pham_exe');
		Route::get('product_edit',[PageController::class,'product_edit_admin']);
		Route::get('product_list',[PageController::class,'product_list_admin'])->name('danh-sach-san-pham');
		Route::get('get_id_type_product',[PageController::class,'get_id_type_product']);
		Route::get('get_id_config',[PageController::class,'get_id_config']);
		Route::get('paginate_product_admin/{stt}',[PageController::class,'paginate_product_admin']);
		route::get('view_all_product_exe',[PageController::class,'view_all_product_exe']);
		Route::get('product_edit/{id_product}',[PageController::class,'product_edit_admin'])->name('sua-san-pham');
		Route::get('product_delete_exe/{id}',[PageController::class,'product_delete_admin_exe']);
		Route::post('product_edit_exe',[PageController::class,'product_edit_admin_exe'])->name('sua-san-pham_exe');
	});
	Route::group(['prefix'=>'config'],function(){
		Route::get('config_add',[PageController::class,'config_add'])->name('them-cau-hinh');
		Route::post('config_add_exe',[PageController::class,'config_add_exe'])->name('them-cau-hinh_exe');
		Route::get('config_list',[PageController::class,'config_list'])->name('danh-sach-cau-hinh');
		route::get('paginate_config_admin/{stt}',[PageController::class,'paginate_config_admin']);
		Route::get('edit_config/{id_config}',[PageController::class,'edit_config'])->name('sua-cau-hinh');
		Route::post('config_edit_exe',[PageController::class,'config_edit_admin_exe'])->name('sua-cau-hinh_exe');
		Route::get('config_delete_exe/{id}',[PageController::class,'config_delete_admin_exe']);
		//view all config
		Route::get('view_all_config_exe',[PageController::class,'view_all_config_exe']);
	});
});
