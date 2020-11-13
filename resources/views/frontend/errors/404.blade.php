<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
	<meta name="author" content="">
    <base href="{{ asset('') }}">
    <title>Error | E-Shopper</title>
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
</head><!--/head-->

<body>
	<div class="container text-center">
		<div class="logo-404">
			<a href="index.html"><img src="vendor/frontend/images/home/logo.png" alt="" /></a>
		</div>
		<div class="content-404">
			<img src="vendor/frontend/images/404/404.png" class="img-responsive" alt="" />
			<h1><b>OPPS!</b> We Couldn’t Find this Page</h1>
			<p>Uh... So it looks like you brock something. The page you are looking for has up and Vanished.</p>
			<h2><a href="{{ route('frontend.home') }}">Bring me back Home</a></h2>
		</div>
	</div> 
    <script src="vendor/frontend/js/jquery.js"></script>
	<script src="vendor/frontend/js/bootstrap.min.js"></script>
	<script src="vendor/frontend/js/jquery.scrollUp.min.js"></script>
	<script src="vendor/frontend/js/price-range.js"></script>
    <script src="vendor/frontend/js/jquery.prettyPhoto.js"></script>
    <script src="vendor/frontend/js/main.js"></script>
</body>
</html>