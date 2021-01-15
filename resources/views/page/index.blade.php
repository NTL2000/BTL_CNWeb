@extends('master.master_index')
@section('noiDung')
    <div class="content">
            <!-- dong 1 san pham-->
            <div class="container bg-white ">
                <div class="col-lg-12 divsanpham ">
                    <div class="row" id="row__menu">
                        <ul class="menu">
                            <div class="menu__tab">
                                @php
                                    $count=0;
                                @endphp
                                @foreach($typeProduct as $type)
                                @php
                                    $count++;
                                @endphp
                                <div class="tab__item" id="{{$count}}">
                                    <a href="{{route('danh-sach-sp',$type->id)}}" class="tab__item-link"><i class="fas fa-laptop"></i>{{$type->name}}</a>
                                    <i class="fas fa-angle-right"></i>
                                </div>
                                @endforeach

                            </div>
                            @php
                                $count=0;
                            @endphp
                            @foreach($producwithtype as $pwt)
                            @php
                                $count++;
                            @endphp
                            <div class="tab__content" id="{{'c'.$count}}">
                                <ul class="right__container">
                                    @foreach($pwt as $p)
                                    <li class="right__item"><a href="{{route('san-pham',$p->id)}}">{{$p->name}}</a></li>
                                    @endforeach
                                </ul>
                            </div>
                            @endforeach
                        </ul>
                        <!-- <div class="menu">
                            <div class="tab">
                                <button class="tablinks">London</button>
                                <button class="tablinks">Paris</button>
                                <button class="tablinks">Tokyo</button>
                            </div>
        
                            <div class="tabcontent">
                                <h3>London</h3>
                                <p>London is the capital city of England.</p>
                            </div>
        
                            <div class="tabcontent">
                                <h3>Paris</h3>
                                <p>Paris is the capital of France.</p>
                            </div>
        
                            <div class="tabcontent">
                                <h3>Tokyo</h3>
                                <p>Tokyo is the capital of Japan.</p>
                            </div>
    
                        </div> -->
                        <div class="col-lg-7">
                            <div id="carouselExampleIndicators" class="carousel slide my-4" data-ride="carousel">
                                <ol class="carousel-indicators">
                                    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                                    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                                    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                                </ol>

                                <div class="carousel-inner" role="listbox" id="slide">
                                    <div class="carousel-item active">
                                        <img class="d-block img-fluid" src="{{$carousel_active->image}}" alt="{{$carousel_active->name_slide}}">
                                    </div>
                                    @foreach($carousel as $c)
                                    <div class="carousel-item">
                                        <img class="d-block img-fluid" src="{{$c->image}}" alt="{{$c->name_slide}}">
                                    </div>
                                    @endforeach
                                </div>

                                <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button"
                                    data-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                </a>

                                <a class="carousel-control-next" href="#carouselExampleIndicators" role="button"
                                    data-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                </a>

                            </div>


                            <!-- /.row -->

                        </div>
                        <!-- /.col-lg-9 -->


                        <div class="col-lg-3" id="hinhbanner">
                            @foreach($banner as $b)
                            <img src="{{$b->image}}" alt="{{$b->name_slide}}">
                            @endforeach
                        </div>

                    </div>
                    <h3>Laptop được ưa chuộng <a href="#" onclick="return false;" class="view_all1">Xem tất cả</a></h3>

                    <div class="row row1">
                        @foreach($productTop as $top)
                        <!-- San pham được ưa chuộng -->
                        <div class="col-lg-3 col-md-6 mb-3">
                            <div class="card h-100">
                                <a href="{{route('san-pham',$top->id)}}"><img class="card-img-top" src="{{explode('||',$top->image)[0]}}"
                                        alt=""></a>
                                <div class="card-body  ">
                                    <h6 class="card-title">
                                        <a href="{{route('san-pham',$top->id)}}">{{$top->name}}</a>
                                    </h6>
                                    @if($top->promotion_price<$top->unit_price)
                                    <div class="cartGG">
                                        {{$top->unit_price}}
                                    </div>
                                    <div class="cardGia">
                                        {{$top->promotion_price}}
                                    </div>
                                    @else
                                    <div class="cardGia">
                                        {{$top->promotion_price}}
                                    </div>
                                    @endif
                                    <div class="row">
                                        <button class="add__cart" name="{{$top->id}}"><span class="add__cart-i"><i
                                                    class="fa fa-shopping-cart"></i> Thêm vào giỏ</span></button>
                                    </div>
                                    <div class="row">
                                        <div class="container">
                                            <div class="cauhinh">
                                                <i class="fas fa-desktop"></i>
                                                <p>{{$top->cart_graphic}}</p>
                                                <i class="far fa-hdd"></i>
                                                <p>{{$top->hard_disk}}</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="container">
                                            <div class="cauhinh">
                                                <i class="fas fa-memory"></i>
                                                <p>{{$top->ram}}</p>
                                                <i class="fas fa-weight-hanging"></i>
                                                <p>{{$top->weight}}</p>
                                                <i class="fab fa-creative-commons-sampling-plus"></i>
                                                <p>{{$top->cpu}}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end sp được ưa chuộng -->
                        @endforeach

                    </div>


                </div>



            </div>

            <!-- End dòng 1 sản phẩm -->

            <!--Dòng 2 hình ảnh-->

            <div class="container my-2 dong2hinhanh bg-white ">
                <div class="row">
                    <div class="col-lg-6">
                        <img src="mockup/images/home/giamtoiben.jfif" alt="">
                    </div>

                    <div class="col-lg-6">
                        <img src="mockup/images/home/hinhbu.png" alt="">
                    </div>




                </div>
            </div>

            <!-- End dòng 2 hình ảnh -->

            <!-- Dòng 3 sản phẩm-->

            <div class="container bg-white">

                <div class="col-lg-12 divsanpham">
                    <h3>Laptop Khuyến Mãi
                        <a href="#" onclick="return false;" class="view_all2">Xem tất cả</a>

                    </h3>

                    <div class="row row2">

                        <!-- San pham khuyen mai-->
                        @foreach($saleProduct as $sp)
                        <div class="col-lg-3 col-md-6 mb-3">
                            <div class="card h-100">
                                <a href="{{route('san-pham',$sp->id)}}"><img class="card-img-top" src="{{explode('||',$sp->image)[0]}}" alt="{{$sp->name}}"></a>
                                <div class="card-body chitiet5">
                                    <h6 class="card-title">
                                        <a href="{{route('san-pham',$sp->id)}}">{{$sp->name}}</a>
                                    </h6>
                                    <div class="cartGG">
                                        {{$sp->unit_price}}
                                    </div>
                                    <div class="cardGia">
                                        {{$sp->promotion_price}}
                                    </div>
                                    <div class="row">
                                        <button class="add__cart" name="{{$sp->id}}"><span class="add__cart-i"><i
                                                    class="fa fa-shopping-cart"></i> Thêm vào giỏ</span></button>
                                    </div>
                                    <div class="row">
                                        <div class="container">
                                            <div class="cauhinh">
                                                <i class="fas fa-desktop"></i>
                                                <p>{{$sp->cart_graphic}}</p>
                                                <i class="far fa-hdd"></i>
                                                <p>{{$sp->hard_disk}}</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="container">
                                            <div class="cauhinh">
                                                <i class="fas fa-memory"></i>
                                                <p>{{$sp->ram}}</p>
                                                <i class="fas fa-weight-hanging"></i>
                                                <p>{{$sp->weight.'KG'}}</p>
                                                <i class="fab fa-creative-commons-sampling-plus"></i>
                                                <p>{{$sp->cpu}}</p>
                                            </div>
                                        </div>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>

                    <a href=""></a>
                </div>
            </div>

            <!-- End dòng 3 sản phẩm -->

            <!-- Dòng 4 hình ảnh -->

            <div class="container dong3hinhanh my-2 bg-white">
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                        <img src="mockup/images/home/hinhbu.jfif" alt="">

                    </div>

                </div>

            </div>
            <!-- End Dòng 4 hình ảnh-->


            <!-- Dòng 5 sản phẩm-->
            <div class="container bg-white">

                <div class="col-lg-12 divsanpham">
                    <h3>Laptop Phổ Biến
                        <a href="#" onclick="return false;" class="view_all3">Xem tất cả</a>

                    </h3>

                    <div class="row row3">

                        <!-- San pham phổ biến-->
                        @foreach($productPopolar as $pp)
                        <div class="col-lg-3 col-md-6 mb-3">
                            <div class="card h-100">
                                <a href="{{route('san-pham',$pp->id)}}"><img class="card-img-top" src="{{explode('||',$pp->image)[0]}}" alt="{{$pp->name}}"></a>
                                <div class="card-body  ">
                                    <h6 class="card-title">
                                        <a href="{{route('san-pham',$pp->id)}}">{{$pp->name}}</a>
                                    </h6>
                                    @if($pp->promotion_price<$pp->unit_price)
                                    <div class="cartGG">
                                        {{$pp->unit_price}}
                                    </div>
                                    <div class="cardGia">
                                        {{$pp->promotion_price}}
                                    </div>
                                    @else
                                    <div class="cardGia">
                                        {{$pp->promotion_price}}
                                    </div>
                                    @endif
                                    <div class="row">
                                        <button class="add__cart" name="{{$pp->id}}"><span class="add__cart-i"><i
                                                    class="fa fa-shopping-cart"></i> Thêm vào giỏ</span></button>
                                    </div>
                                    <div class="row">
                                        <div class="container">
                                            <div class="cauhinh">
                                                <i class="fas fa-desktop"></i>
                                                <p>{{$pp->cart_graphic}}</p>
                                                <i class="far fa-hdd"></i>
                                                <p>{{$pp->hard_disk}}</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="container">
                                            <div class="cauhinh">
                                                <i class="fas fa-memory"></i>
                                                <p>{{$pp->ram}}</p>
                                                <i class="fas fa-weight-hanging"></i>
                                                <p>{{$pp->weight}}</p>
                                                <i class="fab fa-creative-commons-sampling-plus"></i>
                                                <p>{{$pp->cpu}}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end sp phổ biến -->
                        @endforeach
                    </div>
                </div>
            </div>

            <!-- End dòng 5 sản phẩm-->



            <div class="container bg-white dongcuoi my-3">
                <div class="row">
                    <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                        <img src="mockup/images/home/cuoi1.jpg" alt="">
                    </div>

                    <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                        <img src="mockup/images/home/cuoi2.jpg" alt="">
                    </div>

                    <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4 lg-4-end">
                        <img src="mockup/images/home/cuoi3.png" alt="">
                    </div>

                </div>
            </div>
