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
                        <style>
                            .dropbtn {                           
                                cursor: pointer;
                            }
                            .dropdown {
                                position: relative;
                                display: inline-block;
                            }
                            .dropdown-content {
                                display: none;
                                position: absolute;
                                min-width: 160px;
                                box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
                                z-index: 1;
                            }
                            .dropdown-content a {
                                color: black;
                                padding: 12px 16px;
                                text-decoration: none;
                                display: block;
                                margin-left: 10px;
                            }
                            .dropdown-content a:hover {background-color: #f1f1f1}

                            .dropdown:hover .dropdown-content {
                                display: block;
                            } 
                        </style>
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
                                    <a class="dropbtn" href="#">
                                        <i class="fa fa-user"></i>{{Auth::guard('customer')->user()->name}}
                                    </a>
                                    <div class="dropdown-content" aria-labelledby="dropdownMenuLink">
                                        <a  href="{{route('customer.profile')}}">
                                            <i class="fa fa-user"></i>
                                            Trang cá nhân
                                        </a>
                                        <a  href="{{ route('logout') }}"
                                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                            <i class="fa fa-sign-out" aria-hidden="true"></i>
                                            {{ __('header.logout') }}
                                            <form id="logout-form" action="{{ route('customer.logout') }}" method="POST" class="d-none">
                                                @csrf
                                            </form>
                                        </a>                                       
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
            <div class="col-sm-12">
                <div class="col-sm-8">
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
                                    <li><a href="{{ route('wishlist') }}">{{ __('header.wishlist') }}</a></li> 
                                    <li><a href="{{ route('shopping_cart') }}">{{__('header.cart')}}</a></li> 
                                    <li><a href="{{ route('login-checkout') }}">{{__('header.checkout')}}</a></li> 
                                </ul>
                            </li>
                            <li><a href="{{ route('servies.index') }}">{{__('header.services')}}</a></li>
                            <li><a href="{{ route('frontend.contact')}}">{{__('header.contact')}}</a></li>
                            <li><a href="{{ route('frontend.about_us') }}">{{__('header.about_us')}}</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-4 search_box pull-right">
                    <form action="{{route('frontend.search')}}" method="POST">
                        @csrf
                        <input type="text" id="keywords_search" style="width: 70%;" name="keywords_search" autocomplete="off" placeholder="{{__('header.input_key')}}"/>  
                        <input type="submit" style="margin-top:0; color:#666; width: auto;" name="btn_search" class="btn btn-primary btn-sm" value="{{__('header.search')}}">
                    </form>
                </div>              
            </div>
            <div class="col-sm-12">
                <div class="col-sm-8">            
                </div>
                <div class="col-sm-4" id="result_search_ajax">
                    
                </div>              
            </div>
        </div>
    </div><!--/header-bottom-->
</header><!--/header-->