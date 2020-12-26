{{-- View này sẽ kế thừa giao diện từ `frontend.layouts.master` --}}
@extends('frontend.layouts.master')

@section('custom-css')
<style>
    .img-similar {
        width: 84px;
        height: 84px;
    }

    .comment {
        border: 2px solid #dedede;
        background-color: #f1f1f1;
        border-radius: 5px;
        padding: 10px;
        margin: 10px 0;
    }

    .comment img {
        float: left;
        max-width: 60px;
        width: 100%;
        margin-right: 20px;
        border-radius: 50%;
    }
    .comment::after {
        content: "";
        clear: both;
        display: table;
    }
    .time-right {
        float: right;
        color: #aaa;
    }
    /*gallary image*/
    .lSSlideOuter .lSPager .lSGallery img{
        display: block;
        height: 140px;
        max-width: 100%;
    }
    li.active {
        border: 1px solid #FE980F;
    }
</style>
@endsection

{{-- Content of index --}}
@section('main-content')
<section>
    <div class="container">
        <div class="row">
            <div class="col-sm-3">
                <!--Left-sidebar-->
                @include('frontend.widgets.left-sidebar')
            </div>
            <div class="col-sm-9 padding-right" id="main-contain-ajax">
                <div class="product-details"><!--product-details-->
                    <div class="col-sm-5">
                        <ul id="imageGallery">
                            <li style="height: 300px;" data-thumb="{{ asset('storage/images/' . $product->product_image) }}" data-src="{{ asset('storage/images/' . $product->product_image) }}"><img width="100%" src="{{ asset('storage/images/' . $product->product_image) }}" /></li>
                            @foreach ($product->images as $image)
                            <li data-thumb="{{ asset('storage/images/'.$image->img_name.'') }}" data-src="{{ asset('storage/images/'.$image->img_name.'') }}">
                                <img width="100%" alt="{{$image->img_name}}" src="{{ asset('storage/images/'.$image->img_name.'') }}" />
                            </li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="col-sm-7">
                        <div class="product-information"><!--/product-information-->
                            <img src="vendor/frontend/images/product-details/new.jpg" class="newarrival" alt="" />
                            <h2>{{ $product->product_name }}</h2>
                            <p>Web ID: {{ $product->product_id }}</p>
                            <ul class="list-inline">
                                @for ($i = 1; $i <= 5; $i++)
                                    @php  $color = ($i > $rating)  ? "color: #ccc;" : "color: #ffcc00;"   ; @endphp
                                    <li title="Sản phẩm được đánh giá {{$rating}} sao"
                                        class="rating" style="cursor: pointer; {{$color}} font-size: 25px;">
                                    &#9733
                                    </li>  
                                @endfor                                          
                            </ul>
                            <form action="{{ route('add-to-cart') }}" method="post" id="add-cart-form">
                                <span>  
                                    @if($product->sale->count()>0)
                                        @php
                                            $price_product = $product->product_price;
                                            $condition = $product->sale->first()->sale_condition;
                                            $number_sale = $product->sale->first()->sale_number;
                                            $price_after_sale = 0;
                                            if($condition == 0){
                                                $price_sale = ($price_product*$number_sale)/100;
                                                $total_after_sale = $price_product - $price_sale;	
                                            }else{
                                                $price_sale = $price_product - $number_sale;
                                                $total_after_sale = ($price_sale > 0) ? $price_sale : 0;	
                                            }
                                        @endphp 
                                        <del>{{ number_format($product->product_price) }} vnđ</del>
                                        <h3 style="color: red;">{{ number_format($total_after_sale, 0)}} vnđ</h3>
                                    @else
                                        <span>{{ number_format($product->product_price) }} vnđ</span>
                                    @endif
                                        {{-- <span>{{ number_format($product->product_price) }} vnđ</span> --}}
                                        <label>Quantity:</label>
                                        <input type="hidden" id="product_id" name="product_id" value="{{$product->product_id}}">
                                        <input type="number" name="quantity" value="1" />
                                        <button type="submit" class="btn btn-fefault cart" id="add-to-cart" data-id="{{$product->product_id}}">
                                            <i class="fa fa-shopping-cart"></i>
                                            Add to cart
                                        </button>
                                </span>
                                <p class="message_product_{{$product->product_id}}"></p>  
                            </form>
                            <p><b>Availability:</b> In Stock</p>
                            <p><b>Condition:</b> New</p>
                            <p><b>Brand:</b> {{ $product->brand->brand_name }}</p>
                            <a href=""><img src="vendor/frontend/images/product-details/share.png" class="share img-responsive"  alt="" /></a>
                        </div><!--/product-information-->
                    </div>
                </div><!--/product-details-->
                
                <div class="category-tab shop-details-tab"><!--category-tab-->
                    <div class="col-sm-12">
                        <ul class="nav nav-tabs">
                            <li><a href="#details" data-toggle="tab">Details</a></li>
                            <li><a href="#brand" data-toggle="tab">Brand</a></li>
                            <li class="active"><a href="#reviews" data-toggle="tab">Reviews ({{$comments_count}})</a></li>
                        </ul>
                    </div>
                    <div class="tab-content">
                        <div class="tab-pane fade" id="details" ><!--detail-->
                            <div class="col-sm-12">
                                <p><b>Description:</b> {{ $product->product_desc }}</p>
                                <p><b>Quantity in stock:</b> {{ number_format($product->product_quantity) }}</p>
                                <p><b>Category:</b> {{ $product->category->pro_category_name }}</p>
                                <div>{!! $product->detail->product_detail_content !!}</div>
                            </div>
                        </div>
                        
                        <div class="tab-pane fade" id="brand" ><!--features-->
                            <div class="col-sm-12">
                                <div>{!! $product->brand->brand_desc !!}</div>
                            </div>
                        </div>
                        
                        <div class="tab-pane fade active in" id="reviews" ><!--reviews-->
                            <div class="col-sm-12">
                                <ul>
                                    <li><a href=""><i class="fa fa-user"></i>EUGEN</a></li>
                                    <li><a href=""><i class="fa fa-clock-o"></i>12:41 PM</a></li>
                                    <li><a href=""><i class="fa fa-calendar-o"></i>31 DEC 2014</a></li>
                                </ul>
                                <div id="comment-show">
                                </div>              
                                <br>                               
                                <form id="add-comment" action="{{ route('add_comment') }}" method="POST" >
                                    <input type="hidden" name="product_id" value="{{$product->product_id}}">
                                    @if (!Auth::guard('customer')->check())
                                        <span>
                                            <input type="text" name="name" placeholder="Your Name"/>
                                            <input type="email" name="email" placeholder="Email Address"/>
                                        </span>                                                                                   
                                    @endif
                                    <textarea class="content_comment" name="comment" ></textarea>
                                    <b>Rating: </b> <input type="hidden" id="rating" name="rating" value="0">
                                        {{-- <img src="vendor/frontend/images/product-details/rating.png" alt="" />   --}}
                                        <ul class="list-inline">
                                            @for ($i = 1; $i <= 5; $i++)
                                                @php
                                                    if ($i > $rating){
                                                        $color = "color: #ccc;";
                                                    }                                                       
                                                    else {
                                                        $color = "color: #ffcc00;";
                                                    }    
                                                @endphp
                                                <li
                                                    id="{{$product->product_id}}-{{$i}}"
                                                    title="Đánh giá {{$i}} sao"
                                                    data-index = "{{$i}}"
                                                    data-product_id = "{{$product->product_id}}"
                                                    class="rating"
                                                    style="cursor: pointer;
                                                    color: #ccc;
                                                    font-size: 25px;"
                                                    >
                                                &#9733
                                                </li>  
                                            @endfor                                          
                                        </ul>
                                    <button type="submit" class="btn btn-default pull-right">
                                        Comment
                                    </button>
                                </form>
                            </div>
                        </div>
                        
                    </div>
                </div><!--/category-tab-->
                
                <div class="recommended_items"><!--recommended_items-->
                    <h2 class="title text-center">Products related to this item</h2>
                    <div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
                        <div class="carousel-inner">
                            @php
                                $itemToShow = 3;
                                $totalItem = ceil(count($listProductsRelatedToThisItem)/$itemToShow);
                            @endphp                               
                            <div class="item active">
                            @foreach($listProductsRelatedToThisItem as $productRelated)                          
                                <div class="col-sm-4">
                                    <div class="product-image-wrapper">
                                        <div class="single-products">
                                            <div class="productinfo text-center">
                                                <img src="{{ asset('storage/images/' . $productRelated->product_image) }}" alt="" />
                                                <h2>${{ number_format($productRelated->product_price) }}</h2>
                                                <p style="color: blue;">{{ $productRelated->product_name }}</p>
                                                <p><b>Brand:</b> {{ $product->brand->brand_name }}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @if (($loop->index + 1) % $itemToShow == 0)
                            </div>
                            <div class="item">
                                @endif
                            @endforeach
                            </div>  
                        </div>
                         <a class="left recommended-item-control" href="#recommended-item-carousel" data-slide="prev">
                            <i class="fa fa-angle-left"></i>
                          </a>
                          <a class="right recommended-item-control" href="#recommended-item-carousel" data-slide="next">
                            <i class="fa fa-angle-right"></i>
                          </a>
                    </div>		
                </div><!--/recommended_items-->               
            </div>
        </div>
    </div>
