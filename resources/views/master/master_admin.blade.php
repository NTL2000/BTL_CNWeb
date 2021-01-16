<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="">
    <title>Admin-area</title>

    <!-- Bootstrap Core CSS -->
    <link href="{{asset('admin/bower_components/bootstrap/dist/css/bootstrap.min.css')}}" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="{{asset('admin/bower_components/metisMenu/dist/metisMenu.min.css')}}" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="{{asset('admin/dist/css/sb-admin-2.css')}}" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="{{asset('admin/bower_components/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css">

    <!-- DataTables CSS -->
    <link href="{{asset('admin/bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.css')}}" rel="stylesheet">

    <!-- DataTables Responsive CSS -->
    <link href="{{asset('admin/bower_components/datatables-responsive/css/dataTables.responsive.css')}}" rel="stylesheet">
    <!-- icon -->
    <link rel="stylesheet" href="{{asset('mockup/font/css/all.css')}}">
</head>

<body>
    @include('menu_admin')
    @yield('noiDung')
    @yield('scripts')
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="{{asset('admin/bower_components/jquery/dist/jquery.min.js')}}"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="{{asset('admin/bower_components/bootstrap/dist/js/bootstrap.min.js')}}"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="{{asset('admin/bower_components/metisMenu/dist/metisMenu.min.js')}}"></script>

    <!-- Custom Theme JavaScript -->
    <script src="{{asset('admin/dist/js/sb-admin-2.js')}}"></script>

    <!-- DataTables JavaScript -->
    <script src="{{asset('admin/bower_components/DataTables/media/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('admin/bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.min.js')}}"></script>

    <!-- Page-Level Demo Scripts - Tables - Use for reference -->
    <!-- sweet-alert -->
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script type="text/javascript" language="javascript" src="{{asset('admin/ckeditor/ckeditor.js')}}" ></script>
    <script>
    $(document).ready(function() {
        $('#dataTables-example').DataTable({
                responsive: true
        });
        @if(Session::has('category_add_success'))
            swal("Add category success!", "Bạn đã thêm loại sản phẩm thành công", "success")
            {{Session::forget('category_add_success')}}
        @endif
        @if(Session::has('category_edit_success'))
            swal("edit category success!", "Bạn đã sửa loại sản phẩm thành công", "success")
            {{Session::forget('category_edit_success')}}
        @endif
        @if(Session::has('config_add_success'))
            swal("add config success!", "Bạn đã thêm cấu hình thành công", "success")
            {{Session::forget('config_add_success')}}
        @endif
        @if(Session::has('config_edit_success'))
            swal("edit config success!", "Bạn đã sửa cấu hình thành công", "success")
            {{Session::forget('config_edit_success')}}
        @endif
        @if(Session::has('product_add_success'))
            swal("edit config success!", "Bạn đã thêm sản phẩm thành công", "success")
            {{Session::forget('product_add_success')}}
        @endif
        @if(Session::has('product_edit_success'))
            swal("edit product success!", "Bạn đã sửa sản phẩm thành công", "success")
            {{Session::forget('product_edit_success')}}
        @endif
        @if(Session::has('user_add_success'))
            swal("add admin success!", "Bạn đã thêm admin thành công", "success")
            {{Session::forget('user_add_success')}}
        @endif
        @if(Session::has('user_edit_success'))
            swal("edit admin success!", "Bạn đã sửa admin thành công", "success")
            {{Session::forget('user_edit_success')}}
        @endif
    });
    </script>
</body>

</html>
