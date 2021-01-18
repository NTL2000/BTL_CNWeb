<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" href="{{asset('mockup\images\chitietsanpham\10151473.jpg')}}" type="image/jpg" />
    <title>TLU_Shop-product</title>
    <!-- Bootstrap -->
    <link href="{{asset('mockup/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
    <!-- Icon -->
    <link rel="stylesheet" href="{{asset('mockup/font/css/all.css')}}">
    <!-- nhúng css -->
    <link rel="stylesheet" href="{{asset('mockup/css/main.css')}}">
    <link rel="stylesheet" href="{{asset('css/index.css')}}">
    <link rel="stylesheet" href="{{asset('mockup/css/product.css')}}">
</head>

<body>
    @include('header')
    @yield('noiDung')
    @include('footer')
    @yield('scripts')
    <script src="{{asset('mockup/vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('mockup/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('mockup/js/main.js')}}"></script>
    <script src="{{asset('jquery.formatCurrency-1.4.0/jquery.formatCurrency.js')}}"></script>
</body>

</html>