<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" href="{{asset('mockup\images\chitietsanpham\10151473.jpg')}}" type="image/jpg" />
    <title>TLU_Shop-login</title>
    <!-- Bootstrap -->
    <link href="mockup/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- Icon -->
    <link rel="stylesheet" href="mockup/font/css/all.css">
    <!-- nhúng css -->
    <link rel="stylesheet" href="mockup/css/main.css">
    <link rel="stylesheet" href="{{asset('css/index.css')}}">
    <link rel="stylesheet" href="mockup/css/login.css">
</head>

<body>
    @include('header')
    @yield('noiDung')
    @include('footer')
    @yield('scripts')
    <script src="mockup/vendor/jquery/jquery.min.js"></script>
    <script src="mockup/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="mockup/js/main.js"></script>
    <script src="{{asset('mockup/js/signin.js')}}"></script>
    <script src="{{asset('jquery.formatCurrency-1.4.0/jquery.formatCurrency.js')}}"></script>
</body>

</html>