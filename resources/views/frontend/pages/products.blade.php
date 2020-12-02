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
            <!-- New products  -->
                @include('frontend.widgets.new-products')
            <div class="features_items" id="list-products"><!--features_items-->
                <!-- List Products  -->
                @include('frontend.widgets.list-products')
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

        //Add product to Cart using ajax
        $('.add-to-cart').click(function(event){
            event.preventDefault();
            $.ajax(
            {
                url: "{{ route('add-to-cart') }}",
                type: "POST",
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


        //Add product to Cart using ajax
        $('.add-to-wishlist').click(function(event){
            event.preventDefault();
            $.ajax(
            {
                url: "{{ route('add-to-wishlist') }}",
                type: "POST",
                data: {
                    product_id : $(this).data('id')
                }
            }).done(function(data){
                realoadCountWishlist(data.itemInWishlist);
                swal('Success!', 'Add item to Wishlist successfully!.', 'success');
            }).fail(function(jqXHR, ajaxOptions, thrownError){
                swal("Error!", "No response from server...", "error");
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