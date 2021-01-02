@extends('master.master_product')
@section('noiDung')
	<div class="my-4">
            <div class="container bg-white">
                <div class="row">
                    <div class="col-xs-4 col-sm-4 com-md-4 col-lg-4 col-xl-4 my-5">
                        <div id="demo" class="carousel slide " data-ride="carousel">
                            <ul class="carousel-indicators">
                                <li data-target="#demo" data-slide-to="0" class="active li_demo"></li>
                                <li data-target="#demo" data-slide-to="1" class="li_demo">
                                </li>
                                <li data-target="#demo" data-slide-to="2" class="li_demo" li>
                                <li data-target="#demo" data-slide-to="3" class="li_demo">
                                </li>

                            </ul>
                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                    <img src="{{asset('').'/'.explode('||',$product->image)[0]}}" alt="$product->name">
                                    <div class="carousel-caption">
                                    </div>
                                </div>
                                <div class="carousel-item">
                                    <img src="{{asset('').'/'.explode('||',$product->image)[1]}}" alt="$product->name">
                                    <div class="carousel-caption">
                                    </div>
                                </div>
                                <div class="carousel-item">
                                    <img src="{{asset('').'/'.explode('||',$product->image)[2]}}" alt="$product->name">
                                    <div class="carousel-caption">
                                    </div>
                                </div>
                                <div class="carousel-item">
                                    <img src="{{asset('').'/'.explode('||',$product->image)[3]}}" alt="$product->name">
                                    <div class="carousel-caption">
                                    </div>
                                </div>


                            </div>
                            <a class="carousel-control-prev" href="#demo" data-slide="prev">
                                <span class="carousel-control-prev-icon"></span>
                            </a>
                            <a class="carousel-control-next" href="#demo" data-slide="next">
                                <span class="carousel-control-next-icon"></span>
                            </a>
                        </div>
                    </div>





                    <div class="col-xs-8 col-sm-8 com-md-8 col-lg-8 col-xl-8">
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 com-md-12 col-lg-12 col-xl-12">
                                <h3>{{$product->name}}</h3>
                                <p>Mã SP: {{$product->id}}</p>
                                <b>Thương hiệu: {{$type->name}} </b> <small class="text-muted">&#9733; &#9733;
                                    &#9733; &#9733; &#9734;</small>
                                <b> 1 Đánh giá </b>
                            </div>
                        </div>
                        <hr>
                        <div class="row row__flex">
                            <div class="col-xs-7 col-sm-7 com-md-7 col-lg-7 col-xl-7">
                                @if($product->promotion_price<$product->unit_price)
                                    <p class="GT">Giá thường:{{$product->unit_price}}</p>
                                    <p>Giá khuyến mãi: <b>{{$product->promotion_price}}</b></p>
                                    @else
                                    <p>Giá: <b>{{$product->promotion_price}}</b></p>
                                    @endif
                                <div class="container">

                                    <ul class="list-group">
                                        <li class="list-group-item list-group-item-info">KHUYẾN MÃI, ƯU ĐÃI</li>
                                        <li class="list-group-item list-group-item-light">
                                            <ul>
                                                <li class="li_gr_it">1 Balo</li>
                                                <li class="li_gr_it">1 Chuột không dây chính hãng</li>
                                                <li class="li_gr_it">1 Lót chuột razer
                                                <li class="li_gr_it">Cài đặt phần mềm diệt virut trọn đời</li>
                                        </li>
                                    </ul>
                                    </li>
                                    </ul>
                                </div>
                                <div class="cauhinh">
                                    <div class="row">
                                        <div class="col-xs-4 col-sm-4 com-md-4 col-lg-4 col-xl-4">
                                            <form>
                                                <span>RAM</span>
                                                <select class="custom-select">
                                                    <option value=>{{$product->ram}}</option>
                                                </select>
                                            </form>
                                        </div>
                                        <div class="col-xs-4 col-sm-4 com-md-4 col-lg-4 col-xl-4">
                                            <form>
                                                <span>Screen</span>
                                                <select class="custom-select">
                                                    <option value="volvo">{{$product->display}}</option>
                                                </select>
                                            </form>
                                        </div>
                                        <div class="col-xs-4 col-sm-4 com-md-4 col-lg-4 col-xl-4">
                                            <form>
                                                <span>Ổ SSD</span>
                                                <select class="custom-select">
                                                    <option value="volvo">{{$product->hard_disk}}</option>
                                                </select>
                                            </form>
                                        </div>
                                    </div>

                                    <br>
                                    <div class="row">

                                        <div class="col-xs-6 col-sm-6 com-md-6 col-lg-6 col-xl-6">
                                            <button class="btn btn-danger">
                                                <span>ĐẶT MUA NGAY</span>
                                                <p>Giao hàng nhanh</p>
                                            </button>
                                        </div>

                                        <div class="col-xs-6 col-sm-6 com-md-6 col-lg-6 col-xl-6">
                                            <button class="btn btn-primary">
                                                <span>MUA TRẢ GÓP 0% </span>
                                                <p>Xét duyệt nhanh</p>
                                            </button>
                                        </div>

                                    </div>


                                    <div class="row" id="re">
                                        <div class="container">
                                            <button type="button" class="btn btn-success">MUA TRẢ GÓP
                                                ONLINE <p>Qua thẻ VISA, MASTER, JCB</p>
                                            </button>
                                        </div>

                                    </div>


                                </div>


                            </div>

                            <div class="col-xs-5 col-sm-5 com-md-5 col-lg-5 col-xl-5 table">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <td> <img class="chinhanh" src="mockup/images/chitietsanpham/box@2x.png" alt="">
                                                <span>Trọn bộ gồm có: sạc</span>
                                            </td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td> <img class="chinhanh" src="mockup/images/chitietsanpham/bao-hanh@2x.png"
                                                    alt="">
                                                <span>Bảo hành 24 tháng </span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><img class="chinhanh" src="mockup/images/chitietsanpham/doi-tra@2x.png"
                                                    alt="">
                                                <span>1 đổi 1 trong 15 ngày nếu lỗi do NSX</span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><img class="chinhanh" src="mockup/images/chitietsanpham/tel@2x.png" alt="">
                                                <span>Liên hệ CSKH 19008948</span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><img class="chinhanh" src="mockup/images/chitietsanpham/email@2x.png" alt="">
                                                <span>Email: nguyenlong3172000@gmail.com</span>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>

                                <br>

                                <div class="col-xs-12 col-sm-12 com-md-12 col-lg-12 col-xl-12 co-12">

                                    <P>Bạn cần chúng tôi gọi lại TƯ VẤN</P>
                                    <div class="container">
                                        <form action="/action_page.php">
                                            <div class="form-group">
                                                <input type="text" class="form-control" id="usr" name="username"
                                                    placeholder="Nhập số điện thoại của Anh/Chị">
                                            </div>
                                        </form>
                                        <div>

                                            <button type="button" class="btn btn-warning hotline">
                                                <p class="p1">
                                                    HÃY GỌI CHO LẠI CHO TÔI
                                                    !!! </p>
                                                <P class="p2">Tôi đang rất
                                                    quan tâm sản phẩm này</P>
                                            </button>

                                        </div>
                                    </div>


                                </div>



                            </div>
                        </div>

                    </div>

                </div>


                <!-- chi tiết -->
            </div>

        </div>




        <div class="container">
            <div class="row my-3 bg-white review">
                <div class="col-xs-8 col-sm-8 com-md-8 col-lg-8 col-xl-8">
                    <br>
                    {{$product->description}}
                </div>
                <div class="col-xs-4 col-sm-4 com-md-4 col-lg-4 col-xl-4 bg-light">
                    <div class="bg-white">
                        <div class="container">
                            <H5 class="h5">Thông số kỹ thuật</H5>
                            <table class="table2">
                                <tr>
                                    <td class="c1">-CPU:</td>
                                    <td class="c2">{{$product->cpu}}
                                    </td>
                                <tr>
                                    <td class="c1">-RAM</td>
                                    <td class="c2">{{$product->ram}}</td>
                                </tr>
                                <tr>
                                    <td class="c1">-Ổ cứng:</td>
                                    <td class="c2">{{$product->hard_disk}}</td>
                                </tr>
                                <tr>
                                    <td class="c1">-Màn hình:</td>
                                    <td class="c2">{{$product->display}}</td>
                                </tr>
                                <tr>
                                    <td class="c1">-Kết nối:</td>
                                    <td class="c2">{{$product->connect}}</td>
                                </tr>
                                <tr>
                                    <td class="c1">-Pin :</td>
                                    <td class="c2">{{$product->pin}}</td>
                                </tr>
                                <tr>
                                    <td class="c1">-Trọng lượng:</td>
                                    <td class="c2">{{$product->weight}}</td>
                                </tr>
                                <tr>
                                    <td class=" c1">-Kích thước:</td>
                                    <td class="c2">{{$product->size}}</td>
                                </tr>
                            </table>
                        </div>

                    </div>
                </div>


            </div>

        </div>
@endsection