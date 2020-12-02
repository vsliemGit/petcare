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
                <!-- New products  -->
                @include('frontend.widgets.new-products')
                @include('frontend.widgets.new-products')
                @include('frontend.widgets.new-products')
                              
                {{-- <div class="category-tab"><!--category-tab--> --}}
                    {{-- <div class="col-sm-3">
                        <ul class="nav nav-tabs">
                            <li class="active"><a href="#all" data-toggle="tab">All</a></li>
                            @foreach ($listBrands as $brand)
                                @php $nameBrandFirst = $brand->brand_name @endphp
                                <li><a href="#{{ $brand->brand_slug }}" data-toggle="tab">{{ $brand->brand_name }}</a></li>
                            @endforeach
                        </ul>
                    </div>

                    <!-- List-product-by-Brand -->
                    <div  id="list-products-by-brands">
                        <div class="owl-carousel owl-theme">
                            @foreach($topThreeNewProducts as $key => $product)
                            <div class="col-sm-3">
                                <div class="product-image-wrapper">
                                    <div class="single-products">
                                        <div class="productinfo text-center">
                                            <img src="{{ asset('storage/images/' . $product->product_image) }}"  style="width: 200px;" alt="" />
                                            <h2>${{ number_format($product->product_price, 2)}} </h2>
                                            <p>{{ $product->product_name }}</p>
                                            <a href="#" class="btn btn-default"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                                        </div>
                                        <div class="choose">
                                            <ul class="nav nav-pills nav-justified">
                                                <li><a href="#"><i class="fa fa-star"></i>Wishlist</a></li>
                                                <li><a href="#"><i class="fa fa-eye"></i>Detail</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div> --}}
                    {{-- <div class="tab-content" id="list-products-by-brands">
                        @foreach ($listBrands as $brand)
                            <div class="tab-pane fade active in" id="{{ $brand->brand_slug }}">
                                @foreach ($brand->products as $product)
                                    <div class="col-sm-3">
                                        <div class="product-image-wrapper">
                                            <div class="single-products">
                                                <div class="productinfo text-center">
                                                    <img src="{{ asset('storage/images/' . $product->product_image) }}" alt="{{ $product->product_image }}" />
                                                    <h2>${{ number_format($product->product_price) }}</h2>
                                                    <a href="{{ route('frontend.product_detail', ['id' => $product->product_id ]) }}"><h4 style="color: blue">{{ $product->product_name }}</h4></a>
                                                    <a href="#" data-id="{{ $product->product_id }}"  class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                                                </div>
                                                <div class="choose">
                                                    <ul class="nav nav-pills nav-justified">
                                                        <li><a href="#"><i class="fa fa-star"></i>Wishlist</a></li>
                                                        <li><a href="#"><i class="fa fa-eye"></i>Detail</a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        @endforeach
                        </div>
                    </div> --}}
                {{-- </div><!--/category-tab--> --}}
                
            </div>
        </div>
    </div>
</section>
@endsection

@section('custom-scripts')
    <script>
        //carousel
        $(document).ready(function(){
            $(".owl-carousel").owlCarousel({
                nav: false,
                items:3,
                responsiveClass:true,
                loop: true,
                autoplay:true,
                autoplayTimeout: 1000,
                autoplayHoverPause:true,
                lazyLoad: true,
                responsive:{
                    0:{
                        items:1,
                    },
                    600:{
                        items: 2,
                    },
                    1000:{
                        items: 3,
                        loop:false
                    }
                }
            });
        });
        //Setup CSRF to AJAX
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $('.add-to-cart').click(function(e){
            e.preventDefault();
            $.ajax(
            {
                url: "{{ route('add-to-cart') }}",
                method: "POST",
                data: {
                    product_id : $(this).data('id')
                }
            }).done(function(data){
                realoadCountCart(data.itemInCart);
                swal('Success!', 'Add item to cart successfully!.', 'success');
            }).fail(function(jqXHR, ajaxOptions, thrownError){
                swal("Error!", "No response from server...", "error");
            });
        });
    </script>
@endsection

