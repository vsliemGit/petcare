<h2 class="title text-center">LIST PRODUCTS</h2>
@foreach($listProducts as $key => $product)
    <div class="col-sm-6 col-lg-3">
        <div class="product-image-wrapper cart-product">
            <div class="single-products">
                <div class="productinfo text-center">
                    <img src="{{ asset('storage/images/' . $product->product_image) }}" alt="" />
                    <h2>${{ number_format($product->product_price, 2)}} </h2>
                    <a href="{{ route('frontend.product_detail', ['id' => $product->product_id ]) }}"><h4 style="color: blue">{{ $product->product_name }}</h4></a>
                    <button type="button" class="btn btn-fefault add-to-cart" data-id="{{$product->product_id}}">
                        <i class="fa fa-shopping-cart"></i>
                        Add to cart
                    </button>
                </div>
            </div>
            <div class="choose">
                <ul class="nav nav-pills nav-justified">
                    <li><a href="#"><i class="fa fa-plus-square"></i>Wishlist</a></li>
                    <li><a href="#"><i class="fa fa-eye"></i>Detail</a></li>
                </ul>
            </div>
        </div>
    </div>  
@endforeach  
<ul class="pagination col-sm-12 col-lg-12">
    {{ $listProducts->links() }}
</ul> 
    
