@extends('master.master_cart')
@section('noiDung')
<div class="content my-4 bg-white">
            <div class="container">
                <!-- Chi tiet san pham-->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="row moihangchitiet">
                            <div class="col-lg-2">
                                <img class="img_gh" src="mockup/images/giohang/anh1.jpg" alt="">
                            </div>
                            <div class="col-sx-5 col-sm-5 col-md-5  col-lg-5">
                                <a href="#">MacBook Air 13 inch 2020 MWTJ2 - Hàng Nhập Khẩu - Gold</a>
                                <br>
                                <p>Màn hinh: FHD 1920x1080, Ram: 8GB, Ô cứng: SSD 256GB</p>
                            </div>
                            <div class="col-sx-2 col-sm-2 col-md-2  col-lg-2">
                                <p class="tien">15000000 đ</p>
                            </div>
                            <div class="col-sx-3 col-sm-3 col-md-3  col-lg-3 nut">
                                <button id="tru1" onclick="tru1()">-</button><input class="soluong" type="text"
                                    value="1"><button id="cong1" onclick="cong1()">+</button>
                                <button><i class="far fa-trash-alt"></i>Xóa</button>
                            </div>
                        </div>

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
                    <form action="#">
                        <table>
                            <tr>
                                <td> <span>*</span> Họ tên: </td>
                                <td>
                                    <input class="form-control" type="text" placeholder="Họ tên">
                                </td>
                            </tr>

                            <tr>
                                <td><span>*</span> Số điện thoại: </td>
                                <td>
                                    <input class="form-control" type="tel" placeholder="Số điện thoại">
                                </td>

                            </tr>

                            <tr>
                                <td><span>*</span> Tỉnh thành</td>
                                <td>
                                    <select class="form-control">
                                        <option selected>Chọn Tỉnh/Thành Phố</option>
                                        <option>Thái Bình</option>
                                        <option>TP.Hồ Chí Minh</option>
                                        <option>Hà Nội</option>
                                        <option>Vũng Tàu</option>
                                        <option>Gia Lai</option>
                                        <option>Phú Yên</option>
                                        <option>Bình Định</option>
                                        <option>Nha Trang</option>
                                        <option>Bình Dương</option>
                                        <option>Quảng Ngãi</option>
                                        <option>Nghệ An</option>
                                    </select>
                                </td>
                            </tr>


                            <tr>
                                <td><span>*</span> Địa chỉ giao hàng: </td>
                                <td><input class="form-control" type="text" placeholder="Số nhà, tên đường, phườngxã">
                                </td>
                            </tr>

                            <tr>
                                <td>Ghi chú: </td>
                                <td>
                                    <input class="form-control" type="text" placeholder="Nhắn gởi tới người bán">
                                </td>

                            </tr>

                        </table>




                </div>

                <!-- Thông tin cá nhân-->

                <!--Nút đặt hàng-->
                <div class="nutdathang">
                    <button class="btn btn-warning btn-lg">ĐẶT HÀNG ONLINE</button>
                    <button class="btn btn-success btn-lg">Mua Trả Góp Thẻ VISA/Master/JCB</button>

                </div>

                </form>
                <!-- Nút đặt hàng-->

            </div>

        </div>
@endsection