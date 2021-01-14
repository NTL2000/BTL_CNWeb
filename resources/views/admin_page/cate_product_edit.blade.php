@extends('master.master_admin')
@section('noiDung')
<div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Loại sản phẩm
                            <small>sửa</small>
                        </h1>
                    </div>
                    <!-- /.col-lg-12 -->
                    <div class="col-lg-7" style="padding-bottom:120px">
                        <form action="{{route('sua-loai-san-pham_exe')}}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label>id</label>
                                <input class="form-control" name="txtCate_id"  value="{{$typeProduct->id}}" readonly="readonly"  />
                            </div>
                            <div class="form-group">
                                <label>Tên loại sản phẩm</label>
                                <input class="form-control" name="txtCateName" placeholder="Nhập tên loại sản phẩm" value="{{$typeProduct->name}}" />
                            </div>
                            <div class="form-group">
                                <label>Mô tả</label>
                                <textarea id="demo" class="form-control ckeditor" rows="5" name="txtContent" >{{$typeProduct->description}}</textarea>
                            </div>
                            <button type="submit" class="btn btn-default">Sửa</button>
                        <form>
                    </div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        @endsection