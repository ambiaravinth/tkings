<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>@yield('title', 'TKINGS')</title>

    <!-- Fav-icon -->
    <link rel="manifest" href="{{ public_url('images/favicon_io/site.webmanifest') }}">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ public_url('images/favicon_io/apple-touch-icon.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ public_url('images/favicon_io/favicon-16x16.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ public_url('images/favicon_io/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="192x192" href="{{ public_url('images/favicon_io/android-chrome-192x192.png') }}">
    <link rel="icon" type="image/png" sizes="512x512" href="{{ public_url('images/favicon_io/android-chrome-512x512.png') }}">

    <!-- Bootstrap 5.2.3 -->
    <link rel="stylesheet" href="{{ asset('') }}">
    <!-- <link rel="stylesheet" href="{{ base_path('') }}"> -->
    <!-- <link rel="stylesheet" href="{{ base_url('') }}"> -->
    <!-- <link rel="stylesheet" href="{{ public_path('') }}"> -->
    <!-- <link rel="stylesheet" href="{{ public_url('') }}"> -->
    <link href="{{ public_url('style/bootstrap-5.2.3/css/bootstrap.min.css') }}" rel="stylesheet">
    <script src="{{ public_url('style/bootstrap-5.2.3/js/bootstrap.bundle.min.js') }}"></script>

    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="{{ public_url('style/bootstrap-icons-1.13.1/bootstrap-icons.min.css') }}">

    <!-- Custom CSS -->
    <!-- <link rel="stylesheet" href="{{ public_url('style/style.css') }}"></link> -->

    <!-- jQuery 3.7.1 -->
    <script src="{{ public_url('jquery-3.7.1/jquery-3.7.1.js') }}"></script>

    <!-- canvas charts -->
    <!-- https://canvasjs.com -->
    <script src="{{ public_url('canvasjs/canvasjs-chart-3.13.1/canvasjs.min.js') }}"></script>
    <script src="{{ public_url('canvasjs/canvasjs-chart-3.13.1/jquery.canvasjs.min.js') }}"></script>
    <script src="{{ public_url('canvasjs/canvasjs-stockchart-1.13.1/canvasjs.stock.min.js') }}"></script>
    <script src="{{ public_url('canvasjs/canvasjs-stockchart-1.13.1/jquery.canvasjs.stock.min.js') }}"></script>

    <!-- youtube -->
    <script src="https://www.youtube.com/iframe_api"></script>

    <!-- QR Code -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/qrcodejs/1.0.0/qrcode.min.js"></script>
</head>

    <!-- Alerts -->
    @include('layout.toast')

    <!-- custom style -->
    @include('layout.style')

    <!-- Main Content -->
    @yield('content')

</html>
