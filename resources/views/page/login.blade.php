@extends('master.master_login')
@section('noiDung')
<div class="container-fluid">
            <!-- @if(Session::has('thongbao'))
                <h1>{{Session::get('thongbao')}}</h1>
                {{Session::forget('thongbao')}}
            @endif -->
            <div class="row my-1">
                <div class="col-xs-6 col-sm-6 com-md-6 col-lg-6 col-xl-6">
                    <img src="mockup/images/dangky/Lovepik_com-832282987-Hand drawn cartoon laptop.png" alt="">
                </div>
                <div class="col-xs-6 col-sm-6 com-md-6 col-lg-6 col-xl-6 content ">
                    <div class="container form">
                        <h4>Đăng Nhập </h4>
                        <br>
                        @if(count($errors)>0)
                        <p class="alert-danger">
                            @foreach($errors->all() as $er){{$er.' '}}@endforeach
                        </p>
                        @endif

                        <p class="float">Thành viên mới? <a href="mockup/signin.html">Đăng ký</a></p>

                        <form action="{{route('thuc-hien-dang-nhap')}}" method="post" class="needs-validation" novalidate>
                            @csrf
                            <div class="form-group">

                                <input type="text" onblur="ktraEmail()" class="form-control" id="taikhoan"
                                    placeholder="Email/Số điện thoại/Tên đăng nhập" name="email" require>
                                <span id="err1"></span>

                                <div class="valid-feedback">Valid.</div>
                                <div class="invalid-feedback">Tên đăng nhập không được để trống.</div>
                            </div>
                            <div class="form-group">

                                <input type="password" onblur="ktraMatKhau()" class="form-control" id="matkhau"
                                    placeholder="Mật Khẩu" name="password" required>
                                <span id="err2"></span>

                                <div class="valid-feedback">Valid.</div>

                                <div class="invalid-feedback">Mật khẩu không được để trốnng.</div>
                            </div>

                            <div class="container">
                                <div class="row">
                                    <button type="submit" onclick="hienThiDuLieu()" class="btn bnt1" id="btn">Đăng
                                        nhập</button>
                                </div>
                            </div>

                            <p id="br"></p> Hoặc, đăng nhập bằng</p>

                            <div class="container">
                                <div class="row my-1">
                                    <button type="submit" class="btn bnt1" id="btn_betweent"><i
                                            class="fab fa-facebook-square"></i> Facebook</button>
                                </div>
                            </div>
                            <div class="container">
                                <div class="row my-1">
                                    <button type="submit" class="btn bnt1"><i class="fab fa-google-plus-square"></i>
                                        Google</button>
                                </div>
                            </div>
                            <div class="container">
                                <br>
                                <a href="#" id="qmk">Quên mật khẩu ?</a>
                            </div>
                        </form>
                    </div>
                </div>


            </div>
        </div>
        <div class="modal fade" id="myModal">

        <div class="modal-dialog modal-lg">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Đăng nhập thành công</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <!-- Modal body -->
                <div class="modal-body" id="hienthiThongTin">
                    <table class="table table-hover">
                        <tbody>
                            <tr>
                                <td>Họ tên</td>
                                <td class="modalThongTin">dsds</td>
                            </tr>
                            <tr>
                                <td>Số điện thoại</td>
                                <td class="modalThongTin">dsd</td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Đóng</button>
                </div>

            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script type="text/javascript">
        document.addEventListener("DOMContentLoaded", function (){
            $.ajaxSetup({
              headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              }
            });
            //load trang
            var count = 0;
            $(".cart__product-item").each(function () {
                count += parseInt($(this).find(".cart__quantity").html());
            });
            $("#lblCartCount").text(count);
            //remove cart
            $('.cart__product').on('click', '.cpi__right', function (){
                var id=parseInt($(this).closest('.cart__product-item').attr('name').trim());
                var url="{{asset('').'remove_cart/'}}"+id;
                $.ajax({
                url: url,
                method: "get",
                success: function (data) {
                    $('.cart__product').html(data);
                    var cart_item = document.getElementsByClassName("cart__product")[0];
                    var cart_rows = cart_item.getElementsByClassName("cart__product-item");
                    var total = 0;
                    for (var i = 0; i < cart_rows.length; i++) {
                        var cart_row = cart_rows[i]
                        var price_item = cart_row.getElementsByClassName("cart__price")[0]
                        var quantity_item = cart_row.getElementsByClassName("cart__quantity")[0]
                        var price = parseFloat(price_item.innerText)
                        var quantity = parseInt(quantity_item.innerText)
                        total = total + (price * quantity)
                    }
                    document.getElementsByClassName("cart__total-price")[0].innerText = total + 'VNĐ'
                    var count = 0;
                    $(".cart__product-item").each(function () {
                        count += parseInt($(this).find(".cart__quantity").html());
                    });
                    $("#lblCartCount").text(count);

                },
                });
            });
        });
    </script>
@endsection