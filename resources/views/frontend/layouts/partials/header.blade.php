<header id="header"><!--header-->
    <div class="header_top"><!--header_top-->
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <div class="contactinfo">
                        <ul class="nav nav-pills">
                            <li><a href="#"><i class="fa fa-phone"></i> +84 33 95 22 221</a></li>
                            <li><a href="#"><i class="fa fa-envelope"></i> petcare.com</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="social-icons pull-right">
                        <ul class="nav navbar-nav">
                            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                            <li><a href="#"><i class="fa fa-dribbble"></i></a></li>
                            <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div><!--/header_top-->
    
    <div class="header-middle"><!--header-middle-->
        <div class="container">
            <div class="row">
                <div class="col-sm-4">
                    <div class="logo pull-left">
                    <a href="{{route('frontend.home')}}"><img height="39px" width="139px;" src="vendor/frontend/images/home/logo6.png" alt="" /></a>
                    </div>
                    <div class="btn-group pull-right">
                        <div class="btn-group">
                            <button type="button" class="btn btn-default dropdown-toggle usa" data-toggle="dropdown">
                                {{ __('header.language') }}
                                <span class="caret"></span>
                            </button>
                            <ul class="dropdown-menu">
                                <li><a href="{{ route('app.setLocale', ['locale' => 'vi']) }}">VI</a></li>
                                <li><a href="{{ route('app.setLocale', ['locale' => 'en']) }}">EN</a></li>
                            </ul>
                        </div>
                        
                        <div class="btn-group">
                            <button type="button" class="btn btn-default dropdown-toggle usa" data-toggle="dropdown">
                                DOLLAR
                                <span class="caret"></span>
                            </button>
                            <ul class="dropdown-menu">
                                <li><a href="#">VND</a></li>
                                <li><a href="#">Pound</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-sm-8">
                    <div class="shop-menu pull-right">
                        <ul class="nav navbar-nav">
                            <li><a href="#"><i class="fa fa-user"></i> {{ __('header.account') }}</a></li>
                            <li><a href="{{ route('wishlist') }}"><i class="fa fa-star"></i><span class='badge badge-warning' id='lblWishlistCount'> 
                                    {{ Cart::instance('wishlist')->count() }} 
                                </span> {{ __('header.wishlist') }}</a>
                            </li>   
                            <li><a href="{{ route('shopping_cart') }}"><i class="fa fa-shopping-cart"></i><span class='badge badge-warning' id='lblCartCount'>
                                 {{ Cart::instance('cart')->count() }} 
                                </span> {{ __('header.cart') }}</a>
                            </li>
                            <li><a href="{{ route('checkout') }}"><i class="fa fa-crosshairs"></i>{{ __('header.checkout') }}</a></li> 
                            <!-- Authentication Links -->
                            @if(!Auth::guard('customer')->check())
                                <li><a href="{{ route('login-checkout') }}"><i class="fa fa-lock"></i> {{ __('header.login') }}</a></li>
                            @else
                                <li class="dropdown">
                                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                        <i class="fa fa-user"></i>{{Auth::guard('customer')->user()->name}}
                                    </a>

                                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item" href="{{ route('logout') }}"
                                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                            {{ __('header.logout') }}
                                        </a>
                                        <form id="logout-form" action="{{ route('customer.logout') }}" method="POST" class="d-none">
                                            @csrf
                                        </form>
                                    </div>
                                </li>
                            @endif
                            
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div><!--/header-middle-->

    <div class="header-bottom"><!--header-bottom-->
        <div class="container">
            <div class="row">
                <div class="col-sm-9">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                    </div>
                    <div class="mainmenu pull-left">
                        <ul class="nav navbar-nav collapse navbar-collapse">
                            <li><a href="{{ route('frontend.home') }}" class="active">{{__('header.home')}}</a></li>
                            <li class="dropdown"><a href="#">{{__('header.shop')}}<i class="fa fa-angle-down"></i></a>
                                <ul role="menu" class="sub-menu">
                                    <li><a href="{{ route('frontend.products') }}">{{__('header.products')}}</a></li>
                                    <li><a href="checkout.html">{{__('header.checkout')}}</a></li> 
                                    <li><a href="{{ route('shopping_cart') }}">{{__('header.cart')}}</a></li> 
                                    <li><a href="{{ route('login-checkout') }}">{{__('header.login')}}</a></li> 
                                </ul>
                            </li> 
                            <li class="dropdown"><a href="#">{{__('header.blog')}}<i class="fa fa-angle-down"></i></a>
                                <ul role="menu" class="sub-menu">
                                    <li><a href="{{ route('servies.index') }}">{{__('header.blog_list')}}</a></li>
                                    <li><a href="{{route('servies.service_single', ['id' => 1])}}">{{__('header.blog_single')}}</a></li>
                                </ul>
                            </li> 
                            <li><a href="{{ route('frontend.contact')}}">{{__('header.contact')}}</a></li>
                            <li><a href="{{ route('frontend.about_us')}}">{{__('header.about_us')}}</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="search_box pull-right">
                        <input type="text" placeholder="Search"/>
                    </div>
                </div>
            </div>
        </div>
    </div><!--/header-bottom-->
</header><!--/header-->