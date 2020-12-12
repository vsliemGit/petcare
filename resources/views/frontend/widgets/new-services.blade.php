<div class="features_items new_products"><!--new_products-->
    <h2 class="title text-center">NEW SERVICES</h2>
    <div class="owl-carousel owl-theme">
        @foreach($topNewServices as $key => $service)
            <div class="product-image-wrapper">
                <div class="single-products">
                    <div class="productinfo text-center">
                        <img class="img-similar" src="{{ asset('storage/images/services/' . $service->service_image) }}"  style="width: 200px;" alt="" />
                        <h2>${{ number_format($service->service_price, 2)}} </h2>
                        <a href=""><h4 style="color: blue">{{ $service->service_name }}</h4></a>
                        {{-- <ul class="list-inline">
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
                        </ul> --}}
                        {{-- <p>{{$product->brand->brand_name}}</p>    --}}
                        {{-- <a href="#" class="btn btn-default"><i class="fa fa-shopping-cart"></i>Add to cart</a> --}}
                    </div>
                    <div class="product-overlay">
                        <div class="overlay-content">
                            <h2>${{ number_format($service->service_price, 0)}}</h2>
                            <a href=""><h4 >{{ $service->service_name }}</h4></a>
                 
                            <a href="#" data-id="{{ $service->service_id }}" class="btn btn-default add-to-cart"><i class="fa fa-eye"></i>Xem</a>
                        </div>
                    </div>
                    <img src="vendor/frontend/images/home/new.png" class="new" style="width: 50px;" alt="" />
                </div>
                <div class="choose">
                    <ul class="nav nav-pills nav-justified">
                        <li><a href="javascript:void(0)" data-id="{{$service->service_id}}" class="add-to-wishlist"><i class="fa fa-star"></i>Add to wishlist</a></li>
                        <li><a class="quickview"
                            data-toggle="modal"
                            data-target="#quickview"
                            data-service-id="{{$service->service_id}}"><i class="fa fa-eye"></i>Quick view</a></li>
                    </ul>
                </div>
            </div>  
        @endforeach
    </div>                
</div><!--new_products-->
<script>
    
    //Reset modal
    $('#imageGallery').on('hidden.bs.modal', function(e) { 
        $(this).removeData();
    });

</script>