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
    <div class="reg-w3">
        <div class="w3layouts-main">
            <h2>Register Now</h2>
                <form method="POST" action="{{ route('register') }}">
                    @csrf
                    <input id="username" type="text" class="ggg @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}" required autocomplete="username" placeholder="USERNAME" autofocus>
                        @error('username')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    <input id="name" type="text" class="ggg @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" placeholder="NAME" autofocus>
                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    <input id="email" type="email" class="ggg @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="E-MAIL" required autocomplete="email">
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror

                    <input id="password" type="password" class="ggg @error('password') is-invalid @enderror" name="password" placeholder="PASSWORD" required autocomplete="new-password">
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        <input id="password-confirm" type="password" class="ggg" name="password_confirmation" required placeholder="CONFIRM_PASSWORD" autocomplete="new-password">
                    <h4><input type="checkbox" />I agree to the Terms of Service and Privacy Policy</h4>
                    
                        <div class="clearfix"></div>
                        <input type="submit" value="submit" name="register">
                </form>
            <p>Already Registered.<a href="{{route('backend.login')}}">Login</a></p>
        </div>
        </div>
    <script src="{{ asset('vendor/backend/js/bootstrap.js') }}"></script>
    <script src="{{ asset('vendor/backend/js/jquery.dcjqaccordion.2.7.js') }}"></script>
    <script src="{{ asset('vendor/backend/js/scripts.js') }}"></script>
    <script src="{{ asset('vendor/backend/js/jquery.nicescroll.js') }}"></script>
    <script src="{{ asset('vendor/backend/js/jquery.slimscroll.js') }}"></script>
    <script src="js/jquery.scrollTo.js"></script>
</body>
</html>