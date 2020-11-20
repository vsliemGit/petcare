<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
	<meta name="author" content="">
    <title>@yield('title')</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <base href="{{ asset('') }}">
    <link href="vendor/frontend/css/bootstrap.min.css" rel="stylesheet">
    <link href="vendor/frontend/css/font-awesome.min.css" rel="stylesheet">
    <link href="vendor/frontend/css/prettyPhoto.css" rel="stylesheet">
    <link href="vendor/frontend/css/price-range.css" rel="stylesheet">
    <link href="vendor/frontend/css/animate.css" rel="stylesheet">
	<link href="vendor/frontend/css/main.css" rel="stylesheet">
    <link href="vendor/frontend/css/responsive.css" rel="stylesheet">
    <link rel="shortcut icon" href="vendor/frontend/images/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="vendor/frontend/images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="vendor/frontend/images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="vendor/frontend/images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="vendor/frontend/images/ico/apple-touch-icon-57-precomposed.png">
    <link href="vendor/frontend/css/custom-style.css" rel="stylesheet"> 
    {{-- owl_carousel_2 css--}}
    <link href="vendor/frontend/css/owl.carousel.min.css" rel="stylesheet">
    <link href="vendor/frontend/css/owl.theme.default.min.css" rel="stylesheet">  
    <!-- Các custom script dành riêng cho từng view -->
	@yield('custom-css')
    <style>
        .badge {
            padding-left: 9px;
            padding-right: 9px;
            -webkit-border-radius: 9px;
            -moz-border-radius: 9px;
            border-radius: 9px;
        }

        .label-warning[href],
        .badge-warning[href] {
        background-color: #c67605;
        }
        #lblCartCount {
            font-size: 10px;
            background: #ff0000;
            color: #fff;
            padding: 0 3px;
            vertical-align: top;
            margin-left: -5px; 
        }
    </style>
</head><!--/head-->

<body>
    <!--Header-->
    @include('frontend.layouts.partials.header')

	<!-- Content -->
    @yield('main-content')
     
    <!--Footer-->
    @include('frontend.layouts.partials.footer')
	
    <script src="vendor/frontend/js/jquery.js"></script>
	<script src="vendor/frontend/js/bootstrap.min.js"></script>
	<script src="vendor/frontend/js/jquery.scrollUp.min.js"></script>
	<script src="vendor/frontend/js/price-range.js"></script>
    <script src="vendor/frontend/js/jquery.prettyPhoto.js"></script>
    <script src="vendor/frontend/js/main.js"></script>
    {{-- owl_carousel_2 js --}}
    <script src="vendor/frontend/js/owl.carousel.min.js"></script>
    <!-- Các custom script dành riêng cho từng view -->
    @yield('custom-scripts')
    <script>
        function realoadCountCart($value){
            $('#lblCartCount').text($value) ;
        }
    </script>
</body>
</html>