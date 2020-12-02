<div class="features_items new_products"><!--new_products-->
    <h2 class="title text-center">NEW PRODUCTS</h2>
    <div class="owl-carousel owl-theme">
        @foreach($topThreeNewProducts as $key => $product)
            <div class="product-image-wrapper">
                <div class="single-products">
                    <div class="productinfo text-center">
                        <img src="{{ asset('storage/images/' . $product->product_image) }}"  style="width: 200px;" alt="" />
                        <h2>${{ number_format($product->product_price, 2)}} </h2>
                        <p>{{ $product->product_name }}</p>
                        <a href="#" class="btn btn-default"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                    </div>
                    <div class="product-overlay">
                        <div class="overlay-content">
                            <h2>${{ number_format($product->product_price, 0)}}</h2>
                            <p>{{ $product->product_name }}</p>
                            <a href="#" data-id="{{ $product->product_id }}" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                        </div>
                    </div>
                    <img src="vendor/frontend/images/home/new.png" class="new" style="width: 50px;" alt="" />
                </div>
                <div class="choose">
                    <ul class="nav nav-pills nav-justified">
                        <li><a href="#"><i class="fa fa-star"></i>Add to wishlist</a></li>
                        <li><a href="#"><i class="fa fa-eye"></i>Quick view</a></li>
                    </ul>
                </div>
            </div>  
        @endforeach
    </div>                
</div><!--new_products-->