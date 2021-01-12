@extends('master.master_cart')
@section('noiDung')
<div class="content my-4 bg-white">
            <div class="container">
                <!-- Chi tiet san pham-->
                <div class="row">
                    <div class="col-lg-12">
                        @foreach($cart->items as $product)
                        <div class="row moihangchitiet">
                            <div class="col-lg-2">
                                <img class="img_gh" src="{{asset('').'/'.explode('||',$product['item']['image'])[0]}}" alt="{{$product['item']['name']}}">
                            </div>
                            <div class="col-sx-5 col-sm-5 col-md-5  col-lg-5">
                                <a href="{{route('san-pham',$product['item']['id'])}}">{{$product['item']['name']}}</a>
                                <br>
                                <p>{{'Màn hinh: '.$product['item']['display'].',Ram: '.$product['item']['ram'].',Ô cứng: '.$product['item']['hard_disk']}}</p>
                            </div>
                            <div class="col-sx-2 col-sm-2 col-md-2  col-lg-2">
                                <p class="tien">{{$product['item']['promotion_price']}}</p>
                            </div>
                            <div class="col-sx-3 col-sm-3 col-md-3  col-lg-3 nut">
                                <button class="tru1" name="{{$product['item']['id']}}">-</button><input class="soluong" type="text" value="{{$product['qty']}}" readonly="readonly"><button  class="cong1" name="{{$product['item']['id']}}">+</button>
                                <button class="delete_page_cart" name="{{$product['item']['id']}}"><i class="far fa-trash-alt"></i>Xóa</button>
                            </div>
                        </div>
                        @endforeach


                    </div>
                </div>
                <!-- Chi tiet san pham-->

                <!-- Tổng tiền thanh toán-->
                <div class="row tinhtien">
                    <div>
                        <table>
                            <tr>
                                <th>Tổng tiền sản phẩm: </th>
                                <td id="tongTienSanPham"></td>
                            </tr>

                            <tr>
                                <th>Phí vận chuyển: </th>
                                <td>50.000 đ</td>
                            </tr>

                            <tr class="trthanhtien">
                                <th>Tổng tiền: </th>
                                <td id="othanhtien"></td>

                            </tr>
                        </table>

                    </div>

                    <br>

                </div>
                <!-- Tổng tiền thanh toán-->

                <!-- Thông tin cá nhân-->
                <div class="row thongtincanhan">
                    <form action="{{route('ghi-gio-hang')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <table>
                            <tr>
                                <td> <span>*</span> Họ tên người nhận: </td>
                                <td>
                                    <input class="form-control" type="text" name="name" id="name" placeholder="Họ tên" required>
                                    <span class="checker"></span>
                                </td>
                            </tr>

                            <tr>
                                <td><span>*</span> Số điện thoại: </td>
                                <td>
                                    <input class="form-control" type="tel" name="phone" id="phone" placeholder="Số điện thoại" required>
                                    <span class="checker"></span>
                                </td>

                            </tr>
                            <tr>
                                <td><span>*</span> Địa chỉ giao hàng: </td>
                                <td>
                                    <input id="address" class="form-control" name="address" type="text" placeholder="Số nhà, tên đường, phường xã, quận huyện, tỉnh thành phố" required>
                                    <span class="checker"></span>
                                </td>
                            </tr>

                            <tr>
                                <td>Ghi chú: </td>
                                <td>
                                    <input id="note" class="form-control" name="note" type="text" placeholder="Nhắn gởi tới người bán" required>
                                </td>

                            </tr>

                        </table>




                </div>

                <!-- Thông tin cá nhân-->

                <!--Nút đặt hàng-->
                <div class="nutdathang">
                    <button class="btn btn-warning btn-lg" id="submit_cart" type="submit">ĐẶT HÀNG ONLINE</button>
                    <button class="btn btn-success btn-lg">Mua Trả Góp Thẻ VISA/Master/JCB</button>
                </div>

                </form>
                <!-- Nút đặt hàng-->

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
            //update price
            function capNhatTien() {
                var tien = $('.tien');
                var soluong = $('.soluong');
                var tongTien = 0;
                for (var i = 0; i < tien.length; i++) {
                    tongTien += parseFloat(tien[i].innerHTML) * parseInt(soluong[i].value);
                }
                var tongTienSanPham = $('#tongTienSanPham');
                tongTienSanPham.innerHTML = tongTien + " đ";
                var tongTienThanhToan = tongTien + 50000;
                $('#othanhtien').html(tongTienThanhToan);
                $('#othanhtien').formatCurrency({symbol: ''});
                $('.tien').formatCurrency({symbol: ''});
            }
            capNhatTien()
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
                    //update cart page
                    $.ajax({
                    url: "page_cart_get",
                    method: "get",
                    success: function (data) {
                        $('.col-lg-12').html(data);
                        $.ajax({
                        url: "add_cart_get",
                        method: "get",
                        success: function (data) {
                            $('.cart__product').html(data);
                            var count = 0;
                            $(".cart__product-item").each(function () {
                                count += parseInt($(this).find(".cart__quantity").html());
                            });
                            $("#lblCartCount").text(count);
                        },
                        });
                        capNhatTien();
                        $('#othanhtien').formatCurrency({symbol: ''});
                    },
                    });
                },
                });

                if($('.moihangchitiet').length==1)
                {
                    setTimeout(function () {
                        let url = "{{route('trang-chu')}}";
                        document.location.href=url;
                    }, 200);
                }
            });
            //increase cart
            $("body").on("click",".cong1", function(event){
                event.preventDefault();
                var id=parseInt($(this).attr('name').trim());
                $.ajax({
                url: "increase_cart",
                method: "post",
                data: {
                    'id': id,
                },
                success: function (data) {
                    $.ajax({
                    url: "page_cart_get",
                    method: "get",
                    success: function (data) {
                        $('.col-lg-12').html(data);
                        $.ajax({
                        url: "add_cart_get",
                        method: "get",
                        success: function (data) {
                            $('.cart__product').html(data);
                            var count = 0;
                            $(".cart__product-item").each(function () {
                                count += parseInt($(this).find(".cart__quantity").html());
                            });
                            $("#lblCartCount").text(count);
                        },
                        });
                        capNhatTien();
                    },
                    });
                },
                });
            });
            //reduction cart
            $("body").on("click",".tru1", function(event){
                if(parseInt($(this).next().val())>1)
                {
                    event.preventDefault();
                    var id=parseInt($(this).attr('name').trim());
                    $.ajax({
                    url: "reduction_cart",
                    method: "post",
                    data: {
                        'id': id,
                    },
                    success: function (data) {
                        $.ajax({
                        url: "page_cart_get",
                        method: "get",
                        success: function (data) {
                            $('.col-lg-12').html(data);
                            $.ajax({
                            url: "add_cart_get",
                            method: "get",
                            success: function (data) {
                                $('.cart__product').html(data);
                                var count = 0;
                                $(".cart__product-item").each(function () {
                                    count += parseInt($(this).find(".cart__quantity").html());
                                });
                                //fix bug fast reduction
                                if(count==0)
                                {
                                    let url = "{{route('trang-chu')}}";
                                    document.location.href=url;
                                }
                                //end fix
                                $("#lblCartCount").text(count);
                            },
                            });
                            capNhatTien();

                        },
                        });
                    },
                    });
                }
                
                
            });
            //remove page_cart_built_in
            $('body').on('click', '.delete_page_cart', function (){
                var id=parseInt($(this).attr('name').trim());
                var url="{{asset('').'remove_cart/'}}"+id;
                $.ajax({
                url: url,
                method: "get",
                success: function (data) {
                    $.ajax({
                        url: "page_cart_get",
                        method: "get",
                        success: function (data) {
                            $('.col-lg-12').html(data);
                            $.ajax({
                            url: "add_cart_get",
                            method: "get",
                            success: function (data) {
                                $('.cart__product').html(data);
                                var count = 0;
                                $(".cart__product-item").each(function () {
                                    count += parseInt($(this).find(".cart__quantity").html());
                                });
                                $("#lblCartCount").text(count);
                            },
                            });
                            capNhatTien();
                        },
                        });
                },
                });
                if($('.moihangchitiet').length==1)
                {
                    setTimeout(function () {
                        let url = "{{route('trang-chu')}}";
                        document.location.href=url;
                    }, 200);
                }
                
            });
            //submit cart
            function checkname(){
                var name=$('#name').val();
                var regexName = /^[a-zA-Z]./;
                if(regexName.test(name)==false){
                    $('#name').next().html("(*) Vui lòng nhập lại tên");
                    return false;
                }else{
                    $('#name').next().html("");
                    return true;
                }
            }
            function checkphone(){
                var phone = $('#phone').val();
                var regexPhone = /^[0-9]{8,}$/;
                if(regexPhone.test(phone)==false){
                    $('#phone').next().html("(*) Vui lòng nhập lại số điện thoại");
                    return false;
                }else{
                    $('#phone').next().html("");
                    return true;
                }
            }
            function checkaddress(){
                var address=$('#address').val();
                var regexCity = /^[a-zA-Z]./;
                if(regexCity.test(address)==false){
                    $('#address').next().html("(*) Vui lòng nhập lại địa chỉ");
                    return false;
                }else{
                    $('#address').next().html("");
                    return true;
                }
            }
            $('#address').blur(function(){
                checkaddress()
            });
            $('#phone').blur(function(){
                checkphone()
            });
            $('#name').blur(function(){
                checkname()
            });


        });
    </script>
@endsection