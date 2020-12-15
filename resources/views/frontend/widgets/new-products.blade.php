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
                            <a href="{{ route('frontend.product_detail', ['id' => $product->product_id ]) }}" data-id="{{ $product->product_id }}" class="btn btn-default add-to-cart">
                                <i class="fa fa-shopping-cart"></i>Xem ngay
                            </a>                            
                        </div>
                    </div>
                    <img src="vendor/frontend/images/home/new.png" class="new" style="width: 42px; height: 42px;" alt="" />
                </div>
            </div>  
        @endforeach
    </div>                
</div><!--new_products-->
<script>
    //Reset modal
    $('#imageGallery').on('hidden.bs.modal', function(e) { $(this).removeData();});
</script>