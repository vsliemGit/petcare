{{-- View này sẽ kế thừa giao diện từ `frontend.layouts.master` --}}
@extends('frontend.layouts.master')

{{-- Thay thế nội dung vào Placeholder `title` của view `frontend.layouts.index` --}}
@section('title')
Home | PETCARE
@endsection


{{-- Content of index --}}
@section('main-content')
<!--Slider-->
@include('frontend.widgets.slider')

<section>
    <div class="container">
        <div class="row">
            <div class="col-sm-3">
                <!--Left-sidebar-->
                @include('frontend.widgets.left-sidebar')
            </div>
            
            <div class="col-sm-9 padding-right">
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
                                            <h2>${{ $product->product_price }}</h2>
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
                
                <div class="category-tab"><!--category-tab-->
                    <div class="col-sm-12">
                        <ul class="nav nav-tabs">
                            <li class="active"><a href="#all" data-toggle="tab">All</a></li>
                            @foreach ($listBrands as $brand)
                                @php $nameBrandFirst = $brand->brand_name @endphp
                                <li><a href="#{{ $brand->brand_slug }}" data-toggle="tab">{{ $brand->brand_name }}</a></li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="tab-content" id="list-products-by-brands">
                        @foreach ($listBrands as $brand)
                            <div class="tab-pane fade active in" id="{{ $brand->brand_slug }}">
                                @foreach ($brand->products as $product)
                                    <div class="col-sm-3">
                                        <div class="product-image-wrapper">
                                            <div class="single-products">
                                                <div class="productinfo text-center">
                                                    <img src="{{ asset('storage/images/' . $product->product_image) }}" alt="{{ $product->product_image }}" />
                                                    <h2>${{ number_format($product->product_price) }}</h2>
                                                    <a href="{{ route('frontend.product_detail', ['id' => $product->product_id ]) }}"><p style="color: blue">{{ $product->product_name }}</p></a>
                                                    <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        @endforeach
                        </div>
                    </div>
                </div><!--/category-tab-->
                
            </div>
        </div>
    </div>
</section>
@endsection

