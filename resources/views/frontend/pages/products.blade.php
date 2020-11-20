{{-- View này sẽ kế thừa giao diện từ `frontend.layouts.master` --}}
@extends('frontend.layouts.master')

@section('custom-css')
<style>
    .img-similar {
        width: 84px;
        height: 84px;
    }
</style>
@endsection

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
                <div class="owl-carousel owl-theme">
                    @foreach($topThreeNewProducts as $key => $product)
                        <div class="product-image-wrapper">
                            <div class="single-">
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
                                <img src="vendor/frontend/images/home/new.png" class="new" style="width: 50px;" alt="" />
                            </div>
                            <div class="choose">
                                <ul class="nav nav-pills nav-justified">
                                    <li><a href="#"><i class="fa fa-plus-square"></i>Add to wishlist</a></li>
                                    <li><a href="#"><i class="fa fa-plus-square"></i>Add to compare</a></li>
                                </ul>
                            </div>
                        </div>  
                    @endforeach
                </div>                
            </div><!--features_items-->
            
            <div class="features_items"><!--features_items-->
                <h2 class="title text-center">LIST PRODUCTS</h2>
                @foreach($listProducts as $key => $product)
                    <div class="col-sm-6 col-lg-3">
                        <div class="product-image-wrapper cart-product">
                            <div class="single-products">
                                <div class="productinfo text-center">
                                    <img src="{{ asset('storage/images/' . $product->product_image) }}" alt="" />
                                    <h2>${{ number_format($product->product_price, 2)}} </h2>
                                    <a href="{{ route('frontend.product_detail', ['id' => $product->product_id ]) }}"><h4 style="color: blue">{{ $product->product_name }}</h4></a>
                                    <button type="button" class="btn btn-fefault add-to-cart" data-id="{{$product->product_id}}">
                                        <i class="fa fa-shopping-cart"></i>
                                        Add to cart
                                    </button>
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
                <ul class="pagination col-sm-12 col-lg-12">
                    {{ $listProducts->links() }}
                </ul>              
            </div><!--features_items-->
        </div>
    </div>
@endsection

@section('custom-scripts')
    <script>
        //carousel
        $(document).ready(function(){
            $(".owl-carousel").owlCarousel({
                items:3,
                responsiveClass:true,
                responsive:{
                    0:{
                        items:1,
                        nav:true
                    },
                    600:{
                        items: 2,
                        nav:false
                    },
                    1000:{
                        items: 3,
                        nav:true,
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

        $('.add-to-cart').click(function(){
            $.ajax(
            {
                url: "{{ route('add-to-cart') }}",
                type: "POST",
                data: {
                    id : $(this).data('id')
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