@endsection

@section('custom-scripts')
<script>
        //Rating product
        $(document).on('click', '.rating', function(){
            let index = $(this).data('index');
            let product_id = $(this).data('product_id');
            // let rating = $(this).data('rating');
            resetRating(product_id);
            for (let i = 0; i <= index; i++) {
                $('#'+product_id+'-'+i).css('color', '#ffcc00');
            }
            $('#rating').val(index);
        });

        function resetRating(product_id){
            for (let i = 0; i <= 5; i++) {
                $('#'+product_id+'-'+i).css('color', '#ccc');
            }
        }

        //LightGallery    
        $(document).ready(function() {
            $('#imageGallery').lightSlider({
                gallery:true,
                item:1,
                loop:true,
                thumbItem:4,
                slideMargin:0,
                enableDrag: false,
                currentPagerPosition:'left',
                onSliderLoad: function(el) {
                    el.lightGallery({
                        selector: '#imageGallery .lslide'
                    });
                }   
            });  
        });

        //Setup CSRF to AJAX
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $(document).ready(function(){
            loadComment();
        });
        
        //Load comment
        function loadComment(){
            let product_id = $('#product_id').val();
            $.ajax({
                url: "{{ route('load_comment') }}",
                method: "POST",
                data: {
                    product_id : product_id
                },
            }).done(function(data){
                $('#comment-show').html(data);
            }).fail(function(data){
                console.log(data);
            });
        }

        //Add comment
        $("#add-comment").submit(function(e){
            e.preventDefault(); // avoid to execute the actual submit of the form.
            var form = $(this);
            var url = form.attr('action');
            $.ajax(
            {
                url: url,
                type: "POST",
                data: form.serialize(),
            }).done(function(data){               
                swal('Success!', data.message, data.type);
                loadComment();
                form.find(".content_comment").val("");
            }).fail(function(jqXHR, ajaxOptions, thrownError){
                swal("Error!", data.message , "error");
            });

        });

        $("#add-cart-form").submit(function(e){
            e.preventDefault(); // avoid to execute the actual submit of the form.
            let form = $(this);
            let product_id =  $('#product_id').val();
            let url = form.attr('action');
            $.ajax(
            {
                url: url,
                type: "POST",
                data: form.serialize(),
            }).done(function(data){           
                if(data.code == 200){
                    realoadCountCart(data.itemInCart);
                    $( ".message_product_"+product_id).html('<p style="font-size: 15px; font-style: italic; padding-bottom: 10px;">'+data.message+'<a href="{{ route("shopping_cart") }}">Cart</a>');
                }else{
                    $( ".message_product_"+product_id).html('<p style="font-size: 15px; font-style: italic; padding-bottom: 10px;">'+data.message+' <a href="{{ route("shopping_cart") }}">Cart</a>');
                }
            }).fail(function(jqXHR, ajaxOptions, thrownError){
                swal("Error!", "No response from server...", "error");
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

