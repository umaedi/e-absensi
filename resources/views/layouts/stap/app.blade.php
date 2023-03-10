<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, viewport-fit=cover">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ $data['title'] ?? "Dashboard" }}</title>

    <meta name="theme-color" content="#6777ef">
    <meta name="msapplication-navbutton-color" content="#6777ef">
    <meta name="apple-mobile-web-app-status-bar-style" content="#6777ef">
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
    <link rel="stylesheet" href="{{ asset('assets/stap') }}/css/fakeLoader.min.css">
    @vite([])
</head>

<body>
<div class="fakeLoader"></div>

@yield('content')
@include('layouts.stap.navbar')
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
<script src="{{ asset('assets/stap') }}/js/fakeLoader.min.js"></script>
{{-- <script src="{{ asset('assets/stap') }}/js/sw-script.js"></script> --}}
<script type="text/javascript">
$(document).ready(function loading() {
    $.fakeLoader({
        timeToHide:500,
        spinner:"spinner7"
    });
});

async function transAjax(data) {
    html = null;
    data.headers = {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
    await $.ajax(data).done(function(res) {
        html = res;
    })
        .fail(function() {
            return false;
        })
    return html
}
</script>
@stack('js')
</body>

</html>