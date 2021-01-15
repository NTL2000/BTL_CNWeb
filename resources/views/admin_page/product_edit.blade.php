@extends('master.master_admin')
@section('noiDung')
<div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Sản phẩm 
                            <small>Sửa</small>
                        </h1>
                    </div>
                    <!-- /.col-lg-12 -->
                    <div class="col-lg-7" style="padding-bottom:120px">
                        <form action="{{route('sua-san-pham_exe')}}" enctype="multipart/form-data" method="POST">
                            @csrf
                            <div class="form-group">
                                <label>ID</label>
                                <input class="form-control" value="{{$product->id}}" readonly="readonly" name="id" />
                            </div>
                            <div class="form-group">
                                <label>Tên</label>
                                <input class="form-control" value="{{$product->name}}" name="name" placeholder="Please Enter name product" />
                            </div>
                            <div class="form-group">
                                <label>ID loại</label>
                                <select id="id_type_ef" name="id_type">
                                    <option value="{{$typeProduct_current->id}}" selected><?php echo $typeProduct_current->id.'-'.$typeProduct_current->name ?></option>
                                    @foreach($typeProduct as $type)
                                    <option value="{{$type->id}}"><?php echo $type->id.'-'.$type->name ?></option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Mô tả</label>
                                <textarea id="demo_ef" class="form-control ckeditor" rows="5" name="description">{{$product->description}}</textarea>
                            </div>
                            <div class="form-group">
                                <label>Giá bình thường</label>
                                <input class="form-control" name="unit_price" value="{{$product->unit_price}}" placeholder="Please Enter Username" />
                            </div>
                            <div class="form-group">
                                <label>Giá khuyến mãi</label>
                                <input class="form-control" name="promotion_price" value="{{$product->promotion_price}}" placeholder="Please Enter Username" />
                            <div class="form-group">
                                <label>Ảnh 1</label>
                                <input type="file" value="{{explode('||',$product->image)[0]}}" name="img1" id="input0">
                                <img id="img0" src="{{asset('').'/'.explode('||',$product->image)[0]}}" alt="{{explode('||',$product->image)[0]}}">
                            </div>
                            <div class="form-group">
                                <label>Ảnh 2</label>
                                <input id="input1" type="file" name="img2">
                                <img id="img1" src="{{asset('').'/'.explode('||',$product->image)[1]}}" alt="{{explode('||',$product->image)[1]}}">
                            </div>
                            <div class="form-group">
                                <label>Ảnh 3</label>
                                <input id="input2" type="file" name="img3">
                                <img id="img2" src="{{asset('').'/'.explode('||',$product->image)[2]}}" alt="{{explode('||',$product->image)[2]}}">
                            </div>
                            <div class="form-group">
                                <label>Ảnh 4</label>
                                <input id="input3" type="file" name="img4">
                                <img id="img3" src="{{asset('').'/'.explode('||',$product->image)[3]}}" alt="{{explode('||',$product->image)[3]}}">
                            </div>
                            <div class="form-group">
                                <label>ID Cấu hình</label>
                                <select id="id_config_ef" name="id_config">
                                    <option value="{{$config_current->id}}" selected><?php echo $config_current->id.'-'.$config_current->cpu ?></option>
                                    @foreach($config as $conf)
                                    <option value="{{$conf->id}}"><?php echo $conf->id.'-'.$conf->cpu ?></option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Vị trí xuất hiện</label>
                                <label class="radio-inline">
                                    <input name="top"  value="1" type="radio">Trên đầu
                                </label>
                                <label class="radio-inline">
                                    <input name="porpular"  value="1" type="radio">Phổ biến
                                </label>
                            </div>
                            <button type="submit" class="btn btn-default">Sửa sản phẩm</button>
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
            // get id type product

            //preview img
            function readURL(input) {
                if (input.files && input.files[0]) {
                    var reader = new FileReader();

                    reader.onload = function (e) {
                        $('#img0').attr('src', e.target.result);
                    }

                    reader.readAsDataURL(input.files[0]);
                }
            }
            $("#input0").change(function (){
                readURL(this);
            });
            function readURL1(input) {
                if (input.files && input.files[0]) {
                    var reader = new FileReader();

                    reader.onload = function (e) {
                        $('#img1').attr('src', e.target.result);
                    }

                    reader.readAsDataURL(input.files[0]);
                }
            }
            $("#input1").change(function (){
                readURL1(this);
            });
            function readURL2(input) {
                if (input.files && input.files[0]) {
                    var reader = new FileReader();

                    reader.onload = function (e) {
                        $('#img2').attr('src', e.target.result);
                    }

                    reader.readAsDataURL(input.files[0]);
                }
            }
            $("#input2").change(function (){
                readURL2(this);
            });
            function readURL3(input) {
                if (input.files && input.files[0]) {
                    var reader = new FileReader();

                    reader.onload = function (e) {
                        $('#img3').attr('src', e.target.result);
                    }

                    reader.readAsDataURL(input.files[0]);
                }
            }
            $("#input3").change(function (){
                readURL3(this);
            });
              
        });
    </script>
@endsection