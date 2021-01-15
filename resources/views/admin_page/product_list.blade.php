@extends('master.master_admin')
@section('noiDung')
<div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Sản phẩm 
                            <small>danh sách</small>
                        </h1>
                    </div>
                    <!-- /.col-lg-12 -->
                    <table class="table table-striped table-bordered table-hover" id="example">
                        <thead>
                            <tr align="center">
                                <th>ID</th>
                                <th>Tên sản phẩm</th>
                                <th>ID loại</th>
                                <th>Mô tả</th>
                                <th>Giá bình thường</th>
                                <th>Giá khuyến mãi</th>
                                <th>ID cấu hình</th>
                                <th>Trên đầu</th>
                                <th>Phổ biến</th>
                                <th>Xoá</th>
                                <th>Sửa</th>
                            </tr>
                        </thead>
                        <tbody class="body_table">
                            @for($i=0;$i<4;$i++)
                            <tr class="odd gradeX" align="center">
                                <td>{{$product[$i]->id}}</td>
                                <td ><p>{{$product[$i]->name}}</p>
                                    <img style="width: 200px" src="{{asset('').'/'.explode('||',$product[$i]->image)[0]}}" alt="{{$product[$i]->name}}">
                                </td>
                                <td>{{$product[$i]->id_type}}</td>
                                <td>{{$product[$i]->description}}</td>
                                <td>{{$product[$i]->unit_price}}</td>
                                <td>{{$product[$i]->promotion_price}}</td>
                                <td>{{$product[$i]->id_configuration}}</td>
                                <td>{{$product[$i]->top}}</td>
                                <td>{{$product[$i]->popular}}</td>
                                <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="#" class="delete" name="{{$product[$i]->id}}"> Delete</a></td>
                                <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="{{route('sua-san-pham',$product[$i]->id)}}">Edit</a></td>
                            </tr>
                            @endfor
                            <nav aria-label="Page navigation example">
                              <ul class="pagination">
                                <li class="page-item view_all_product"><a class="page-link" href="#">ALL</a></li>
                                @if($product->count()%4!=0)
                                    @for($i=0;$i<$product->count()/4;$i++)
                                    <li class="page-item png" name="{{$i+1}}"><a class="page-link" href="#">{{$i+1}}</a></li>
                                    @endfor
                                @else
                                    @for($i=1;$i<=$product->count()/4;$i++)
                                    <li class="page-item png" name="{{$i}}"><a class="page-link" href="#">{{$i}}</a></li>
                                    @endfor
                                @endif
                              </ul>
                            </nav>

                        </tbody>
                    </table>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
@endsection
@section('scripts')
    <script type="text/javascript">
        document.addEventListener("DOMContentLoaded", function (){
            //reset table bootstrap
            $(document).ready(function() {
                $('#example').dataTable({
                    "bPaginate": false,
                    "bLengthChange": false,
                    "bFilter": true,
                    "bInfo": false,
                    "bAutoWidth": false });
            });
            //paginate
            $('.png').click(function(){
                var stt=parseInt($(this).attr('name').trim());
                $.ajax({
                url: "paginate_product_admin/"+stt,
                method: "get",
                success: function (data) {
                    $('.body_table').html(data);
                },
                });
            });
            //delete
            $('table').on('click','.delete',function(){
                var id=parseInt($(this).attr('name').trim());
                $.ajax({
                url: "product_delete_exe/"+id,
                method: "get",
                success: function (data) {
                    $('.body_table').html(data);
                },
                });
            });
            //view all product
            $('.view_all_product').click(function(){
                $.ajax({
                url: "view_all_product_exe",
                method: "get",
                success: function (data) {
                    $('.body_table').html(data);
                },
                });
            });
              
        });
    </script>
@endsection