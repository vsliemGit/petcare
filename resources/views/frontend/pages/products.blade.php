{{-- View này sẽ kế thừa giao diện từ `frontend.layouts.master` --}}
@extends('frontend.layouts.master')

{{-- Content of products --}}
@section('main-content')
<section id="advertisement">
    <div class="container">
        <img src="vendor/frontend/images/shop/advertisement.jpg" alt="" />
    </div>
</section>
<section>
    <div class="container">
        <div class="row">
            <div class="col-sm-3">
                <!--Left-sidebar-->
                @include('frontend.widgets.left-sidebar')
            </div>
            <div class="features_items"><!--features_items-->
                <h2 class="title text-center">NEW PRODUCTS</h2>
                @foreach($topThreeNewProducts as $key => $product)
                    <div class="col-sm-4">
                        <div class="product-image-wrapper">
                            <div class="single-products">
                                <div class="productinfo text-center">
                                    <img src="{{ asset('storage/images/' . $product->product_image) }}" alt="" />
                                    <h2>${{ number_format($product->product_price, 2)}} </h2>
                                    <p>{{ $product->product_name }}</p>
                                    <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                                </div>
                                <div class="product-overlay">
                                    <div class="overlay-content">
                                        <h2>${{ number_format($product->product_price, 0)}}</h2>
                                        <p>{{ $product->product_name }}</p>
                                        <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                                    </div>
                                </div>
                                <img src="vendor/frontend/images/home/new.png" class="new" alt="" />
                            </div>
                            <div class="choose">
                                <ul class="nav nav-pills nav-justified">
                                    <li><a href="#"><i class="fa fa-plus-square"></i>Add to wishlist</a></li>
                                    <li><a href="#"><i class="fa fa-plus-square"></i>Add to compare</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>  
                @endforeach                
            </div><!--features_items-->
            <div class="features_items"><!--features_items-->
                <h2 class="title text-center">LIST PRODUCTS</h2>
                @foreach($listProducts as $key => $product)
                    <div class="col-sm-4">
                        <div class="product-image-wrapper cart-product">
                            <div class="single-products">
                                <div class="productinfo text-center">
                                    <img src="{{ asset('storage/images/' . $product->product_image) }}" alt="" />
                                    <h2>${{ number_format($product->product_price, 2)}} </h2>
                                    <a href="{{ route('frontend.product_detail', ['id' => $product->product_id ]) }}"><p style="color: blue">{{ $product->product_name }}</p></a>
                                    <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                                </div>
                            </div>
                            <div class="choose">
                                <ul class="nav nav-pills nav-justified">
                                    <li><a href="#"><i class="fa fa-plus-square"></i>Add to wishlist</a></li>
                                    <li><a href="#"><i class="fa fa-plus-square"></i>Add to compare</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>  
                @endforeach  
                <ul class="pagination">
                    {{ $listProducts->links() }}
                </ul>              
            </div><!--features_items-->
        </div>
    </div>
@endsection