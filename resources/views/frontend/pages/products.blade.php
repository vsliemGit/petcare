{{-- View này sẽ kế thừa giao diện từ `frontend.layouts.master` --}}
@extends('frontend.layouts.master')
@section('custom-css')
<style>
    .img-similar {
        width: 84px;
        height: 100px;
    }
    .img-quick-view {
        width: 50px;
        height: 50px;
    }
    .lSSlideOuter .lSPager .lSGallery img{
        display: block;
        height: 200px;
        max-width: 100%;
    }
    li.active {
        border: 1px solid #FE980F;
    }
    .product-information span span {
        font-size: 25px;
    }
    .product-information span input {
        border: 1px solid #FE980F;
    }
    .cart {
        margin-bottom: 10px;
        margin-left: 0px;
        display: block;
    } 
    .pagination li {
        border: none;
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
            <div class="col-sm-9 padding-right" id="main-contain-ajax">
                <!-- New products  -->
                @include('frontend.widgets.new-products')
                <div class="features_items"><!--features_items-->
                    <!-- List Products  -->
                    <h2 class="title text-center">LIST PRODUCTS</h2>
                    <div class="row" style="margin-bottom: 20px;">
                        <div class="col-md-4">
                            <label for="">{{ __('products.fil') }}</label>
                            <form action="">
                                @csrf
                                <select name="sort" id="sort" class="form-control">
                                    <option value="none">--{{__('products.none')}}--</option>
                                    <option value="desc">{{__('products.price_desc')}}</option>
                                    <option value="asc ">{{__('products.price_asc')}}</option>
                                    <option value="a_z ">{{__('products.name_asc')}}</option>
                                    <option value="z_a ">{{__('products.name_desc')}}</option>
                                </select>
                            </form>
                        </div>
                        <div class="col-sm-4">
                            {{-- <label for="">{{ __('products.range_price') }}</label>
                            <form action=""> --}}
                                {{-- @csrf --}}
                                {{-- <select name="rang_price" class="form-control">
                                    <option value="" selected hidden>--{{__('products.choose')}}--</option>
                                    <option value="1" data-min-price="10000" data-min-price="100000" >10.000đ - 100.000đ</option>
                                    <option value="2" data-min-price="100000" data-min-price="2000000" >100.000đ - 500.000đ</option>
                                    <option value="3" data-min-price="5000000" data-min-price="1000000" >500.000đ - 1000.000đ</option>
                                    <option value="4" data-min-price="1000000" data-min-price="2000000" >1000.000đ - 2000.000đ</option>
                                    <option value="4" data-min-price="1000000" data-min-price="2000000" >2000.000đ - 3000.000đ</option>
                                </select> --}}
                                {{-- <form class="form-inline" action="" method="GET">
                                    Min <input class="form-control" type="text" name="min_price">
                                    Max <input class="form-control" type="text" name="max_price">
                                    Keyword <input class="form-control" type="text" name="keyword" >
                                    <input class="btn btn-default" type="submit" value="Filter">
                                </form> --}}
                            </form>
                        </div>
                    </div>
                    <div id="list-products">
                        @include('frontend.widgets.list-products')
                    </div>
            </div><!--features_items-->   
            </div>        
        </div>     
    </div>
    <!-- Modal quickview  -->
    @include('frontend.widgets.modal-quickview')
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
                        nav:true,
                        loop:true
                    },
                    600:{
                        items: 2,
                        nav:false,
                        loop: true
                    },
                    1000:{
                        items: 3,
                        nav:true,
                        loop:true
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
        
        //Reset modal
        $('#imageGallery').on('hidden.bs.modal', function(e)
        { 
            $(this).removeData();
        });

        //Quickview Product
        $('.quickview').click(function(e){
            e.preventDefault();
            let product_id = $(this).data('product-id');
            $.ajax({
                url: "{{route('frontend.quickview')}}",
                method: 'GET',
                data: {
                    product_id : product_id
                }
            }).done(function(data){
                $('#modal_lable').text('Detail '+ data.product_name);
                $('#q_product_name').text(data.product_name);
                $('#q_product_id').text(product_id);
                $('#q_rating').html(data.rating);
                $('#product_id').val(product_id);
                $('#add-to-cart').data('id', product_id);
                $("#listImages").empty();
                $('#listImages').html(data.listImageOfProduct);
                $('#imageGallery').lightSlider({
                    gallery:true,
                    item:1,
                    loop:true,
                    thumbItem:3,
                    slideMargin:0,
                    enableDrag: false,
                    currentPagerPosition:'left',
                    onSliderLoad: function(el) {
                        el.lightGallery({
                            selector: '#imageGallery .lslide'
                        });
                    }   
                });  
                $('#q_img_product').attr("src",'storage/images/'+data.product_image);
                $('#q_product_brand').html(data.brand);
                $('#q_product_price').text("$"+new Intl.NumberFormat('en-IN', { maximumSignificantDigits: 3}).format(data.product_price));
                $('#q_product_desc').text(data.product_desc);
            }).fail(function(data){
                console.log(data);
            });
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
            $('#sl2').on('change', function(){
                console.log($('#sl2').data());
            });
            console.log($('#sl2').data());
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

        $('#price-range-submit').hide();

$("#min_price,#max_price").on('change', function () {

  $('#price-range-submit').show();

  var min_price_range = parseInt($("#min_price").val());

  var max_price_range = parseInt($("#max_price").val());

  if (min_price_range > max_price_range) {
    $('#max_price').val(min_price_range);
  }

  $("#slider-range").slider({
    values: [min_price_range, max_price_range]
  });

});


$("#min_price,#max_price").on("paste keyup", function () {            
  $('#price-range-submit').show();

  var min_price_range = parseInt($("#min_price").val());

  var max_price_range = parseInt($("#max_price").val());

  if(min_price_range == max_price_range){

    max_price_range = min_price_range + 100;

    $("#min_price").val(min_price_range);		
    $("#max_price").val(max_price_range);
  }

  $("#slider-range").slider({
    values: [min_price_range, max_price_range]
  });

});


$(function () {
  $("#slider-range").slider({
    range: true,
    orientation: "horizontal",
    min: 0,
    max: 10000,
    values: [0, 10000],
    step: 100,

    slide: function (event, ui) {
      if (ui.values[0] == ui.values[1]) {
        return false;
      }

      $("#min_price").val(ui.values[0]);
      $("#max_price").val(ui.values[1]);
    }
  });

  $("#min_price").val($("#slider-range").slider("values", 0));
  $("#max_price").val($("#slider-range").slider("values", 1));

});

$("#slider-range,#price-range-submit").click(function () {

  var min_price = $('#min_price').val();
  var max_price = $('#max_price').val();

  $("#searchResults").text("Here List of products will be shown which are cost between " + min_price  +" "+ "and" + " "+ max_price + ".");
});
    </script>
@endsection