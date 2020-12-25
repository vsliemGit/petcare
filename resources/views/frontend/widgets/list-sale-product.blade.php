<div class="features_items new_products"><!--new_products-->
    <h2 class="title text-center">SALE OFF</h2>
    <div class="owl-carousel owl-theme">
        @foreach($listSaleOff as $key => $product)
            <div class="product-image-wrapper">
                <div class="single-products">
                    <div class="productinfo text-center">
                        <img class="new-product-img" src="{{ asset('storage/images/' . $product->product_image) }}"  style="width: 100%;" alt="" />
                        <del><h4>{{ number_format($product->product_price, 2)}} vnđ</h4></del>
                        @php
                            $price_product = $product->product_price;
                            $condition = $product->sale->first()->sale_condition;
                            $number_sale = $product->sale->first()->sale_number;
                            $price_after_sale = 0;
                            if($condition == 0){
                                $price_sale = ($price_product*$number_sale)/100;
                                $total_after_sale = $price_product - $price_sale;	
                            }else{
                                $price_sale = $subTotal - $number_sale;
                                $total_after_coupon = ($price_sale > 0) ? $price_sale : 0;	
                            }
                        @endphp 
                        <h2 style="color: red;">{{ number_format($total_after_sale, 0)}} vnđ</h2>
                        <a href="{{ route('frontend.product_detail', ['id' => $product->product_id ]) }}"><h4 style="color: blue">{{ $product->product_name }}</h4></a>
                        <ul class="list-inline">
                            @for ($i = 1; $i <= 5; $i++)
                                @php  $color = ($i > $rating[$product->product_id]) ? "color: #ccc;" : "color: #ffcc00;"; @endphp
                                <li title="Sản phẩm được đánh giá 4 sao"
                                    class="rating"  style="cursor: pointer; {{$color}} font-size: 15px;"  >
                                &#9733
                                </li>  
                            @endfor                                          
                        </ul>
                        <p>{{$product->brand->brand_name}}</p>   
                    </div>
                    <div class="product-overlay">
                        <div class="overlay-content new-product-img">
                            <del><h4>{{ number_format($product->product_price, 0)}} vnđ</h4></del>
                            <h2 style="color: red;">{{ number_format($total_after_sale, 0)}} VNĐ</h2>
                            <a href="{{ route('frontend.product_detail', ['id' => $product->product_id ]) }}"><h4 >{{ $product->product_name }}</h4></a>
                            <p>{{$product->brand->brand_name}}</p>
                            <ul class="list-inline">
                                @for ($i = 1; $i <= 5; $i++)
                                    @php  $color = ($i > $rating[$product->product_id]) ? "color: #ccc;" : "color: #ffcc00;"; @endphp
                                    <li title="Sản phẩm được đánh giá 4 sao"
                                        class="rating"  style="cursor: pointer; {{$color}} font-size: 15px;"  >
                                    &#9733
                                    </li>  
                                @endfor                                          
                            </ul>
                            <a href="{{ route('frontend.product_detail', ['id' => $product->product_id ]) }}" data-id="{{ $product->product_id }}" class="btn btn-default add-to-cart">
                                <i class="fa fa-shopping-cart"></i>Xem ngay
                            </a>                            
                        </div>
                    </div>
                    <img src="vendor/frontend/images/home/sale.png" class="new" style="width: 42px; height: 42px;" alt="" />
                </div>
            </div>  
        @endforeach
    </div>                
</div><!--new_products-->
<script>
    //carousel
    $(document).ready(function(){
            $(".owl-carousel").owlCarousel({
                nav: false,
                items:3,
                responsiveClass:true,
                loop: true,
                autoplay:true,
                autoplayTimeout: 3000,
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
</script>