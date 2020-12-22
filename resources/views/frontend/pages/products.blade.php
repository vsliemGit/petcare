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
            <!-- New products  -->
                @include('frontend.widgets.new-products')
            <div class="features_items" id="list-products"><!--features_items-->
                <!-- List Products  -->
                @include('frontend.widgets.list-products')
            </div><!--features_items-->           
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
            $.ajax({
                url: 'get_ajax_data?page='+page,
                method: 'GET',                
            }).done(function(data){
                $("#list-products").html(data);
                location.hash = page;
            }).fail(function(data){
                console.log(data);
                swal("Error!", "No response from server...", "error");
            });
        }
        //End paginate
    </script>
@endsection