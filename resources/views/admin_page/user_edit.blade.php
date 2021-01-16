@extends('master.master_admin')
@section('noiDung')
<div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Quản trị viên
                            <small>Sửa</small>
                        </h1>
                    </div>
                    <!-- /.col-lg-12 -->
                    <div class="col-lg-7" style="padding-bottom:120px">
                        <form action="{{route('sua-nguoi-dung_exe')}}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label>ID</label>
                                <input class="form-control" name="id" value="{{$user->id}}" readonly="readonly" />
                            </div>
                            <div class="form-group">
                                <label>Họ tên</label>
                                <input class="form-control" name="full_name" value="{{$user->full_name}}"  placeholder="Please Enter full name" />
                            </div>
                            <div class="form-group">
                                <label>Ngày sinh</label>
                                <input class="form-control" type="date" name="birth" value="{{$user->birth}}" placeholder="Please Enter birth" />
                            </div>
                            <div class="form-group">
                                <label>Địa chỉ</label>
                                <input class="form-control" name="address" value="{{$user->address}}" placeholder="Please Enter address" />
                            </div>
                            <div class="form-group">
                                <label>Giới tính</label>
                                <label class="radio-inline">
                                    <input name="gender" id="position_ratio" value="1" type="radio" required>Nam
                                </label>
                                <label class="radio-inline">
                                    <input name="gender" id="position_ratio" value="0" type="radio">Nữ
                                </label>
                            </div>
                            <div class="form-group">
                                <label>Số điện thoại</label>
                                <input class="form-control" name="phone" value="{{$user->phone}}" placeholder="Please Enter phone" />
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                <input class="form-control" name="email" value="{{$user->email}}" placeholder="Please Enter email" required />
                            </div>
                            <div class="form-group">
                                <label>Mật khẩu</label>
                                <input class="form-control" name="password" type="password" placeholder="Please Enter password" />
                            </div>
                            <button type="submit" class="btn btn-default">Sửa quản trị viên</button>
                        <form>
                    </div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
@endsection