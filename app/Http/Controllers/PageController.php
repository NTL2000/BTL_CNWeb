<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\dtb_slide;
use App\Models\dtb_typeproduct;
use App\Models\dtb_product;
use App\Models\dtb_config;
use App\Models\dtb_customer;
use Illuminate\Support\Facades\File; 
use Hash;
use Illuminate\Support\Facades\Auth;

class PageController extends Controller
{
    public function getIndex()
    {
        $carousel_active=dtb_slide::where('position','carousel_active')->first();
    	$carousel=dtb_slide::where('position','carousel')->get();
        $banner=dtb_slide::where('position','banner_index')->get();
        $separate_l1=dtb_slide::where('position','separate_line1');
        $separate_l2=dtb_slide::where('position','separate_line2');
        $img_foot=dtb_slide::where('position','image_foot');
        //menu
        $typeProduct=dtb_typeproduct::all();
        $producwithtype=array();
        $count=0;
        foreach ($typeProduct as $t) {
            $p=dtb_product::where('id_type',$t->id)->get();
            $producwithtype[$count]=$p;
            $count++;
        }
        //sp khuyến mãi
        $saleProduct=dtb_product::join('dtb_config','dtb_product.id_configuration', '=','dtb_config.id')->wherecolumn('dtb_product.promotion_price','<','dtb_product.unit_price')->paginate(4);
        //sp trên top
        $productTop=dtb_product::join('dtb_config','dtb_product.id_configuration', '=','dtb_config.id')->where('top',1)->paginate(4);
        //sp phổ biến
        $productPopolar=dtb_product::join('dtb_config','dtb_product.id_configuration', '=','dtb_config.id')->where('popular',1)->paginate(8);
    	return view('page.index',compact('carousel_active','carousel','banner','separate_l1','separate_l2','img_foot','typeProduct','producwithtype','saleProduct','productTop','productPopolar'));
    }
    public function getCart(){
        // if(Session('cart')){
        //         $oldCart=Session::get('cart');
        //         $cart=new Cart($oldCart);
        //         return view('page.check_out',compact('cart'));
        //     }
        return view('page.cart');
    }
    public function getlistProduct($id_type){
        $typeProduct=dtb_product::join('dtb_config','dtb_product.id_configuration', '=','dtb_config.id')->where('dtb_product.id_type','=',$id_type)->get();
        $ty=dtb_typeproduct::where('id',$id_type)->get();
    	return view('page.listProducts',compact('typeProduct','ty'));
    }
    public function getProduct($id_product){
        $product=dtb_product::join('dtb_config','dtb_product.id_configuration', '=','dtb_config.id')->where('dtb_product.id','=',$id_product)->first();
        $type=dtb_typeproduct::where('id',$product->id_type)->first();
    	return view('page.product',compact('product','type'));
    }
    // public function postFile(Request $r)
    // {
    //     if($r->hasFile('myFile')){
    //         $r->file('myFile')->move('mockup/images/chitietsanpham/Lenovo/Laptop Lenovo Gaming L340-15IRH 81LK01J3VN','a1.jpg');
    //     }
    //     else{
    //         echo 'Upload khong thanh cong';
    //     }
    // }
    // public function deleteFile(){
    //     File::delete('mockup/images/chitietsanpham/Lenovo/Laptop Lenovo Gaming L340-15IRH 81LK01J3VN/a1.jpg');
    // }
    public function getSignin(){
        return view('page.signin');
    }
    public function record_Customer(Request $r){
        $this->validate($r,[
            'email'=>'required|email|unique:dtb_customer,email',
            'password'=>'required|min:6|max:20',
            'name'=>'required',
            're_password'=>'required|same:password'
        ],[
            'email.required'=>'Vui lòng đăng nhập email',
            'email.email'=>'email không đúng định dạng',
            'email.unique'=>'email đã có người sử dụng',
            'password.required'=>'vui lòng nhập mật khẩu',
            're_password.same'=>'mật khẩu không giống nhau',
            'password.min'=>'mật khẩu có ít nhất 6 ký tự',
            'password.max'=>'mật khẩu không quá 20 ký tự'
        ]);
        $dtb_customer=new dtb_customer;
        $dtb_customer->full_name=$r->name;
        $dtb_customer->phone=$r->phone;
        $dtb_customer->email =$r->email;
        $dtb_customer->password=Hash::make($r->password);
        $r->Session()->put('create_acc_access','Đăng ký thành công');
        $dtb_customer->save();
        return redirect()->route('trang-chu');
    }
    public function getLogin(){
        return view('page.login');
    }
    public function enter_login(Request $r){
        $this->validate($r,
        [
            'email'=>'required|email',
            'password'=>'required|min:6|max:20'
        ],
        [
            'email.required'=>'Vui lòng đăng nhập email',
            'email.email'=>'email không đúng định dạng',
            'password.required'=>'vui lòng nhập mật khẩu',
            'password.min'=>'mật khẩu có ít nhất 6 ký tự',
            'password.max'=>'mật khẩu không quá 20 ký tự'
        ]);
        $cridentials=array('email' =>trim($r->email) , 'password'=>trim($r->password));
        if(Auth::guard('dtb_customer')->attempt($cridentials)){
            return redirect()->route('trang-chu');
        }
        else{
            $r->Session()->put(['flag'=>'danger','notify_login'=>'Đăng nhập không thành công']);
            // $r->Session()->put('thongbao',$r->email.$r->password);
            return redirect()->back();
        }
    }
    public function log_out(){
        if(Auth::guard('dtb_customer')->check()){
            Auth::guard('dtb_customer')->logout();
            return redirect()->route('trang-chu');
        }
        else{
            return redirect()->route('trang-chu');
        }
    }
}
