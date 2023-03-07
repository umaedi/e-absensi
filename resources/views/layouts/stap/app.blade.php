<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport"
        content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, viewport-fit=cover">
    <title>DISKOMINFO TUBA</title>
    <meta name="theme-color" content="#FF396F">
    <meta name="msapplication-navbutton-color" content="#FF396F">
    <meta name="apple-mobile-web-app-status-bar-style" content="#FF396F">
    <meta name="robots" content="index, follow">
    <meta name="description" content="DISKOMINFO TUBA">
    <meta name="keywords" content="DISKOMINFO TUBA">
    <meta name="author" content="DISKOMINFO TUBA">
    <meta http-equiv="Copyright" content="DISKOMINFO TUBA">
    <meta name="copyright" content="DISKOMINFO TUBA">
    <meta itemprop="image" content="sw-content/meta-tag.jpg">
    <link rel="stylesheet" href="{{ asset('assets/stap') }}/css/style.css">
    <link rel="stylesheet" href="{{ asset('assets/stap') }}/css/sw-custom.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
    @vite([])
</head>

<body>

@yield('content')
@include('layouts.stap.button-action')
@include('layouts.stap.footer')

<script src="{{ asset('assets/stap') }}/js/lib/jquery-3.4.1.min.js"></script>
<!-- Bootstrap-->
<script src="{{ asset('assets/stap') }}/js/lib/popper.min.js"></script>
<!-- Ionicons -->
<script src="https://unpkg.com/ionicons@5.4.0/dist/ionicons.js"></script>
<script src="https://kit.fontawesome.com/0ccb04165b.js" crossorigin="anonymous"></script>
<!-- Base Js File -->
<script src="{{ asset('assets/stap') }}/js/sweetalert.min.js"></script>
<script src="{{ asset('assets/stap') }}/js/webcamjs/webcam.min.js"></script>
<script src="{{ asset('assets/stap') }}/js/sw-script.js"></script>
@stack('js')
</body>

</html>