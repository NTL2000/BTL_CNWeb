<!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.html">Admin Area</a>
            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right" style="display: flex">
                @if(Auth::guard('dtb_employee')->check())
                <p style="margin-top: 15px;">Chào {{Auth::guard('dtb_employee')->user()->full_name}}</p>
                @endif
                <!-- /.dropdown -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i>  <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="#"><i class="fa fa-user fa-fw"></i> User Profile</a>
                        </li>
                        <li><a href="#"><i class="fa fa-gear fa-fw"></i> Settings</a>
                        </li>
                        <li class="divider"></li>
                        <li><a href="{{route('dang-xuat-admin')}}"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
            <!-- /.navbar-top-links -->

            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <li class="sidebar-search">
                            <div class="input-group custom-search-form">
                                <input type="text" class="form-control" placeholder="Search...">
                                <span class="input-group-btn">
                                    <button class="btn btn-default" type="button">
                                        <i class="fa fa-search"></i>
                                    </button>
                                </span>
                            </div>
                            <!-- /input-group -->
                        </li>
                        <!-- <li>
                            <a href="#"><i class="fas fa-chart-bar"></i></i> Tổng quan</a>
                        </li> -->
                        <li>
                            <a href="#"><i class="fa fa-list-alt" aria-hidden="true"></i>Loại sản phẩm<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="{{route('danh-sach-loai-san-pham')}}">danh sách</a>
                                </li>
                                <li>
                                    <a href="{{route('them-loai-san-pham')}}">thêm</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-cube fa-fw"></i>sản phẩm<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="{{route('danh-sach-san-pham')}}">danh sách</a>
                                </li>
                                <li>
                                    <a href="{{route('them-san-pham')}}">thêm</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-cube fa-fw"></i>Cấu hình<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="{{route('danh-sach-cau-hinh')}}">danh sách</a>
                                </li>
                                <li>
                                    <a href="{{route('them-cau-hinh')}}">thêm</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <li>
                            <a href="#"><i class="fas fa-user"></i> Quản trị viên<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="{{route('danh-sach-nguoi-dung')}}">danh sách</a>
                                </li>
                                <li>
                                    <a href="{{route('them-nguoi-dung')}}">thêm</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <!-- start customer -->
                        <!-- <li>
                            <a href="#"><i class="fa fa-users fa-fw"></i> khách hàng<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="#">danh sách</a>
                                </li>
                                <li>
                                    <a href="#">thêm</a>
                                </li>
                            </ul>
                            /.nav-second-level
                        </li> -->
                        <!-- end customer -->
                        <!-- start bill -->
                        <!-- <li>
                            <a href="#"><i class="fas fa-money-bill-alt"></i> hoá đơn<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="#">danh sách</a>
                                </li>
                                <li>
                                    <a href="#">thêm</a>
                                </li>
                            </ul>
                            /.nav-second-level
                        </li> -->
                        <!-- end bill -->
                        <!-- start notification -->
                        <!-- <li>
                            <a href="#"><i class="fas fa-bell"></i> thông báo<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="#">danh sách</a>
                                </li>
                                <li>
                                    <a href="#">thêm</a>
                                </li>
                            </ul>
                            /.nav-second-level
                        </li> -->
                        <!-- end notification -->
                        <!-- start slider -->
                        <!-- <li>
                            <a href="#"><i class="fas fa-image"></i> slider<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="#">danh sách</a>
                                </li>
                                <li>
                                    <a href="#">thêm</a>
                                </li>
                            </ul>
                            /.nav-second-level
                        </li> -->
                        <!-- end slider -->
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>