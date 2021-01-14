@extends('master.master_admin')
@section('noiDung')
<div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Cấu hình
                            <small>Danh sách</small>
                        </h1>
                    </div>
                    <!-- /.col-lg-12 -->
                    <table class="table table-striped table-bordered table-hover" id="example">
                        <thead>
                            <tr align="center">
                                <th>ID</th>
                                <th>Cpu</th>
                                <th>Ram</th>
                                <th>Ổ cứng</th>
                                <th>Card đồ hoạ</th>
                                <th>Màn hình</th>
                                <th>Kết nối</th>
                                <th>Pin</th>
                                <th>Cân nặng</th>
                                <th>Kích thước</th>
                                <th>Delete</th>
                                <th>Edit</th>
                            </tr>
                        </thead>
                        <tbody class="body_table">
                            @for($i=0;$i<4;$i++)
                            <tr class="odd gradeX" align="center">
                                <td>{{$config[$i]['id']}}</td>
                                <td>{{$config[$i]['cpu']}}</td>
                                <td>{{$config[$i]['ram']}}</td>
                                <td>{{$config[$i]['hard_disk']}}</td>
                                <td>{{$config[$i]['cart_graphic']}}</td>
                                <td>{{$config[$i]['display']}}</td>
                                <td>{{$config[$i]['connect']}}</td>
                                <td>{{$config[$i]['pin']}}</td>
                                <td>{{$config[$i]['weight']}}</td>
                                <td>{{$config[$i]['size']}}</td>                                
                                <td class="center delete" name="{{$config[$i]['id']}}"><i class="fa fa-trash-o  fa-fw"></i><a href="#"> Delete</a></td>
                                <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="{{route('sua-cau-hinh',$config[$i]['id'])}}">Edit</a></td>
                            </tr>
                            @endfor
                            <nav aria-label="Page navigation example">
                              <ul class="pagination">
                                <li class="page-item"><a class="page-link" href="#">Previous</a></li>
                                @if($config->count()%4!=0)
                                    @for($i=0;$i<$config->count()/4;$i++)
                                    <li class="page-item png" name="{{$i+1}}"><a class="page-link" href="#">{{$i+1}}</a></li>
                                    @endfor
                                @else
                                    @for($i=1;$i<=$config->count()/4;$i++)
                                    <li class="page-item png" name="{{$i}}"><a class="page-link" href="#">{{$i}}</a></li>
                                    @endfor
                                @endif
                                <li class="page-item"><a class="page-link" href="#">Next</a></li>
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
                url: "paginate_config_admin/"+stt,
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
                url: "config_delete_exe/"+id,
                method: "get",
                success: function (data) {
                    $('.body_table').html(data);
                },
                });
            });
              
        });
    </script>
@endsection