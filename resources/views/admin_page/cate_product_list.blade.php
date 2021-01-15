@extends('master.master_admin')
@section('noiDung')
<div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Loại sản phẩm 
                            <small>Danh sách</small>
                        </h1>
                    </div>
                    <!-- /.col-lg-12 -->
                    <table class="table table-striped table-bordered table-hover" id="example">
                        <thead>
                            <tr align="center">
                                <th>ID</th>
                                <th>Name</th>
                                <th>Description</th>
                                <th>Delete</th>
                                <th>Edit</th>
                            </tr>
                        </thead>
                        <tbody class="body_table">
                            @for($i=0;$i<4;$i++)
                            <tr class="odd gradeX" align="center">
                                <td>{{$typeProduct[$i]['id']}}</td>
                                <td>{{$typeProduct[$i]['name']}}</td>
                                <td>{{$typeProduct[$i]['description']}}</td>                                
                                <td class="center delete" name="{{$typeProduct[$i]['id']}}"><i class="fa fa-trash-o  fa-fw"></i><a href="#"> Delete</a></td>
                                <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="{{route('sua-loai-san-pham',$typeProduct[$i]['id'])}}">Edit</a></td>
                            </tr>
                            @endfor
                            <nav aria-label="Page navigation example">
                              <ul class="pagination">
                                <li class="page-item view_all"><a class="page-link" href="#">ALL</a></li>
                                @if($typeProduct->count()%4!=0)
                                    @for($i=0;$i<$typeProduct->count()/4;$i++)
                                    <li class="page-item png" name="{{$i+1}}"><a class="page-link" href="#">{{$i+1}}</a></li>
                                    @endfor
                                @else
                                    @for($i=1;$i<=$typeProduct->count()/4;$i++)
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
                url: "paginate_category_admin/"+stt,
                method: "get",
                success: function (data) {
                    $('.body_table').html(data);
                },
                });
            });
            //xoá loại sản phẩm
            $('table').on('click','.delete',function(){
                var id=parseInt($(this).attr('name').trim());
                $.ajax({
                url: "category_delete_exe/"+id,
                method: "get",
                success: function (data) {
                    $('.body_table').html(data);
                },
                });
            });
            $('.view_all').click(function(){
                $.ajax({
                url: "view_all_category_exe",
                method: "get",
                success: function (data) {
                    $('.body_table').html(data);
                },
                });
            });
              
        });
    </script>
@endsection