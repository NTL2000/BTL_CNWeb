<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Trang chủ</title>
    <!-- Bootstrap -->
    <link href="mockup/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- Icon -->
    <link rel="stylesheet" href="mockup/font/css/all.css">
    <!-- nhúng css -->
    <link rel="stylesheet" href="mockup/css/main.css">
    <link rel="stylesheet" href="mockup/css/index.css">
    <link rel="stylesheet" href="mockup/css/signin.css">
</head>

<body>
    @include('header')
    @yield('noiDung')
    @include('footer')
    <script src="mockup/vendor/jquery/jquery.min.js"></script>
    <script src="mockup/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="mockup/js/main.js"></script>
    <script src="{{asset('mockup/js/signin.js')}}"></script>
</body>

</html>