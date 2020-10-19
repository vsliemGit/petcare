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
<script src="{{ asset('vendor/backend/js/jquery-2.0.3.min.js') }}"></script>
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
<!-- Script -->
   <script type="text/javascript">
      // morris JavaScript
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
		//Chang text to slug:
		function changToSlug(str) {
            //Đổi ký tự có dấu thành không dấu
            str = str.replace(/à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ/g, "a");
            str = str.replace(/è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ/g, "e");
            str = str.replace(/ì|í|ị|ỉ|ĩ/g, "i");
            str = str.replace(/ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ/g, "o");
            str = str.replace(/ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ/g, "u");
            str = str.replace(/ỳ|ý|ỵ|ỷ|ỹ/g, "y");
            str = str.replace(/đ/g, "d");
            str = str.replace(/À|Á|Ạ|Ả|Ã|Â|Ầ|Ấ|Ậ|Ẩ|Ẫ|Ă|Ằ|Ắ|Ặ|Ẳ|Ẵ/g, "A");
            str = str.replace(/È|É|Ẹ|Ẻ|Ẽ|Ê|Ề|Ế|Ệ|Ể|Ễ/g, "E");
            str = str.replace(/Ì|Í|Ị|Ỉ|Ĩ/g, "I");
            str = str.replace(/Ò|Ó|Ọ|Ỏ|Õ|Ô|Ồ|Ố|Ộ|Ổ|Ỗ|Ơ|Ờ|Ớ|Ợ|Ở|Ỡ/g, "O");
            str = str.replace(/Ù|Ú|Ụ|Ủ|Ũ|Ư|Ừ|Ứ|Ự|Ử|Ữ/g, "U");
            str = str.replace(/Ỳ|Ý|Ỵ|Ỷ|Ỹ/g, "Y");
            str = str.replace(/Đ/g, "D");
            //Xóa các ký tự đặt biệt
            str = str.replace(/\`|\~|\!|\@|\#|\||\$|\%|\^|\&|\*|\(|\)|\+|\=|\,|\.|\/|\?|\>|\<|\'|\"|\:|\;|_/gi, '');
            //Xóa các dấu khoảng trắng dư thừa
            str = str.replace(/[\s+]/g, '_');
            //Đổi khoảng trắng thành ký tự gạch ngang
            str = str.replace(" ", "_");
            str = str.toLowerCase();
            return str;
    	}
	</script>
<!-- End-script -->
</body>
</html>
