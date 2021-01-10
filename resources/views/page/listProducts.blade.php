@extends('master.master_listProducts')
@section('noiDung')
	<div class="container container__body">
            <div class="row">
                <div class="my-4 col-lg-3">
                    <div id="boloc" class=" bg-white">
                        <form>
                            <button id="nutloc" class="btn btn-danger"><i class="fas fa-filter"></i> Lọc</button>
                        </form>
                        <h3>Bộ Lọc</h3>
                        <hr>
                        <!-- Bộ lọc-->
                        <div>
                            <div id="accordion">
                                <div class="card">
                                    <div class="card-header">
                                        <a class="card-link" data-toggle="collapse" href="#collapseOne">
                                            <span>Hãng sản xuất</span> <i class="fas fa-plus congtru"></i>
                                        </a>
                                    </div>
                                    <div id="collapseOne" class="collapse show" data-parent="#accordion">
                                        <div class="card-body">
                                            <form>
                                                <input type="text" class="form-control" placeholder="Tìm thương hiệu">
                                                <br>
                                                <input type="checkbox"> <label for="">Dell</label>
                                                <br>
                                                <input type="checkbox"> <label for="">Asus</label>
                                                <br>
                                                <input type="checkbox"> <label for="">Apple</label>
                                                <br>
                                                <input type="checkbox"> <label for="">Lenovo</label>
                                                <br>
                                                <input type="checkbox"> <label for="">HP</label>
                                                <br>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-header">
                                        <a class="collapsed card-link" data-toggle="collapse" href="#collapseTwo">
                                            <span>Mức giá</span> <i class="fas fa-plus congtru"></i>
                                        </a>
                                    </div>
                                    <div id="collapseTwo" class="collapse" data-parent="#accordion">
                                        <div class="card-body">
                                            <form>
                                                <input type="checkbox" id="tatca"> <label for="tatca"> Tất cả</label>
                                                <br>
                                                <input type="checkbox" id="gia1"> <label for="gia1"> Dưới 5
                                                    triệu</label>
                                                <br>
                                                <input type="checkbox" id="gia2"> <label for="gia2">Từ 5 - 10
                                                    triệu</label>
                                                <br>
                                                <input type="checkbox" id="gia3"> <label for="gia3">Từ 10 - 15
                                                    triêu</label>
                                                <br>
                                                <input type="checkbox" id="gia4"> <label for="gia4">Từ 15 - 20
                                                    triệu</label>
                                                <br>
                                                <input type="checkbox" id="gia5"> <label for="gia5">Trên 20
                                                    triệu</label>
                                                <br>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-header">
                                        <a class="collapsed card-link" data-toggle="collapse" href="#collapseThree">
                                            <span>Màn hình</span> <i class="fas fa-plus congtru"></i>
                                        </a>
                                    </div>
                                    <div id="collapseThree" class="collapse" data-parent="#accordion">
                                        <div class="card-body">
                                            <form>
                                                <input type="checkbox" id="tatca1"> <label for="tatca1"> Tất cả</label>
                                                <br>
                                                <input type="checkbox" id="manhinh1"> <label for="manhinh1"> Khoảng 11
                                                    inchs</label>
                                                <br>
                                                <input type="checkbox" id="manhinh2"> <label for="manhinh2"> Khoảng 12
                                                    inchs</label>
                                                <br>
                                                <input type="checkbox" id="manhinh3"> <label for="manhinh3"> Khoảng 13
                                                    inchs</label>
                                                <br>
                                                <input type="checkbox" id="manhinh4"> <label for="manhinh4"> Khoảng 14
                                                    inchs</label>
                                                <br>
                                                <input type="checkbox" id="manhinh5"> <label for="manhinh5"> Khoảng 15
                                                    inchs</label>
                                                <br>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-header">
                                        <a class="collapsed card-link" data-toggle="collapse" href="#collapseFour">
                                            <span>Ram</span> <i class="fas fa-plus congtru"></i>
                                        </a>
                                    </div>
                                    <div id="collapseFour" class="collapse" data-parent="#accordion">
                                        <div class="card-body">
                                            <form>
                                                <input type="checkbox" id="tatca2"> <label for="tatca2"> Tất cả</label>
                                                <br>
                                                <input type="checkbox" id="ram1"> <label for="ram1"> 2 GB</label>
                                                <br>
                                                <input type="checkbox" id="ram2"> <label for="ram2"> 4 GB</label>
                                                <br>
                                                <input type="checkbox" id="ram3"> <label for="ram3"> 8 GB</label>
                                                <br>
                                                <input type="checkbox" id="ram4"> <label for="ram4"> 16 GB</label>
                                                <br>
                                                <input type="checkbox" id="ram5"> <label for="ram5"> 32</label>
                                                <br>

                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Bộ lọc-->
                    </div>
                </div>
                <!-- /.col-lg-3 -->
                <div class="col-lg-9 bg-white my-4">
                    <div class="tieudesanpham">
                        <div class="tren">
                            <p>{{$ty}} ({{count($typeProduct)}}+ sản phẩm)</p>
                        </div>
                    </div>

                    <div class="row my-4">
                        @foreach($typeProduct as $sp)
                        <!-- san pham 1-->
                        <div class="col-lg-4 col-md-6 mb-4">

                            <div class="card h-100 chiTietSanPham">

                                <a href="{{route('san-pham',$sp->id)}}"><img class="card-img-top chitiet1" src="{{asset('').'/'.explode('||',$sp->image)[0]}}"
                                        alt=""></a>

                                <div class="card-body chitiet1">

                                    <h6 class="card-title">
                                        <a href="{{route('san-pham',$sp->id)}}">{{$sp->name}}</a>
                                    </h6>
                                    @if($sp->promotion_price<$sp->unit_price)
                                    <div class="cartGG">
                                        {{$sp->unit_price}}
                                    </div>
                                    <div class="cardGia">
                                        {{$sp->promotion_price}}
                                    </div>
                                    @else
                                    <div class="cardGia">
                                        {{$sp->promotion_price}}
                                    </div>
                                    @endif
                                    <div class="row">
                                        <button class="add__cart" name={{$sp->id}}><span class="add__cart-i"><i
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
                                                <p>{{$sp->weight}}</p>
                                                <i class="fab fa-creative-commons-sampling-plus"></i>
                                                <p>{{$sp->cpu}}</p>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="container">
                                            <div class="cauhinh">
                                                <i class="fas fa-keyboard"></i>


                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- viet doan nay-->
                                <!-- <div class="carh h-100 moTaSanPham">
                                    <div class="container">

                                        <h5>Laptop Acer Nitro 5 2020 AN515-55-58A7 - Intel Core i5</h5>

                                        <h6>10.430.000 đ</h6>

                                        <b>Bảo hành</b>
                                        <p><i class="fas fa-check-square"></i> Bảo hành 12 thánh một đổi một trong vòng
                                            15 ngày <a href="#">Xem Chính Sách</a></p>
                                        <p><i class="fas fa-check-square"></i> Gía ở trên đã bao gồm VAT 10%</p>
                                        <p><i class="fas fa-check-square"></i> MIỄN PHÍ GIAO HÀNG toàn địa bàn hà nội
                                        </p>
                                        <p><b>Kho Hàng: </b>còn hàng</p>
                                        <hr>
                                        <p><b>Mô tả tóm tắt: </b>Máy trạm Dell bền bỉ, siêu mát. Cấu hình cao, thiết kế
                                            ổn. Mượt các phần mềm đồ họa 3D chuyên
                                            nghiệp</p>
                                    </div>
                                </div> -->
                                <!-- viet doan nay-->
                            </div>
                        </div>
                        <!-- end san pham 1-->
                        @endforeach
                    </div>
                    <!-- /.row -->
                    <!-- <ul class="pagination justify-content-center">
                        <li class="page-item"><a class="page-link" href="#">Trước</a></li>
                        <li class="page-item"><a class="page-link" href="#">1</a></li>
                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                        <li class="page-item"><a class="page-link" href="#">Sau</a></li>
                    </ul> -->
                </div>
                <!-- /.col-lg-9 -->
            </div>
            <!-- /.row -->
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
            //click add
            $(".add__cart").click(function(){
                var id=parseInt($(this).attr('name'));
                $.ajax({
                url: "{{asset('').'add_cart_post'}}",
                method: "post",
                data: {
                    'id': id,
                },
                success: function (data) {
                    $.ajax({
                    url: "{{asset('').'add_cart_get'}}",
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