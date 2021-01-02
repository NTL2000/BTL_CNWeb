<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Trang chủ</title>
    <!-- Bootstrap -->
    <link href="{{asset('mockup/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
    <!-- Icon -->
    <link rel="stylesheet" href="{{asset('mockup/font/css/all.css')}}">
    <!-- nhúng css -->
    <link rel="stylesheet" href="{{asset('mockup/css/main.css')}}">
    <link rel="stylesheet" href="{{asset('mockup/css/index.css')}}">
    <link rel="stylesheet" href="{{asset('mockup/css/product.css')}}">
</head>

<body>
    @include('header')
    @yield('noiDung')
    @include('footer')
    <script src="{{asset('mockup/vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('mockup/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('mockup/js/main.js')}}"></script>
</body>

</html>