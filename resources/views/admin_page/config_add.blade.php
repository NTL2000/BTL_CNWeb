@extends('master.master_admin')
@section('noiDung')
<div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Product
                            <small>Add</small>
                        </h1>
                    </div>
                    <!-- /.col-lg-12 -->
                    <div class="col-lg-7" style="padding-bottom:120px">
                        <form action="{{route('them-cau-hinh_exe')}}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label>CPU</label>
                                <input class="form-control" name="cpu" placeholder="Please Enter CPU" />
                            </div>
                            <div class="form-group">
                                <label>Ram</label>
                                <input class="form-control" name="ram" placeholder="Please Enter Ram" />
                            </div>
                            <div class="form-group">
                                <label>Ổ cứng</label>
                                <input class="form-control" name="hard_disk" placeholder="Please Enter hard_disk" />
                            </div>
                            <div class="form-group">
                                <label>Card đồ hoạ</label>
                                <input class="form-control" name="card" placeholder="Please Enter card_graphic" />
                            </div>
                            <div class="form-group">
                                <label>Màn hình</label>
                                <input class="form-control" name="monitor" placeholder="Please Enter Monitor" />
                            </div>
                            <div class="form-group">
                                <label>Kết nối</label>
                                <input class="form-control" name="connect" placeholder="Please Enter Connect" />
                            </div>
                            <div class="form-group">
                                <label>Pin</label>
                                <input class="form-control" name="pin" placeholder="Please Enter Pin" />
                            </div>
                            <div class="form-group">
                                <label>Cân nặng</label>
                                <input class="form-control" name="weight" placeholder="Please Enter Weight" />
                            </div>
                            <div class="form-group">
                                <label>Kích cỡ</label>
                                <input class="form-control" name="size" placeholder="Please EnterSize" />
                            </div>
                            <button type="submit" class="btn btn-default">Thêm cấu hình</button>
                        <form>
                    </div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
@endsection