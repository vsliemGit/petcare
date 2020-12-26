{{-- View này sẽ kế thừa giao diện từ `frontend.layouts.master` --}}
@extends('frontend.layouts.master')

{{-- Thay thế nội dung vào Placeholder `title` của view `frontend.layouts.index` --}}
@section('title')
Home | PETCARE
@endsection

@section('custom-css')
<style>
    .img-similar {
        width: 84px;
        height: 200px;
    }
  
</style>
@endsection

{{-- Content of index --}}
@section('main-content')
<!--Slider-->
@include('frontend.widgets.slider')
<section>
    <div class="container" > 
        <div class="flash-message">
            @foreach (['danger', 'warning', 'success', 'info'] as $msg)
              @if(Session::has('alert-' . $msg))
                <p id="flash-message" class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }} <a  href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
              @endif 
            @endforeach
        </div>
        <div class="row">
            <!--Left-sidebar-->
            <div class="col-sm-3">
                @include('frontend.widgets.left-sidebar')
            </div>         
            <div class="col-sm-9 padding-right" id="main-contain-ajax">
                <!-- New products  -->
                @include('frontend.widgets.new-products')

                <!-- Sale off  -->
                @include('frontend.widgets.list-sale-product')
                <div class="features_items"><!--features_items-->
                    <!-- List Products  -->
                    <h2 class="title text-center">LIST PRODUCTS</h2>
                    <div class="row" style="margin-bottom: 20px;">
                        <div class="col-md-4">
                            <label for="">{{ __('products.fil') }}</label>
                            <form action="">
                                @csrf
                                <select name="sort" id="sort" class="form-control">
                                    <option value="none">{{__('products.none')}}</option>
                                    <option value="desc">{{__('products.price_desc')}}</option>
                                    <option value="asc ">{{__('products.price_asc')}}</option>
                                    <option value="a_z ">{{__('products.name_asc')}}</option>
                                    <option value="z_a ">{{__('products.name_desc')}}</option>
                                </select>
                            </form>
                        </div>
                        {{-- <div class="col-md-4">
                            <label for="">{{ __('products.sort_price') }}</label>
                            <form action="">
                                @csrf
                                <select name="sort-price" id="sort-price" class="form-control">
                                    <option value="none">{{__('products.price_default')}}</option>
                                    <option value="desc">{{__('products.price_desc')}}</option>
                                    <option value="asc ">{{__('products.price_asc')}}</option>
                                </select>
                            </form>
                        </div> --}}
                    </div>
                    <div  id="list-products">
                        @include('frontend.widgets.list-products')
                    </div>
                </div><!--features_items--> 
                @include('frontend.widgets.new-services')
                              
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
    <!-- Modal quickview  -->
    @include('frontend.widgets.modal-quickview')
</section>
@endsection

@section('custom-scripts')
    <script>
        
        //Setup CSRF to AJAX
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        //Paginate list products using ajax
        $(window).on('hashchange', function() {
            if (window.location.hash) {
                var page = window.location.hash.replace('#', '');
                if (page == Number.NaN || page <= 0) {
                    return false;
                }else{
                    getData(page);
                }
            }
        });
        $(document).ready(function()
        {
            $(document).on('click', '.pagination a',function(event)
            {
                event.preventDefault();
                $('li').removeClass('active');
                $(this).parent('li').addClass('active');
                var page = $(this).attr('href').split('page=')[1];
                getData(page);
            });
        });
        function getData(page){
            var sortType = $("#sort").val();
            $.ajax({
                url: 'get_ajax_data?page='+page,
                method: 'GET',
                data: {
                    sort_type : sortType
                }                 
            }).done(function(data){
                $("#list-products").html(data);
                location.hash = page;
            }).fail(function(data){
                console.log(data);
                swal("Error!", "No response from server...", "error");
            });
        }
        //End paginate

        //Sort product
        $(document).ready(function(){
            $('#sort').on('change', function(){
                $.get( "{{route('sort')}}" , { value :  $('#sort').val() } , function( data ) {     
                    $("#list-product").empty().html(data);
                });
            }); 
        });

        //Get list product by category
        $(document).ready(function()
        {
            $('.search-products-by-category').on('click', function(){
                $("#brand_id_choosed").val("");
                var category_id = $(this).data('category-id');
                var category_name = $(this).text();
                $.get( "{{route('show_by_category')}}" , { category_id : category_id } , function( data ) {     
                    $("#main-contain-ajax").empty().html(data);
                    $("#name_by").text(category_name);
                    $("#category_id_choosed").val(category_id);
                }).fail(function(data) {
                    console.log(data);
                });
            }) ;
        });

        //Get list product by brand
        $(document).ready(function()
        {
            $('.search-products-by-brand').on('click', function(){
                $("#category_id_choosed").val("");
                var brand_id = $(this).data('brand-id');
                var brand_name = $(this).data('brand-name');
                $.get( "{{route('show_by_brand')}}" , { brand_id : brand_id } , function( data ) {     
                    $("#main-contain-ajax").empty().html(data);
                    $("#name_by").text('Brand '+brand_name);
                    $("#brand_id_choosed").val(brand_id);
                }).fail(function(data) {
                    console.log(data);
                });
            }) ;
        });
    </script>
@endsection

