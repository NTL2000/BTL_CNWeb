@extends('master.master_signin')
@section('noiDung')
<div class="container-fluid">
            <div class="row my-1">
                <div class="col-xs-col-lg-6 col-sm-6 com-md-6 col-lg-6 col-xl-6 ">
                    <img src="mockup/images/dangky/Lovepik_com-832282987-Hand drawn cartoon laptop.png" alt="">
                </div>
                <div class="col-xs-col-lg-6 col-sm-6 com-md-6 col-lg-6 col-xl-6 content ">
                    <div class="container form">
                        <h4>Đăng Ký</h4>
                        <br>
                        @if(count($errors)>0)
                        <p class="alert-danger">
                            @foreach($errors->all() as $er){{$er}}@endforeach
                        </p>
                    @endif
                        <br>

                        <form name="formThongTin" action="{{route('ghi_khachhang')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <table class="tabledk">
                                <tr class="tabledk_tr1">
                                    <td class="lable1">Họ Tên</td>
                                    <td>
                                        <input type="text" name="name" placeholder=" Nhập họ tên" class="form-control"
                                            id="hoten" onblur="ktraHoTen()">
                                        <span class="ktra" id="er1"></span>
                                    </td>

                                </tr>

                                <tr>
                                    <td>Số điện thoại</td>
                                    <td>

                                        <input type="text" onblur="ktraSDT()" name="phone"
                                            placeholder=" Nhập số điện thoại" class="form-control" id="sodienthoai">
                                        <span class="ktra" id="er2"></span>
                                    </td>
                                </tr>



                                <tr>
                                    <td>Email</td>
                                    <td>
                                        <input type="text" name="email" placeholder=" Nhập Email" class="form-control"
                                            id="email" onblur="ktraEmail()">
                                        <span class="ktra" id="er3"></span>
                                    </td>

                                </tr>

                                <tr>
                                    <td>Mật khẩu</td>
                                    <td>
                                        <input type="password" onblur="ktraMatKhau()" name="password"
                                            placeholder=" Mật khẩu từ 8 đến 16 ký tự" class="form-control" id="matkhau">
                                        <span class="ktra" id="er4"></span>
                                    </td>

                                </tr>

                                <tr>
                                    <td>Xác nhận mật khẩu</td>
                                    <td>
                                        <input type="password" onblur="xacnhanMatKhau()" name="re_password"
                                            placeholder=" Nhập lại mật khẩu" class="form-control " id="xacnhanmatkhau">
                                        <span class="ktra" id="er5"></span>
                                    </td>

                                </tr>

                                <tr>
                                    <td>Giới tính</td>
                                    <td>
                                        <div class="form-check-inline">
                                            <label class="form-check-label" for="radio1">
                                                <input type="radio" class="form-check-input" id="radio1" name="gender"
                                                    value="Nam" checked>Nam
                                            </label>
                                        </div>
                                        <div class="form-check-inline">
                                            <label class="form-check-label" for="radio2">
                                                <input type="radio" class="form-check-input" id="radio2" name="gender"
                                                    value="Nữ">Nữ
                                            </label>
                                        </div>

                                    </td>

                                </tr>

                                <tr>
                                    <td>Ngày Sinh</td>
                                    <td> <input type="date" id="ngaysinh" name="birth"
                                            class="form-control">
                                        <span class="ktra" id="er6"></span>

                                    </td>

                                </tr>

                            </table>
                            <br>
                            <input type="checkbox" name="checkbox" id="">
                            <span>Nhận các thông tin và chương
                                trình khuyến mãi của shop
                                qua Email</span>
                            <br>


                            <button type="submit" class="btn btn-warning btn_submit" data-toggle="modal" data-target=""
                                id="dangky">
                                Tạo tài khoản</button>

                        </form>
                        <br>
                        <p>Khi bạn nhấn Đăng ký, bạn đã đồng ý thực hiện mọi giao dịch mua bán theo <a href="#"><b>điều
                                    kiện sử dụng
                                    và chính sách của TLU_Shop.</b></a></p>



                    </div>

                    <div class="container">
                        <br>
                    </div>
                    </form>
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