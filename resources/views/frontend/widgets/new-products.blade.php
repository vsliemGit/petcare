<div class="features_items new_products"><!--new_products-->
    <h2 class="title text-center">NEW PRODUCTS</h2>
    <div class="owl-carousel owl-theme">
        @foreach($topThreeNewProducts as $key => $product)
            <div class="product-image-wrapper">
                <div class="single-products">
                    <div class="productinfo text-center">
                        <img src="{{ asset('storage/images/' . $product->product_image) }}"  style="width: 100%;" alt="" />
                        <h2>${{ number_format($product->product_price, 2)}} </h2>
                        <a href="{{ route('frontend.product_detail', ['id' => $product->product_id ]) }}"><h4 style="color: blue">{{ $product->product_name }}</h4></a>
                        <ul class="list-inline">
                            @for ($i = 1; $i <= 5; $i++)
                                @php
                                
                                    if ($i > $rating[$product->product_id]){
                                        $color = "color: #ccc;";
                                    }                                                       
                                    else {
                                        $color = "color: #ffcc00;";
                                    }    
                                @endphp
                                <li
                                    title="Sản phẩm được đánh giá 4 sao"
                                    class="rating"
                                    style="cursor: pointer;
                                    {{$color}}
                                    font-size: 15px;"
                                    >
                                &#9733
                                </li>  
                            @endfor                                          
                        </ul>
                        <p>{{$product->brand->brand_name}}</p>   
                        {{-- <a href="#" class="btn btn-default"><i class="fa fa-shopping-cart"></i>Add to cart</a> --}}
                    </div>
                    <div class="product-overlay">
                        <div class="overlay-content">
                            <h2>${{ number_format($product->product_price, 0)}}</h2>
                            <a href="{{ route('frontend.product_detail', ['id' => $product->product_id ]) }}"><h4 >{{ $product->product_name }}</h4></a>
                            <p>{{$product->brand->brand_name}}</p>
                            <a href="{{ route('frontend.product_detail', ['id' => $product->product_id ]) }}" data-id="{{ $product->product_id }}" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Xem ngay</a>                            
                        </div>
                    </div>
                    <img src="vendor/frontend/images/home/new.png" class="new" style="width: 42px; height: 42px;" alt="" />
                </div>
                {{-- <div class="choose">
                    <ul class="nav nav-pills nav-justified">
                        <li><a href="javascript:void(0)" data-id="{{$product->product_id}}" class="add-to-wishlist">
                            <i class="fa fa-heart-o"></i>Add to wishlist</a>
                        </li>
                        <li><a class="quickview" data-toggle="modal" data-target="#quickview" data-product-id="{{$product->product_id}}">
                            <i class="fa fa-eye"></i>Quick view</a>
                        </li>
                    </ul>
                </div> --}}
            </div>  
        @endforeach
    </div>                
</div><!--new_products-->
<script>
    //Add product to Cart using ajax
    $('.add-to-cart').click(function(event){
        event.preventDefault();
        var token = $('meta[name="csrf-token"]').attr('content');
        $.ajax(
        {
            url: "{{ route('add-to-cart') }}",
            type: "POST",
            data: {
                product_id : $(this).data('id'),
                _token: token 
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
            var token = $('meta[name="csrf-token"]').attr('content');
            $.ajax(
            {
                url: "{{ route('add-to-wishlist') }}",
                type: "POST",
                data: {
                    product_id : $(this).data('id'),
                    _token: token 
                }
            }).done(function(data){
                realoadCountWishlist(data.itemInWishlist);
                swal('Success!', 'Add item to Wishlist successfully!.', 'success');
            }).fail(function(jqXHR, ajaxOptions, thrownError){
                swal("Error!", "No response from server...", "error");
            });
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
            console.log(data);
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
</script>