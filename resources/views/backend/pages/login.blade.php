<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
    <!-- bootstrap-css -->
    <link rel="stylesheet" href="{{ asset('vendor/backend/css/bootstrap.min.css') }}" >
    <!-- Custom CSS -->
    <link href="{{ asset('vendor/backend/css/style.css') }}" rel='stylesheet' type='text/css' />
    <link href="{{ asset('vendor/backend/css/style-responsive.css') }}" rel="stylesheet"/>
    <!-- font CSS -->
    <link href='//fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,400italic,500,500italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
    <!-- font-awesome icons -->
    <link rel="stylesheet" href="{{ asset('vendor/backend/css/font.css') }}" type="text/css"/>
    <link href="{{ asset('vendor/backend/css/font-awesome.css') }}" rel="stylesheet">
    <script src="{{ asset('vendor/backend/js/jquery-2.0.3.min.js') }}"></script>
    <title>Document</title>
</head>
<body>
    <div class="log-w3">
        <div class="w3layouts-main">
            <h2>Sign In Now</h2>
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <input type="email" class="ggg" name="email" placeholder="E-MAIL" required="">
                    <input type="password" class="ggg" name="password" placeholder="PASSWORD" required="">
                    <span><input type="checkbox" />Remember Me</span>
                    <h6><a href="#">Forgot Password?</a></h6>
                        <div class="clearfix"></div>
                        <input type="submit" value="Sign In" name="login">
                </form>
            <p>Don't Have an Account ?<a href="{{route('backend.register')}}">Create an account</a></p>
        </div>
    </div>
    <script src="{{ asset('vendor/backend/js/bootstrap.js') }}"></script>
    <script src="{{ asset('vendor/backend/js/jquery.dcjqaccordion.2.7.js') }}"></script>
    <script src="{{ asset('vendor/backend/js/scripts.js') }}"></script>
    <script src="{{ asset('vendor/backend/js/jquery.nicescroll.js') }}"></script>
    <script src="{{ asset('vendor/backend/js/jquery.slimscroll.js') }}"></script>
    <script src="{{ asset('vendor/backend/js/jquery.scrollTo.js') }}"></script>
</body>
</html>