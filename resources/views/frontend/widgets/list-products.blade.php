<h2 class="title text-center">LIST PRODUCTS</h2>
@foreach($listProducts as $key => $product)
    <div class="col-sm-6 col-lg-3">
        <div class="product-image-wrapper cart-product">
            <div class="single-products">
                <div class="productinfo text-center">
                    <img src="{{ asset('storage/images/' . $product->product_image) }}" alt="" />
                    <h2>${{ number_format($product->product_price, 2)}} </h2>
                    <a href="{{ route('frontend.product_detail', ['id' => $product->product_id ]) }}"><h4 style="color: blue">{{ $product->product_name }}</h4></a>
                    <ul class="list-inline">
                        @for ($i = 1; $i <= 5; $i++)
                            @php  $color = ($i > $rating[$product->product_id])  ? "color: #ccc;" : "color: #ffcc00;"   ; @endphp
                            <li title="Sản phẩm được đánh giá {{ round($rating[$product->product_id]) }} sao"
                                class="rating" style="cursor: pointer; {{$color}}
                                font-size: 15px;"
                                >
                            &#9733
                            </li>  
                        @endfor                                       
                    </ul>
                    <p class="message_product_{{$product->product_id}}">{{$product->brand->brand_name}}</p>  
                    <button type="button" class="btn btn-fefault add-to-cart" data-id="{{$product->product_id}}">
                        <i class="fa fa-shopping-cart"></i>
                        Add to cart
                    </button>           
                </div>
            </div>
            <div class="choose">
                <ul class="nav nav-pills nav-justified">
                    <li><a href="javascript:void(0)" data-id="{{$product->product_id}}" class="add-to-wishlist">
                        <i class="fa fa-heart-o"></i>Wishlist</a>
                    </li>
                    <li><a href="" class="quickview" data-toggle="modal" data-target="#quickview" data-product-id="{{$product->product_id}}">
                        <i class="fa fa-eye"></i>Detail</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>  
@endforeach 
<ul class="pagination col-sm-12 col-lg-12">
    {{ $listProducts->links() }}
</ul>
<script>
    //Add product to Cart using ajax
    $('.add-to-cart').click(function(event){
        event.preventDefault();
        $( this ).prop( "disabled", true );
        let token = $('meta[name="csrf-token"]').attr('content');
        let product_id =  $(this).data('id');
        $.ajax(
        {
            url: "{{ route('add-to-cart') }}",
            type: "POST",
            data: {
                product_id : product_id,
                _token: token 
            }
        }).done(function(data){
            if(data.code == 200){
                realoadCountCart(data.itemInCart);
                $( ".message_product_"+product_id).html('<span style="font-size: 13px; font-style: italic;">'+data.message+'<a href="{{ route("shopping_cart") }}">Cart</a></span>');
            }else{
                $( ".message_product_"+product_id).html('<span style="font-size: 13x;" font-style: italic;>'+data.message+' <a href="{{ route("shopping_cart") }}">Cart</a></span>');
            }
        }).fail(function(jqXHR, ajaxOptions, thrownError){
            swal("Error!", "No response from server...", "error");
        });
    });
    
    //Add product to Cart using ajax
    $('.add-to-wishlist').click(function(event){
            event.preventDefault();
            $( this ).prop( "disabled", true );
            let token = $('meta[name="csrf-token"]').attr('content');
            let product_id =  $(this).data('id');
            $.ajax(
            {
                url: "{{ route('add-to-wishlist') }}",
                type: "POST",
                data: {
                    product_id : product_id,
                    _token: token 
                }
            }).done(function(data){
                if(data.code == 200){
                    realoadCountWishlist(data.itemInWishlist);
                    $( ".message_product_"+product_id).html('<span style="font-size: 12px; font-style: italic;">'+data.message+'<a href="{{ route("wishlist") }}">Wishlist</a></span>');
                }else{
                    $( ".message_product_"+product_id).html('<span style="font-size: 12px; font-style: italic;">'+data.message+' <a href="{{ route("wishlist") }}">Wishlist</a></span>');
                }
            }).fail(function(jqXHR, ajaxOptions, thrownError){
                swal("Error!", "No response from server...", "error");
            });
    });  
    //Reset modal
    $('#imageGallery').on('hidden.bs.modal', function(e) { $(this).removeData(); });

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
        }).fail(function(e){
            console.log(e);
        });
    });

</script>
    
