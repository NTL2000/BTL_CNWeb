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
                    <h3>Laptop được ưa chuộng <a href="DanhSach.html">Xem tất cả</a></h3>

                    <div class="row">
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
                                        <button class="add__cart"><span class="add__cart-i"><i
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
                        <a href="DanhSach.html">Xem tất cả</a>

                    </h3>

                    <div class="row">

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
                                        <button class="add__cart"><span class="add__cart-i"><i
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
                        <a href="DanhSach.html">Xem tất cả</a>

                    </h3>

                    <div class="row">

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
                                        <button class="add__cart"><span class="add__cart-i"><i
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
            @if(Session::has('create_acc_access'))
                <script>
                    alert("Tạo tài khoản thành công")
                </script>
                {{Session::forget('create_acc_access')}}
            @endif
@endsection