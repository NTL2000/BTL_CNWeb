<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\dtb_slide;
use App\Models\dtb_typeproduct;
use App\Models\dtb_product;
use App\Models\dtb_config;
use App\Models\dtb_customer;
use App\Models\cart;
use App\Models\dtb_bills;
use App\Models\dtb_billdetail;
use App\Models\dtb_employee;
use Illuminate\Support\Facades\File; 
use Illuminate\Filesystem\Filesystem;
use Hash;
use Illuminate\Support\Facades\Auth;
use Session;
use Storage;

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
        $saleProduct=dtb_config::join('dtb_product','dtb_product.id_configuration', '=','dtb_config.id')->wherecolumn('dtb_product.promotion_price','<','dtb_product.unit_price')->paginate(4);
        //sp trên top
        $productTop=dtb_config::join('dtb_product','dtb_product.id_configuration', '=','dtb_config.id')->where('top',1)->paginate(4);
        //sp phổ biến
        $productPopolar=dtb_config::join('dtb_product','dtb_product.id_configuration', '=','dtb_config.id')->where('popular',1)->paginate(4);
        return view('page.index',compact('carousel_active','carousel','banner','separate_l1','separate_l2','img_foot','typeProduct','producwithtype','saleProduct','productTop','productPopolar'));
    }
    public function getCart(){
        if(Session('cart')){
                $oldCart=Session::get('cart');
                $cart=new Cart($oldCart);
                return view('page.cart',compact('cart'));
        }
        else{
            return redirect()->route('trang-chu');
        }
    }
    public function getlistProduct($id_type){
        $typeProduct=dtb_config::join('dtb_product','dtb_product.id_configuration', '=','dtb_config.id')->where('dtb_product.id_type','=',$id_type)->get();
        $t=dtb_typeproduct::where('id',$id_type)->get();
        $ty=$t[0]->name;
        return view('page.listProducts',compact('typeProduct','ty'));
    }
    public function getProduct($id_product){
        $product=dtb_config::join('dtb_product','dtb_product.id_configuration', '=','dtb_config.id')->where('dtb_product.id','=',$id_product)->first();
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
        Auth::guard('dtb_customer')->logout();
        return redirect()->route('trang-chu');
    }
    //giỏ hàng
    public function postAddToCart(Request $r){
        $product=dtb_config::join('dtb_product','dtb_product.id_configuration', '=','dtb_config.id')->where('dtb_product.id','=',$r->id)->first();
        $oldCart=Session('cart')?Session::get('cart'):null;
        $cart=new cart($oldCart);
        $cart->add($product,$r->id);
        $r->Session()->put('cart',$cart);
    }
    public function getAddToCart(){
        if(Session('cart')){
            $oldCart=Session::get('cart');
            $cart=new cart($oldCart);
            $product_cart = $cart->items;
            foreach ($product_cart as $product) {
                echo '<div class="cart__product-item" name="'.$product["item"]["id"].'"><div class="cart__product-container"><div class="cpi__left"><a href="'.route('san-pham',$product['item']['id']).'" class="cpi__left-img"><img src="'.asset('').'/'.explode('||',$product['item']['image'])[0].'" alt=""></a><div class="cpi__left-content"><span class="content__name">' . $product["item"]["name"] . '</span><span class="content__price"><span class="cart__quantity">'.$product["qty"].'</span>*<span class="cart__price">'.$product["item"]["promotion_price"].'</span></span></div></div><button class="cpi__right"><i class="fas fa-trash-alt"></i></button></div></div>';
            }
        }
        else{
            echo '';
        }
    }
    public function delItemCart($id){
        $oldCart=Session::has('cart')?Session::get('cart'):null;
        $cart= new cart($oldCart);
        $cart->removeItem($id);
        if(count($cart->items)>0){
            Session::put('cart',$cart);
            $product_cart = $cart->items;
            foreach ($product_cart as $product) {
                echo '<div class="cart__product-item" name="'.$product["item"]["id"].'"><div class="cart__product-container"><div class="cpi__left"><a href="'.route("san-pham",$product["item"]["id"]).'" class="cpi__left-img"><img src="'.asset('').'/'.explode('||',$product['item']['image'])[0].'" alt=""></a><div class="cpi__left-content"><span class="content__name">' . $product["item"]["name"] . '</span><span class="content__price"><span class="cart__quantity">'.$product["qty"].'</span>*<span class="cart__price">'.$product["item"]["promotion_price"].'</span></span></div></div><button class="cpi__right"><i class="fas fa-trash-alt"></i></button></div></div>';
            }
        }
        else{
            Session::forget('cart');
        }
    }
    //page cart
    //page cart reload
    public function page_cart_get(){
        if(Session('cart')){
            $oldCart=Session::get('cart');
            $cart=new cart($oldCart);
            $product_cart = $cart->items;
            foreach ($product_cart as $product) {
                echo '<div class="row moihangchitiet"><div class="col-lg-2"><img class="img_gh" src="'.asset('').'/'.explode('||',$product['item']['image'])[0].'" alt="'.$product['item']['name'].'"></div><div class="col-sx-5 col-sm-5 col-md-5  col-lg-5"><a href="'.route('san-pham',$product['item']['id']).'">'.$product['item']['name'].'</a><br><p> Màn hinh: '.$product['item']['display'].',Ram: '.$product['item']['ram'].',Ô cứng: '.$product['item']['hard_disk'].'</p></div><div class="col-sx-2 col-sm-2 col-md-2  col-lg-2"><p class="tien">'.$product['item']['promotion_price'].'</p></div><div class="col-sx-3 col-sm-3 col-md-3  col-lg-3 nut"><button class="tru1" name="'.$product['item']['id'].'">-</button><input class="soluong" type="text" value="'.$product['qty'].'" readonly="readonly"><button  class="cong1" name="'.$product['item']['id'].'">+</button><button class="delete_page_cart" name="'.$product['item']['id'].'><i class="far fa-trash-alt"></i>Xóa</button></div></div>';
            }
        }
        else{
            echo '';
        }
    }
    //reduction cart
    public function reduction_cart(Request $r){
        $oldCart=Session('cart')?Session::get('cart'):null;
        $cart=new cart($oldCart);
        $cart->reduceByOne($r->id);
        if(count($cart->items)>0)
        {
            $r->Session()->put('cart',$cart);
        }
        else{
            Session::forget('cart');
        }
    }
    //record cart
    public function record_cart(Request $r){
        $cart=Session('cart')?Session::get('cart'):null;
        $id_c=null;
        if(Auth::guard('dtb_customer')->check())
        {
            $id_c=Auth::guard('dtb_customer')->user()->id;
        }
        $dtb_bills=new dtb_bills;
        $dtb_bills->id_customer=$id_c;
        $dtb_bills->date_order=date('Y-m-d');
        $dtb_bills->total=$cart->totalQty;
        $dtb_bills->payment=$cart->totalPrice+50000;
        $dtb_bills->note=$r->note;
        $dtb_bills->name_recipient=$r->name;
        $dtb_bills->phone=$r->phone;
        $dtb_bills->address=$r->address;
        $dtb_bills->save();
        $bill=dtb_bills::orderBy('id', 'DESC')->first();
        $id_bill=$bill->id;
        Session::forget('cart');
        foreach ($cart->items as $key => $value) {
            $dtb_billdetail=new dtb_billdetail;
            $dtb_billdetail->id_bill=$id_bill;
            $dtb_billdetail->id_product =$key;
            $dtb_billdetail->quantity=$value['qty'];
            $dtb_billdetail->promotion_price=$value['price']/$value['qty'];
            $dtb_billdetail->save();
        }
        $r->Session()->put('checkout','success');
        return redirect()->route('trang-chu');

    }
    //search
    public function search(Request $r){
        $typeProduct=dtb_config::join('dtb_product','dtb_product.id_configuration', '=','dtb_config.id')->where('name','like','%'.$r->key.'%')->orWhere('promotion_price',$r->key)->get();
        $ty=$r->key;
        return view('page.listProducts',compact('typeProduct','ty'));
    }
    //view all
    public function view_all1(){
        $productTop=dtb_config::join('dtb_product','dtb_product.id_configuration', '=','dtb_config.id')->where('top',1)->get();
        foreach ($productTop as $product) {
            $p1='<div class="col-lg-3 col-md-6 mb-3"><div class="card h-100"><a href="'.route('san-pham',$product->id).'"><img class="card-img-top" src="'.explode('||',$product->image)[0].'"alt=""></a><div class="card-body  "><h6 class="card-title"><a href="'.route('san-pham',$product->id).'">'.$product->name.'</a></h6>';
            $p2=($product->promotion_price<$product->unit_price)?'<div class="cartGG">'.$product->unit_price.'</div><div class="cardGia">'.$product->promotion_price.'</div>':'<div class="cardGia">'.$product->promotion_price.'</div>';
            $p3='<div class="row"><button class="add__cart" name="'.$product->id.'"><span class="add__cart-i"><i class="fa fa-shopping-cart"></i> Thêm vào giỏ</span></button></div><div class="row"><div class="container"><div class="cauhinh"><i class="fas fa-desktop"></i><p>'.$product->cart_graphic.'</p><i class="far fa-hdd"></i><p>'.$product->hard_disk.'</p></div></div></div><div class="row"><div class="container"><div class="cauhinh"><i class="fas fa-memory"></i><p>'.$product->ram.'</p><i class="fas fa-weight-hanging"></i><p>'.$product->weight.'</p><i class="fab fa-creative-commons-sampling-plus"></i><p>'.$product->cpu.'</p></div></div></div></div></div></div>';
            echo $p1.$p2.$p3;
        }
    }
    public function re_view_all1(){
        $productTop=dtb_config::join('dtb_product','dtb_product.id_configuration', '=','dtb_config.id')->where('top',1)->paginate(4);
        foreach ($productTop as $product) {
            $p1='<div class="col-lg-3 col-md-6 mb-3"><div class="card h-100"><a href="'.route('san-pham',$product->id).'"><img class="card-img-top" src="'.explode('||',$product->image)[0].'"alt=""></a><div class="card-body  "><h6 class="card-title"><a href="'.route('san-pham',$product->id).'">'.$product->name.'</a></h6>';
            $p2=($product->promotion_price<$product->unit_price)?'<div class="cartGG">'.$product->unit_price.'</div><div class="cardGia">'.$product->promotion_price.'</div>':'<div class="cardGia">'.$product->promotion_price.'</div>';
            $p3='<div class="row"><button class="add__cart" name="'.$product->id.'"><span class="add__cart-i"><i class="fa fa-shopping-cart"></i> Thêm vào giỏ</span></button></div><div class="row"><div class="container"><div class="cauhinh"><i class="fas fa-desktop"></i><p>'.$product->cart_graphic.'</p><i class="far fa-hdd"></i><p>'.$product->hard_disk.'</p></div></div></div><div class="row"><div class="container"><div class="cauhinh"><i class="fas fa-memory"></i><p>'.$product->ram.'</p><i class="fas fa-weight-hanging"></i><p>'.$product->weight.'</p><i class="fab fa-creative-commons-sampling-plus"></i><p>'.$product->cpu.'</p></div></div></div></div></div></div>';
            echo $p1.$p2.$p3;
        }
    }
    public function view_all2(){
        $productTop=dtb_config::join('dtb_product','dtb_product.id_configuration', '=','dtb_config.id')->wherecolumn('dtb_product.promotion_price','<','dtb_product.unit_price')->get();
        foreach ($productTop as $product) {
            $p1='<div class="col-lg-3 col-md-6 mb-3"><div class="card h-100"><a href="'.route('san-pham',$product->id).'"><img class="card-img-top" src="'.explode('||',$product->image)[0].'"alt=""></a><div class="card-body  "><h6 class="card-title"><a href="'.route('san-pham',$product->id).'">'.$product->name.'</a></h6>';
            $p2=($product->promotion_price<$product->unit_price)?'<div class="cartGG">'.$product->unit_price.'</div><div class="cardGia">'.$product->promotion_price.'</div>':'<div class="cardGia">'.$product->promotion_price.'</div>';
            $p3='<div class="row"><button class="add__cart" name="'.$product->id.'"><span class="add__cart-i"><i class="fa fa-shopping-cart"></i> Thêm vào giỏ</span></button></div><div class="row"><div class="container"><div class="cauhinh"><i class="fas fa-desktop"></i><p>'.$product->cart_graphic.'</p><i class="far fa-hdd"></i><p>'.$product->hard_disk.'</p></div></div></div><div class="row"><div class="container"><div class="cauhinh"><i class="fas fa-memory"></i><p>'.$product->ram.'</p><i class="fas fa-weight-hanging"></i><p>'.$product->weight.'</p><i class="fab fa-creative-commons-sampling-plus"></i><p>'.$product->cpu.'</p></div></div></div></div></div></div>';
            echo $p1.$p2.$p3;
        }
    }
    public function re_view_all2(){
        $productTop=dtb_config::join('dtb_product','dtb_product.id_configuration', '=','dtb_config.id')->wherecolumn('dtb_product.promotion_price','<','dtb_product.unit_price')->paginate(4);
        foreach ($productTop as $product) {
            $p1='<div class="col-lg-3 col-md-6 mb-3"><div class="card h-100"><a href="'.route('san-pham',$product->id).'"><img class="card-img-top" src="'.explode('||',$product->image)[0].'"alt=""></a><div class="card-body  "><h6 class="card-title"><a href="'.route('san-pham',$product->id).'">'.$product->name.'</a></h6>';
            $p2=($product->promotion_price<$product->unit_price)?'<div class="cartGG">'.$product->unit_price.'</div><div class="cardGia">'.$product->promotion_price.'</div>':'<div class="cardGia">'.$product->promotion_price.'</div>';
            $p3='<div class="row"><button class="add__cart" name="'.$product->id.'"><span class="add__cart-i"><i class="fa fa-shopping-cart"></i> Thêm vào giỏ</span></button></div><div class="row"><div class="container"><div class="cauhinh"><i class="fas fa-desktop"></i><p>'.$product->cart_graphic.'</p><i class="far fa-hdd"></i><p>'.$product->hard_disk.'</p></div></div></div><div class="row"><div class="container"><div class="cauhinh"><i class="fas fa-memory"></i><p>'.$product->ram.'</p><i class="fas fa-weight-hanging"></i><p>'.$product->weight.'</p><i class="fab fa-creative-commons-sampling-plus"></i><p>'.$product->cpu.'</p></div></div></div></div></div></div>';
            echo $p1.$p2.$p3;
        }
    }
    public function view_all3(){
        $productTop=dtb_config::join('dtb_product','dtb_product.id_configuration', '=','dtb_config.id')->where('popular',1)->get();
        foreach ($productTop as $product) {
            $p1='<div class="col-lg-3 col-md-6 mb-3"><div class="card h-100"><a href="'.route('san-pham',$product->id).'"><img class="card-img-top" src="'.explode('||',$product->image)[0].'"alt=""></a><div class="card-body  "><h6 class="card-title"><a href="'.route('san-pham',$product->id).'">'.$product->name.'</a></h6>';
            $p2=($product->promotion_price<$product->unit_price)?'<div class="cartGG">'.$product->unit_price.'</div><div class="cardGia">'.$product->promotion_price.'</div>':'<div class="cardGia">'.$product->promotion_price.'</div>';
            $p3='<div class="row"><button class="add__cart" name="'.$product->id.'"><span class="add__cart-i"><i class="fa fa-shopping-cart"></i> Thêm vào giỏ</span></button></div><div class="row"><div class="container"><div class="cauhinh"><i class="fas fa-desktop"></i><p>'.$product->cart_graphic.'</p><i class="far fa-hdd"></i><p>'.$product->hard_disk.'</p></div></div></div><div class="row"><div class="container"><div class="cauhinh"><i class="fas fa-memory"></i><p>'.$product->ram.'</p><i class="fas fa-weight-hanging"></i><p>'.$product->weight.'</p><i class="fab fa-creative-commons-sampling-plus"></i><p>'.$product->cpu.'</p></div></div></div></div></div></div>';
            echo $p1.$p2.$p3;
        }
    }
    public function re_view_all3(){
        $productTop=dtb_config::join('dtb_product','dtb_product.id_configuration', '=','dtb_config.id')->where('popular',1)->paginate(4);
        foreach ($productTop as $product) {
            $p1='<div class="col-lg-3 col-md-6 mb-3"><div class="card h-100"><a href="'.route('san-pham',$product->id).'"><img class="card-img-top" src="'.explode('||',$product->image)[0].'"alt=""></a><div class="card-body  "><h6 class="card-title"><a href="'.route('san-pham',$product->id).'">'.$product->name.'</a></h6>';
            $p2=($product->promotion_price<$product->unit_price)?'<div class="cartGG">'.$product->unit_price.'</div><div class="cardGia">'.$product->promotion_price.'</div>':'<div class="cardGia">'.$product->promotion_price.'</div>';
            $p3='<div class="row"><button class="add__cart" name="'.$product->id.'"><span class="add__cart-i"><i class="fa fa-shopping-cart"></i> Thêm vào giỏ</span></button></div><div class="row"><div class="container"><div class="cauhinh"><i class="fas fa-desktop"></i><p>'.$product->cart_graphic.'</p><i class="far fa-hdd"></i><p>'.$product->hard_disk.'</p></div></div></div><div class="row"><div class="container"><div class="cauhinh"><i class="fas fa-memory"></i><p>'.$product->ram.'</p><i class="fas fa-weight-hanging"></i><p>'.$product->weight.'</p><i class="fab fa-creative-commons-sampling-plus"></i><p>'.$product->cpu.'</p></div></div></div></div></div></div>';
            echo $p1.$p2.$p3;
        }
    }
    //admin
    public function get_login_admin(){
        return view('admin_page.login');
    }
    public function login_admin_exe(Request $r){
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
        if(Auth::guard('dtb_employee')->attempt($cridentials)){
            return redirect()->route('danh-sach-san-pham');
        }
        else{
            return redirect()->back();
        }
    }
    public function logout_admin(){
        Auth::guard('dtb_employee')->logout();
        return redirect()->route('dang-nhap-admin');
    }
    public function user_list(){
        $user=dtb_employee::all();
        return view('admin_page.user_list',compact('user'));
    }
    //paginate user
    public function paginate_user_admin($stt){
        $user=dtb_employee::all();
        if(($stt*4)>=count($user)){
            $html_table='';
            for($i=($stt*4)-4;$i<count($user);$i++){
                $html_table.='<tr class="odd gradeX" align="center"><td>'.$user[$i]['id'].'</td><td>'.$user[$i]['full_name'].'</td><td>'.$user[$i]['birth'].'</td><td>'.$user[$i]['address'].'</td><td>'.$user[$i]['gender'].'</td><td>'.$user[$i]['phone'].'</td><td>'.$user[$i]['email'].'</td><td class="center delete" name="'.$user[$i]['id'].'"><i class="fa fa-trash-o  fa-fw"></i><a href="#"> Delete</a></td><td class="center"><i class="fa fa-pencil fa-fw"></i><a href="'.route('sua-nguoi-dung',$user[$i]['id']).'">Edit</a></td></tr>';
            }
            echo $html_table;
        }
        else{
            $html_table='';
            for($i=($stt*4)-4;$i<($stt*4);$i++){
                $html_table.='<tr class="odd gradeX" align="center"><td>'.$user[$i]['id'].'</td><td>'.$user[$i]['full_name'].'</td><td>'.$user[$i]['birth'].'</td><td>'.$user[$i]['address'].'</td><td>'.$user[$i]['gender'].'</td><td>'.$user[$i]['phone'].'</td><td>'.$user[$i]['email'].'</td><td class="center delete" name="'.$user[$i]['id'].'"><i class="fa fa-trash-o  fa-fw"></i><a href="#"> Delete</a></td><td class="center"><i class="fa fa-pencil fa-fw"></i><a href="'.route('sua-nguoi-dung',$user[$i]['id']).'">Edit</a></td></tr>';
            }
            echo $html_table;
        }
    }
    public function user_edit($id){
        $user=dtb_employee::where('id',$id)->first();
        return view('admin_page.user_edit',compact('user'));
    }
    public function view_all_user_exe(){
        $users=dtb_employee::all();
        foreach ($users as $user) {
            echo '<tr class="odd gradeX" align="center"><td>'.$user->id.'</td><td>'.$user->full_name.'</td><td>'.$user->birth.'</td><td>'.$user->address.'</td><td>'.$user->gender.'</td><td>'.$user->phone.'</td><td>'.$user->email.'</td><td class="center delete" name="'.$user->id.'"><i class="fa fa-trash-o  fa-fw"></i><a href="#"> Delete</a></td><td class="center"><i class="fa fa-pencil fa-fw"></i><a href="'.route('sua-nguoi-dung',$user->id).'">Edit</a></td></tr>';
        }
    }
    public function user_delete_exe($id){
        $res=dtb_employee::where('id',$id)->delete();
        $user=dtb_employee::all();
        for($i=0;$i<4;$i++) {
            echo '<tr class="odd gradeX" align="center"><td>'.$user[$i]['id'].'</td><td>'.$user[$i]['full_name'].'</td><td>'.$user[$i]['birth'].'</td><td>'.$user[$i]['address'].'</td><td>'.$user[$i]['gender'].'</td><td>'.$user[$i]['phone'].'</td><td>'.$user[$i]['email'].'</td><td class="center delete" name="'.$user[$i]['id'].'"><i class="fa fa-trash-o  fa-fw"></i><a href="#"> Delete</a></td><td class="center"><i class="fa fa-pencil fa-fw"></i><a href="'.route('sua-nguoi-dung',$user[$i]['id']).'">Edit</a></td></tr>';
        }
    }
    public function user_edit_exe(Request $r){
        $user=dtb_employee::where('id',$r->id)->first();
        $user->full_name=$r->full_name;
        $user->birth=$r->birth;
        $user->address=$r->address;
        if($r->gender==1)
        {
            $user->gender="Nam";
        }
        else{
            $user->gender="Nu";
        }
        $user->phone=$r->phone;
        $user->email=$r->email;
        if($r->password !='')
        {
            $user->password=Hash::make($r->password);
        }
        $user->save();
        $r->Session()->put('user_edit_success','success');
        return redirect()->route('danh-sach-nguoi-dung');
    }





    //category
    //add
    public function category_add_admin(){
        return view('admin_page.cate_product_add');
    }
    //exec add
    public function category_add_admin_exe(Request $r){
        $path="mockup/images/chitietsanpham/".$r->txtCateName;
        File::makeDirectory($path);
        $typeProduct=new dtb_typeproduct;
        $typeProduct->name=$r->txtCateName;
        $typeProduct->description=$r->txtContent;
        $typeProduct->save();
        $r->Session()->put('category_add_success','success');
        return redirect()->route('them-loai-san-pham');
    }
    public function category_list_admin(){
        $typeProduct=dtb_typeproduct::all();
        return view('admin_page.cate_product_list',compact('typeProduct'));
    }
    //paginate category
    public function paginate_category_admin($stt){
        $typeProduct=dtb_typeproduct::all();
        if(($stt*4)>=count($typeProduct)){
            $html_table='';
            for($i=($stt*4)-4;$i<count($typeProduct);$i++){
                $html_table.='<tr class="odd gradeX" align="center"><td>'.$typeProduct[$i]['id'].'</td><td>'.$typeProduct[$i]['name'].'</td><td>'.$typeProduct[$i]['description'].'</td><td class="center delete" name="'.$typeProduct[$i]['id'].'"><i class="fa fa-trash-o  fa-fw"></i><a href="#"> Delete</a></td><td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="'.route('sua-loai-san-pham',$typeProduct[$i]['id']).'">Edit</a></td></tr>';
            }
            echo $html_table;
        }
        else{
            $html_table='';
            for($i=($stt*4)-4;$i<($stt*4);$i++){
                $html_table.='<tr class="odd gradeX" align="center"><td>'.$typeProduct[$i]['id'].'</td><td>'.$typeProduct[$i]['name'].'</td><td>'.$typeProduct[$i]['description'].'</td><td class="center delete" name="'.$typeProduct[$i]['id'].'"><i class="fa fa-trash-o  fa-fw"></i><a href="#"> Delete</a></td><td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="'.route('sua-loai-san-pham',$typeProduct[$i]['id']).'">Edit</a></td></tr>';
            }
            echo $html_table;
        }
    }
    //view all category
    public function view_all_category_exe(){
        $typeProduct=dtb_typeproduct::all();
        foreach ($typeProduct as $type) {
            echo '<tr class="odd gradeX" align="center"><td>'.$type['id'].'</td><td>'.$type['name'].'</td><td>'.$type['description'].'</td><td class="center delete" name="'.$type['id'].'"><i class="fa fa-trash-o  fa-fw"></i><a href="#"> Delete</a></td><td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="'.route('sua-loai-san-pham',$type['id']).'">Edit</a></td></tr>';
        }
    }
    public function category_delete_admin_exe($id){
        $t=dtb_typeproduct::where('id',$id)->first();
        $path="mockup/images/chitietsanpham/".$t->name;
        File::deleteDirectory(public_path($path));
        $res=dtb_typeproduct::where('id',$id)->delete();
        $typeProduct=dtb_typeproduct::all();
        for($i=0;$i<4;$i++) {
            echo '<tr class="odd gradeX" align="center"><td>'.$typeProduct[$i]['id'].'</td><td>'.$typeProduct[$i]['name'].'</td><td>'.$typeProduct[$i]['description'].'</td><td class="center delete" name="'.$typeProduct[$i]['id'].'"><i class="fa fa-trash-o  fa-fw"></i><a href="#"> Delete</a></td><td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="'.route('sua-loai-san-pham',$typeProduct[$i]['id']).'">Edit</a></td></tr>';
        }
    }
    //edit
    public function category_edit_admin($id_typeProduct){
        $typeProduct=dtb_typeproduct::where('id',$id_typeProduct)->first();
        return view('admin_page.cate_product_edit',compact('typeProduct'));
    }
    //edit_exe
    public function category_edit_admin_exe(Request $r){
        $typeProduct=dtb_typeproduct::where('id',$r->txtCate_id)->first();
        $path='mockup/images/chitietsanpham/'.$r->txtCateName;
        $old_path='mockup/images/chitietsanpham/'.$typeProduct['name'];
        rename($old_path,$path);
        $products=dtb_product::where('id_type',$r->txtCate_id)->get();
        for($i =0;$i<count($products);$i++){
            $products[$i]->image=str_replace($typeProduct->name, $r->txtCateName, $products[$i]->image);
            $products[$i]->save();
        }

        $type = dtb_typeproduct::where('id',$r->txtCate_id)->first();
        $type->name = $r->txtCateName;
        $type->description = $r->txtContent;
        $type->save();
        $r->Session()->put('category_edit_success','success');
        return redirect()->route('danh-sach-loai-san-pham');
    }
    //product
    public function product_add_admin(){
        return view('admin_page.product_add');
    }
    public function product_edit_admin($id_product){
        $product=dtb_product::where('id',$id_product)->first();
        $config=dtb_config::where('id','!=',$product->id_configuration)->get();
        $typeProduct=dtb_typeproduct::where('id','!=',$product->id_type)->get();
        $config_current=dtb_config::where('id',$product->id_configuration)->first();
        $typeProduct_current=dtb_typeproduct::where('id',$product->id_type)->first();
        return view('admin_page.product_edit',compact('config','typeProduct','product','config_current','typeProduct_current'));
    }
    public function product_list_admin(){
        $product=dtb_product::all();
        return view('admin_page.product_list',compact('product'));
    }
    public function product_add_admin_exe(Request $r){
        //lưu ảnh
        $typeProduct=dtb_typeproduct::where('id',$r->id_type)->first();
        $path="mockup/images/chitietsanpham/".$typeProduct['name']."/".$r->name;
        $link_img='';
        File::makeDirectory($path);
        if($r->hasFile('img1')){
            $img1=$r->file('img1');
            $img1->move($path,'a1.jpg');
            $link_img.=$path.'/a1.jpg||';
        }
        else{
            $img1='';
        }
        if($r->hasFile('img2')){
            $img1=$r->file('img2');
            $img1->move($path,'a2.jpg');
            $link_img.=$path.'/a2.jpg||';
        }
        else{
            $img2='';
        }
        if($r->hasFile('img3')){
            $img1=$r->file('img3');
            $img1->move($path,'a3.jpg');
            $link_img.=$path.'/a3.jpg||';
        }
        else{
            $img3='';
        }
        if($r->hasFile('img4')){
            $img1=$r->file('img4');
            $img1->move($path,'a4.jpg');
            $link_img.=$path.'/a4.jpg';
        }
        else{
            $img4='';
        }

        $dtb_product=new dtb_product;
        $dtb_product->name=$r->name;
        $dtb_product->id_type=$r->id_type;
        $dtb_product->description=$r->description;
        $dtb_product->unit_price=$r->unit_price;
        $dtb_product->promotion_price=$r->promotion_price;
        $dtb_product->image=$link_img;
        $dtb_product->id_configuration=$r->id_config;
        if($r->top==1)
        {
            $dtb_product->top=1;
        }
        else{
            $dtb_product->top=0;
        }
        if($r->porpular==1)
        {
            $dtb_product->popular=1;
        }
        else{
            $dtb_product->popular=0;
        }
        $dtb_product->save();
        $r->Session()->put('product_add_success','success');
        return redirect()->route('them-san-pham');
    }
    //get id typeproduct ajax
    public function get_id_type_product(){
        $typeProduct=dtb_typeproduct::all();
        foreach ($typeProduct as $type) {
            echo '<option value="'.$type->id.'">'.$type->id.'-'.$type->name.'</option>';
        }
    }
    //get id config ajax
    public function get_id_config(){
        $config=dtb_config::all();
        foreach ($config as $conf) {
            echo '<option value="'.$conf->id.'">'.$conf->id.'-'.$conf->cpu.'</option>';
        }
    }
    //paginate product
    public function paginate_product_admin($stt){
        $product=dtb_product::all();
        if(($stt*4)>=count($product)){
            $html_table='';
            for($i=($stt*4)-4;$i<count($product);$i++){
                $html_table.='<tr class="odd gradeX" align="center"><td>'.$product[$i]->id.'</td><td ><p>'.$product[$i]->name.'</p><img style="width: 200px" src="'.asset('').'/'.explode('||',$product[$i]->image)[0].'" alt="'.$product[$i]->name.'"></td><td>'.$product[$i]->id_type.'</td><td>'.$product[$i]->description.'</td><td>'.$product[$i]->unit_price.'</td><td>'.$product[$i]->promotion_price.'</td><td>'.$product[$i]->id_configuration.'</td><td>'.$product[$i]->top.'</td><td>'.$product[$i]->popular.'</td><td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="#" class="delete" name="'.$product[$i]->id.'"> Delete</a></td><td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="'.route('sua-san-pham',$product[$i]->id).'">Edit</a></td></tr>';
            }
            echo $html_table;
        }
        else{
            $html_table='';
            for($i=($stt*4)-4;$i<($stt*4);$i++){
                $html_table.='<tr class="odd gradeX" align="center"><td>'.$product[$i]->id.'</td><td ><p>'.$product[$i]->name.'</p><img style="width: 200px" src="'.asset('').'/'.explode('||',$product[$i]->image)[0].'" alt="'.$product[$i]->name.'"></td><td>'.$product[$i]->id_type.'</td><td>'.$product[$i]->description.'</td><td>'.$product[$i]->unit_price.'</td><td>'.$product[$i]->promotion_price.'</td><td>'.$product[$i]->id_configuration.'</td><td>'.$product[$i]->top.'</td><td>'.$product[$i]->popular.'</td><td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="#" class="delete" name="'.$product[$i]->id.'"> Delete</a></td><td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="'.route('sua-san-pham',$product[$i]->id).'">Edit</a></td></tr>';
            }
            echo $html_table;
        }
    }
    public function view_all_product_exe(){
        $products=dtb_product::all();
        foreach ($products as $product) {
            echo '<tr class="odd gradeX" align="center"><td>'.$product->id.'</td><td ><p>'.$product->name.'</p><img style="width: 200px" src="'.asset('').'/'.explode('||',$product->image)[0].'" alt="'.$product->name.'"></td><td>'.$product->id_type.'</td><td>'.$product->description.'</td><td>'.$product->unit_price.'</td><td>'.$product->promotion_price.'</td><td>'.$product->id_configuration.'</td><td>'.$product->top.'</td><td>'.$product->popular.'</td><td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="#" class="delete" name="'.$product->id.'">Delete</a></td><td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="'.route('sua-san-pham',$product->id).'">Edit</a></td>';
            
        }
    }
    //delete product
    public function product_delete_admin_exe($id){
        $p=dtb_product::where('id',$id)->first();
        $t=dtb_typeproduct::where('id',$p->id_type)->first();
        $path="mockup/images/chitietsanpham/".$t->name.'/'.$p->name;
        File::deleteDirectory(public_path($path));
        $res=dtb_product::where('id',$id)->delete();
        $product=dtb_product::all();
        for($i=0;$i<4;$i++) {
            echo '<tr class="odd gradeX" align="center"><td>'.$product[$i]->id.'</td><td ><p>'.$product[$i]->name.'</p><img style="width: 200px" src="'.asset('').'/'.explode('||',$product[$i]->image)[0].'" alt="'.$product[$i]->name.'"></td><td>'.$product[$i]->id_type.'</td><td>'.$product[$i]->description.'</td><td>'.$product[$i]->unit_price.'</td><td>'.$product[$i]->promotion_price.'</td><td>'.$product[$i]->id_configuration.'</td><td>'.$product[$i]->top.'</td><td>'.$product[$i]->popular.'</td><td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="#" class="delete" name="'.$product[$i]->id.'"> Delete</a></td><td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="'.route('sua-san-pham',$product[$i]->id).'">Edit</a></td></tr>';
        }
    }
    //Sửa sản phẩm
    public function product_edit_admin_exe(Request $r){
        //thay đổi image
        $typeProduct=dtb_typeproduct::where('id',$r->id_type)->first();
        $path="mockup/images/chitietsanpham/".$typeProduct['name']."/".$r->name;
        //cập nhật lại đường dẫn ảnh
        $product_t = dtb_product::where('id',$r->id)->first();
        $old_path="mockup/images/chitietsanpham/".$typeProduct['name']."/".$product_t->name;
        rename($old_path,$path);
        $image=$path.'/a1.jpg||'.$path.'/a2.jpg||'.$path.'/a3.jpg||'.$path.'/a4.jpg';
        //
        if($r->hasFile('img1')){
            $img1=$r->file('img1');
            $img1->move($path,'a1.jpg');
        }
        if($r->hasFile('img2')){
            $img2=$r->file('img2');
            $img2->move($path,'a2.jpg');
        }
        if($r->hasFile('img3')){
            $img3=$r->file('img3');
            $img3->move($path,'a3.jpg');
        }
        if($r->hasFile('img4')){
            $img4=$r->file('img4');
            $img4->move($path,'a4.jpg');
        }


        $product = dtb_product::where('id',$r->id)->first();
        $product->name=$r->name;
        $product->id_type =$r->id_type;
        $product->description=$r->description;
        $product->unit_price=$r->unit_price;
        $product->promotion_price=$r->promotion_price;
        $product->image=$image;
        $product->id_configuration=$r->id_config;
        if($r->top==1)
        {
            $product->top=1;
        }
        else{
            $product->top=0;
        }
        if($r->porpular==1)
        {
            $product->popular=1;
        }
        else{
            $product->popular=0;
        }
        $product->save();
        $r->Session()->put('product_edit_success','success');
        return redirect()->route('danh-sach-san-pham');
    }


    //config
    public function config_add(){
        return view('admin_page.config_add');
    }
    public function config_add_exe(Request $r){
        $config=new dtb_config;
        $config->cpu=$r->cpu;
        $config->ram=$r->ram;
        $config->hard_disk=$r->hard_disk;
        $config->cart_graphic=$r->card;
        $config->display=$r->monitor;
        $config->connect=$r->connect;
        $config->pin=$r->pin;
        $config->weight=$r->weight;
        $config->size=$r->size;
        $config->save();
        $r->Session()->put('config_add_success','success');
        return redirect()->route('them-cau-hinh');
    }
    public function config_list(){
        $config=dtb_config::all();
        return view('admin_page.config_list',compact('config'));
    }
    //paginate config
    public function paginate_config_admin($stt){
        $config=dtb_config::all();
        if(($stt*4)>=count($config)){
            $html_table='';
            for($i=($stt*4)-4;$i<count($config);$i++){
                $html_table.='<tr class="odd gradeX" align="center"><td>'.$config[$i]['id'].'</td><td>'.$config[$i]['cpu'].'</td><td>'.$config[$i]['ram'].'</td><td>'.$config[$i]['hard_disk'].'</td><td>'.$config[$i]['cart_graphic'].'</td><td>'.$config[$i]['display'].'</td><td>'.$config[$i]['connect'].'</td><td>'.$config[$i]['pin'].'</td><td>'.$config[$i]['weight'].'</td><td>'.$config[$i]['size'].'</td><td class="center delete" name="'.$config[$i]['id'].'"><i class="fa fa-trash-o  fa-fw"></i><a href="#"> Delete</a></td><td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="'.route('sua-cau-hinh',$config[$i]['id']).'">Edit</a></td></tr>';
            }
            echo $html_table;
        }
        else{
            $html_table='';
            for($i=($stt*4)-4;$i<($stt*4);$i++){
                $html_table.='<tr class="odd gradeX" align="center"><td>'.$config[$i]['id'].'</td><td>'.$config[$i]['cpu'].'</td><td>'.$config[$i]['ram'].'</td><td>'.$config[$i]['hard_disk'].'</td><td>'.$config[$i]['cart_graphic'].'</td><td>'.$config[$i]['display'].'</td><td>'.$config[$i]['connect'].'</td><td>'.$config[$i]['pin'].'</td><td>'.$config[$i]['weight'].'</td><td>'.$config[$i]['size'].'</td><td class="center delete" name="'.$config[$i]['id'].'"><i class="fa fa-trash-o  fa-fw"></i><a href="#"> Delete</a></td><td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="'.route('sua-cau-hinh',$config[$i]['id']).'">Edit</a></td></tr>';
            }
            echo $html_table;
        }
    }
    //edit
    public function edit_config($id_config){
        $config=dtb_config::where('id',$id_config)->first();
        return view('admin_page.config_edit',compact('config'));
    }
    //edit_exe
    public function config_edit_admin_exe(Request $r){
        $config = dtb_config::where('id',$r->id)->first();
        $config->cpu=$r->cpu;
        $config->ram=$r->ram;
        $config->hard_disk=$r->hard_disk;
        $config->cart_graphic=$r->card;
        $config->display=$r->monitor;
        $config->connect=$r->connect;
        $config->pin=$r->pin;
        $config->weight=$r->weight;
        $config->size=$r->size;
        $config->save();
        $r->Session()->put('config_edit_success','success');
        return redirect()->route('danh-sach-cau-hinh');
    }
    public function config_delete_admin_exe($id){
        $res=dtb_config::where('id',$id)->delete();
        $config=dtb_config::all();
        for($i=0;$i<4;$i++) {
            echo '<tr class="odd gradeX" align="center"><td>'.$config[$i]['id'].'</td><td>'.$config[$i]['cpu'].'</td><td>'.$config[$i]['ram'].'</td><td>'.$config[$i]['hard_disk'].'</td><td>'.$config[$i]['cart_graphic'].'</td><td>'.$config[$i]['display'].'</td><td>'.$config[$i]['connect'].'</td><td>'.$config[$i]['pin'].'</td><td>'.$config[$i]['weight'].'</td><td>'.$config[$i]['size'].'</td><td class="center delete" name="'.$config[$i]['id'].'"><i class="fa fa-trash-o  fa-fw"></i><a href="#"> Delete</a></td><td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="'.route('sua-cau-hinh',$config[$i]['id']).'">Edit</a></td></tr>';
        }
    }
    //view all config
    public function view_all_config_exe(){
        $config=dtb_config::all();
        foreach ($config as $conf) {
            echo '<tr class="odd gradeX" align="center"><td>'.$conf['id'].'</td><td>'.$conf['cpu'].'</td><td>'.$conf['ram'].'</td><td>'.$conf['hard_disk'].'</td><td>'.$conf['cart_graphic'].'</td><td>'.$conf['display'].'</td><td>'.$conf['connect'].'</td><td>'.$conf['pin'].'</td><td>'.$conf['weight'].'</td><td>'.$conf['size'].'</td><td class="center delete" name="'.$conf['id'].'"><i class="fa fa-trash-o  fa-fw"></i><a href="#"> Delete</a></td><td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="'.route('sua-cau-hinh',$conf['id']).'">Edit</a></td></tr>';
            
        }
    }

    //user admin
    public function user_add(){
        return view('admin_page.user_add');
    }
    public function user_add_exe(Request $r){
        $user=new dtb_employee;
        $user->full_name=$r->full_name;
        $user->birth=$r->birth;
        $user->address=$r->address;
        if($r->gender==1)
        {
            $user->gender="Nam";
        }
        else{
            $user->gender="Nu";
        }
        $user->phone=$r->phone;
        $user->email=$r->email;
        $user->password=Hash::make($r->password);
        $user->save();
        $r->Session()->put('user_add_success','success');
        return redirect()->route('them-nguoi-dung');
    }






    //auth overwrite email
    // class LoginController extends Controller
    // {
    //     use AuthenticatesUsers;
    //     // ...

    //     public function username()
    //     {
    //         return 'username';
    //     }
    // }

}