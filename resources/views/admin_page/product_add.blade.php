@extends('master.master_admin')
@section('noiDung')
<div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Sản phẩm 
                            <small>thêm</small>
                        </h1>
                    </div>
                    <!-- /.col-lg-12 -->
                    <div class="col-lg-7" style="padding-bottom:120px">
                        <form action="{{route('them-san-pham_exe')}}" enctype="multipart/form-data" method="POST">
                            @csrf
                            <div class="form-group">
                                <label>Tên</label>
                                <input class="form-control" name="name" placeholder="Please Enter name product" />
                            </div>
                            <div class="form-group">
                                <label>ID loại</label>
                                <select id="id_type" name="id_type">
                                    <option value="volvo">1</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Mô tả</label>
                                <textarea id="demo" class="form-control ckeditor" rows="5" name="description"></textarea>
                            </div>
                            <div class="form-group">
                                <label>Giá bình thường</label>
                                <input class="form-control" name="unit_price" placeholder="Please Enter Username" />
                            </div>
                            <div class="form-group">
                                <label>Giá khuyến mãi</label>
                                <input class="form-control" name="promotion_price" placeholder="Please Enter Username" />
                            <div class="form-group">
                                <label>Ảnh 1</label>
                                <input type="file" name="img1">
                            </div>
                            <div class="form-group">
                                <label>Ảnh 2</label>
                                <input type="file" name="img2">
                            </div>
                            <div class="form-group">
                                <label>Ảnh 3</label>
                                <input type="file" name="img3">
                            </div>
                            <div class="form-group">
                                <label>Ảnh 4</label>
                                <input type="file" name="img4">
                            </div>
                            <div class="form-group">
                                <label>ID Cấu hình</label>
                                <select id="id_config" name="id_config">
                                    <option value="volvo">1</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Vị trí xuất hiện</label>
                                <label class="radio-inline">
                                    <input name="top" id="position_ratio" value="1" type="radio">Trên đầu
                                </label>
                                <label class="radio-inline">
                                    <input name="porpular" id="position_ratio" value="1" type="radio">Phổ biến
                                </label>
                            </div>
                            <button type="submit" class="btn btn-default">Thêm sản phẩm</button>
                            <button type="reset" class="btn btn-default">Làm mới</button>
                        <form>
                    </div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
@endsection
@section('scripts')
    <script type="text/javascript">
        document.addEventListener("DOMContentLoaded", function (){
            // get id product
            $.ajax({
                url: "get_id_type_product",
                method: "get",
                success: function (data) {
                    $('#id_type').html(data);
                },
                });
            // get id config
            $.ajax({
                url: "get_id_config",
                method: "get",
                success: function (data) {
                    $('#id_config').html(data);
                },
                });
              
        });
    </script>
@endsection