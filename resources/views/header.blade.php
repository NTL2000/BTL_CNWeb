<header class="header">
            <nav class="nabar__container">
                <ul class="header__navbar-list">
                    <li class="header__navbar-item header__navbar-item--has-qr header__navbar-item--separate">
                        Tải ứng dụng
                        <div class="header__qr">
                            <img src="{{asset('mockup/images/navbar/qr_code.png')}}" alt="QR Code" class="header__qr-img" />
                            <div class="header__qr-app">
                                <a href="" class="header__qr-link">
                                    <img src="{{asset('mockup/images/navbar/google_play.png')}}" alt="Google Play"
                                        class="header__qr-download-img" />
                                </a>
                                <a href="" class="header__qr-link">
                                    <img src="{{asset('mockup/images/navbar/appstore.png')}}" alt="App Store"
                                        class="header__qr-download-img" />
                                </a>
                            </div>
                        </div>
                    </li>
                    <li class="header__navbar-item">
                        <span class="header__navbar-title--no-pointer">Kết nối</span>
                        <a href="" class="header__navbar-icon-link">
                            <i class="header__navbar-icon fab fa-facebook"></i>
                        </a>
                        <a href="" class="header__navbar-icon-link">
                            <i class="header__navbar-icon fab fa-instagram"></i>
                        </a>
                    </li>
                </ul>
                <ul class="header__navbar-list">
                    <li class="header__navbar-item header__navbar-item--has-notify">
                        <a href="" class="header__navbar-item-link">
                            <i class="header__navbar-icon far fa-bell"></i>
                            Thông báo
                        </a>
                        <!--Thông báo mới nhận -->
                        <div class="navbar__notify">
                            <h5 class="notify__h4">
                                Thông báo mới nhận
                            </h5>
                            <hr>
                            <div class="notify__items">
                                @foreach($notify as $no)
                                <div class="notify__item">
                                    <div class="notify__item-container">
                                        <a href="#" class="notify__item-img"><img src="{{asset('').'/'.$no->image}}" alt="" class="notify__item-i"></a>
                                        <div class="notify__item-right">
                                            <h6 class="notify__item-title">{{$no->title}}</h6>
                                            <div class="notify__item-content">
                                                {{$no->content}}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </li>
                    <li class="header__navbar-item">
                        <a href="" class="header__navbar-item-link">
                            <i class="header__navbar-icon far fa-question-circle"></i>
                            Trợ giúp
                        </a>
                    </li>
                </ul>
            </nav>
            <div class="header__container">
                <div class="header__container-logo">
                    <div class="logo__line1">
                        <p class="logo__line1-text"><a href="{{route('trang-chu')}}">TLU_Shop</a></p>
                    </div>
                </div>
                <div class="header__container-form">
                    <form class="form__tag" action="{{route('tim-kiem')}}">
                        <div class="input-group">
                            <input type="text" name="key" class="form-control"
                                placeholder="Tên Laptop, giá " required>
                            <button class="btn btn-warning" type="submit"><i class="fas fa-search"></i></button>

                        </div>
                    </form>
                </div>
                <div class="header__container-lh">
                    <div class="lh__line1">
                        <p class="lh__line1-text">0964627305</p>
                    </div>
                    <p class="lh__line2">
                        Hotline hỗ trợ khách hàng
                    </p>
                </div>
                <div class="header__container-login-card">
                    <div class="btn__card">
                        <button class="bt__card"> <i class="fa fa-shopping-cart"></i><span class='badge badge-warning'
                                id='lblCartCount'>{{Session('cart')->totalQty??0}}</span> Giỏ hàng</button>
                        <div class="cart__hidden">
                            <h4 class="cart__hidden-heading">Sản phẩm mới thêm</h4>
                            <hr>
                            <div class="cart__product">
                                @if(Session::has('cart'))
                                    @foreach($product_cart as $product)
                                    <div class="cart__product-item" name="{{$product['item']['id']}}">
                                        <div class="cart__product-container">
                                            <div class="cpi__left">
                                                <a href="{{route('san-pham',$product['item']['id'])}}" class="cpi__left-img"><img src="{{asset('').'/'.explode('||',$product['item']['image'])[0]}}"
                                                        alt=""></a>
                                                <div class="cpi__left-content">
                                                    <span class="content__name">
                                                        {{$product['item']['name']}}
                                                    </span>
                                                    <span class="content__price">
                                                        <span class="cart__quantity">{{$product['qty']}}</span>*<span
                                                            class="cart__price">{{$product['item']['promotion_price']}}</span>
                                                    </span>
                                                </div>
                                            </div>
                                            <button class="cpi__right"><i class="fas fa-trash-alt"></i></button>
                                        </div>
                                    </div>
                                    @endforeach
                                @endif
                            </div>
                            <hr>
                            <div class="total__price">
                                Tổng tiển :
                                <span class="cart__total-price">{{Session('cart')->totalPrice??0}}</span>
                            </div>
                            <div class="btn__checkout">
                                <button><a href="{{route('gio-hang')}}">Đặt hàng</a></button>
                            </div>
                        </div>
                    </div>
                    <div class="btn__login">
                        @if(Auth::guard('dtb_customer')->check())
                        <!-- {{Auth::guard('dtb_customer')->user()->full_name}} -->
                        <div class="user">
                            <div class="user__tag">
                                <i class="far fa-user"></i>
                                <p>{{Auth::guard('dtb_customer')->user()->full_name}}</p>
                            </div>
                            <div class="user_hiddent">
                                <div class="user_hiddent-container">
                                    <a href="#"><button class="btn btn-warning btn__t2 btn__user"><i class="fas fa-user-circle"></i>Profile</button></a>
                                    <a href="{{route('dang-xuat')}}"><button class="btn btn-warning btn__t2 btn__user"><i class="fas fa-sign-out-alt"></i>Đăng xuất</button></a>
                                </div>
                            </div>
                        </div>
                        @else
                        <button class="bt__login"><i class="fas fa-users"></i>Đăng nhập</button>
                        <div class="table__hidden">
                            <div class="table__hidden-contaier">
                                <a href="{{route('dang-nhap')}}"><button class="btn btn-warning btn__t2"><i
                                            class="fas fa-users"></i>Đăng nhập</button></a>
                                <a href="{{route('dang-ky')}}"><button class="btn btn-warning btn__t2"><i
                                            class="fas fa-registered"></i> Tạo tài
                                        khoản</button></a>
                                <a href="{{route('dang-nhap')}}"><button class="btn btn-primary">Đăng nhập
                                        Facebook
                                    </button></a>
                                <a href="{{route('dang-nhap')}}"><button class="btn btn-danger">Đăng nhập
                                        Google </button></a>
                            </div>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
            <nav class="navbar navbar-inverse">
                <div class="container-fluid">
                    <div class="navbar-header">
                        <a class="navbar-brand" href="mockup/index.html">
                            <div class="header__container-logo">
                                <div class="logo__line1">
                                    <p class="logo__line1-text">TLU_Shop</p>
                                </div>
                                <p class="logo__line2">
                                    Hệ thống bán lẻ uy tín
                                </p>
                            </div>
                        </a>
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                            <i class="fa fa-bars" aria-hidden="true"></i>
                        </button>
                    </div>
                    <div class="collapse navbar-collapse" id="myNavbar">
                        <ul class="nav navbar-nav">
                            <li class="active"><a href="{{route('gio-hang')}}">Giỏ hàng</a></li>
                            <li class="dropdown">
                                <a class="dropdown-toggle" data-toggle="dropdown" href="#">Danh mục<span
                                        class="caret"></span></a>
                                <ul class="dropdown-menu">
                                    <li><a href="#">Laptop dell</a></li>
                                    <li><a href="#">Laptop Macbook</a></li>
                                    <li><a href="#">Laptop Lenovo</a></li>
                                    <li><a href="#">Khác</a></li>
                                </ul>
                            </li>
                            <li class="active"><a href="#">Đăng ký</a></li>
                            <li class="active"><a href="#">Đăng nhập</a></li>
                        </ul>
                    </div>
                </div>
            </nav>
        </header>