@endsection
@section('scripts')
    <script type="text/javascript">
        document.addEventListener("DOMContentLoaded", function (){
            //sweet alert 
            $(document).ready(function(){
                @if(Session::has('checkout'))
                    swal("Check out success!", "Bạn đã đặt hàng thành công", "success")
                    {{Session::forget('checkout')}}
                @endif
                @if(Session::has('create_acc_access'))
                    swal("creat account success!", "Bạn đã tạo tài khoản thành công", "success")
                    {{Session::forget('create_acc_access')}}
                @endif
            });
            $.ajaxSetup({
              headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              }
            });
            //click add
            $('body').on('click',".add__cart",function(){
                var id=parseInt($(this).attr('name').trim());
                $.ajax({
                url: "add_cart_post",
                method: "post",
                data: {
                    'id': id,
                },
                success: function (data) {
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
                },
                });
                
            });
            //remove cart
            $('.cart__product').on('click', '.cpi__right', function (){
                var id=parseInt($(this).closest('.cart__product-item').attr('name').trim());
                $.ajax({
                url: "remove_cart/"+id,
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
            //view all
            //top
            $('body').on('click','.view_all1',function(){
                if($('.view_all1').html()=="Xem tất cả")
                {
                    $.ajax({
                    url: "view_all1",
                    method: "get",
                    success: function (data) {
                        $('.row1').html(data);
                        $('.view_all1').html("Thu gọn");
                        $('.cardGia').formatCurrency({symbol: ''});
                        $('.cartGG').formatCurrency({symbol: ''});
                    },
                    });

                }
                if($('.view_all1').html()=="Thu gọn"){
                    $.ajax({
                    url: "re_view_all1",
                    method: "get",
                    success: function (data1) {
                        $('.row1').html(data1);
                        $('.view_all1').html("Xem tất cả");
                        $('.cardGia').formatCurrency({symbol: ''});
                        $('.cartGG').formatCurrency({symbol: ''});
                    },
                    });
                }
            })
            //sale
            $('body').on('click','.view_all2',function(){
                if($('.view_all2').html()=="Xem tất cả")
                {
                    $.ajax({
                    url: "view_all2",
                    method: "get",
                    success: function (data) {
                        $('.row2').html(data);
                        $('.view_all2').html("Thu gọn");
                        $('.cardGia').formatCurrency({symbol: ''});
                        $('.cartGG').formatCurrency({symbol: ''});
                    },
                    });

                }
                if($('.view_all2').html()=="Thu gọn"){
                    $.ajax({
                    url: "re_view_all2",
                    method: "get",
                    success: function (data1) {
                        $('.row2').html(data1);
                        $('.view_all2').html("Xem tất cả");
                        $('.cardGia').formatCurrency({symbol: ''});
                        $('.cartGG').formatCurrency({symbol: ''});
                    },
                    });
                }
            })
            //popular
            $('body').on('click','.view_all3',function(){
                if($('.view_all3').html()=="Xem tất cả")
                {
                    $.ajax({
                    url: "view_all3",
                    method: "get",
                    success: function (data) {
                        $('.row3').html(data);
                        $('.view_all3').html("Thu gọn");
                        $('.cardGia').formatCurrency({symbol: ''});
                        $('.cartGG').formatCurrency({symbol: ''});

                    },
                    });

                }
                if($('.view_all3').html()=="Thu gọn"){
                    $.ajax({
                    url: "re_view_all3",
                    method: "get",
                    success: function (data1) {
                        $('.row3').html(data1);
                        $('.view_all3').html("Xem tất cả");
                        $('.cardGia').formatCurrency({symbol: ''});
                        $('.cartGG').formatCurrency({symbol: ''});
                    },
                    });
                }
            })
        });
    </script>
@endsection
