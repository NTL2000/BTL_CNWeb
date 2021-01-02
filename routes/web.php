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