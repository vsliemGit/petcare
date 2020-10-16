<!--A Design by W3layouts
Author: W3layout
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE html>
<head>
<title>@yield('title')</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Visitors Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- bootstrap-css -->
<link rel="stylesheet" href="{{ asset('vendor/backend/css/bootstrap.min.css') }}" >
<!-- //bootstrap-css -->
<!-- Custom CSS -->
<link href="{{ asset('vendor/backend/css/style.css') }}" rel='stylesheet' type='text/css' />
<link href="{{ asset('vendor/backend/css/style-responsive.css') }}" rel="stylesheet"/>
<!-- font CSS -->
<link href='//fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,400italic,500,500italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
<!-- font-awesome icons -->
<link rel="stylesheet" href="{{ asset('vendor/backend/css/font.css') }}" type="text/css"/>
<link href="{{ asset('vendor/backend/css/font-awesome.css') }}" rel="stylesheet">
{{-- <link rel="stylesheet" href="" type="text/css"/> --}}
<link rel="stylesheet" href="{{ asset('vendor/backend/css/morris.css') }}" type="text/css"/>
<!-- calendar -->
<link rel="stylesheet" href="{{ asset('vendor/backend/css/monthly.css') }}">
<!-- //calendar -->
<!-- //font-awesome icons -->
<script src="{{ asset('vendor/backend/js/jquery2.0.3.min.js') }}"></script>
<script src="{{ asset('vendor/backend/js/raphael-min.js') }}"></script>
<script src="{{ asset('vendor/backend/js/morris.js') }}"></script>
</head>
<body>
<section id="container">

<!--Header-->
@include('backend.layouts.partials.header')

<!--sidebar-->
@include('backend.layouts.partials.sidebar')

<!--main content start-->
<section id="main-content">
	@yield('main-content')
</section>
<!--main content end-->
</section>
<script src="{{ asset('vendor/backend/js/bootstrap.js') }}"></script>
<script src="{{ asset('vendor/backend/js/jquery.dcjqaccordion.2.7.js') }}"></script>
<script src="{{ asset('vendor/backend/js/scripts.js') }}"></script>
<script src="{{ asset('vendor/backend/js/jquery.nicescroll.js') }}"></script>
<script src="{{ asset('vendor/backend/js/jquery.slimscroll.js') }}"></script>
<!--[if lte IE 8]><script language="javascript" type="text/javascript" src="js/flot-chart/excanvas.min.js"></script><![endif]-->
<script src="{{ asset('vendor/backend/js/jquery.scrollTo.js') }}"></script>
<!-- morris JavaScript -->	
<script>
	$(document).ready(function() {
		//BOX BUTTON SHOW AND CLOSE
	   jQuery('.small-graph-box').hover(function() {
		  jQuery(this).find('.box-button').fadeIn('fast');
	   }, function() {
		  jQuery(this).find('.box-button').fadeOut('fast');
	   });
	   jQuery('.small-graph-box .box-close').click(function() {
		  jQuery(this).closest('.small-graph-box').fadeOut(200);
		  return false;
	   }); 
	});
	</script>
<!-- calendar -->
    <script type="text/javascript" src="{{ asset('vendor/backend/js/monthly.js') }}"></script>
	<script type="text/javascript">
		$(window).load( function() {

			$('#mycalendar').monthly({
				mode: 'event',
				
			});

			$('#mycalendar2').monthly({
				mode: 'picker',
				target: '#mytarget',
				setWidth: '250px',
				startHidden: true,
				showTrigger: '#mytarget',
				stylePast: true,
				disablePast: true
			});

		switch(window.location.protocol) {
		case 'http:':
		case 'https:':
		// running on a server, should be good.
		break;
		case 'file:':
		alert('Just a heads-up, events will not work when run locally.');
		}

		});
	</script>
	<!-- //calendar -->
</body>
</html>
