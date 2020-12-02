<div class="tab-content" id="list-products-by-brands">
    @foreach ($listProducts as $product)
        <div class="col-sm-3"><!--product-->
            <div class="product-image-wrapper">
                <div class="single-products">
                    <div class="productinfo text-center">
                        <img src="{{ asset('storage/images/' . $product->product_image) }}" alt="{{ $product->product_image }}" />
                        <h2>${{ number_format($product->product_price) }}</h2>
                        <a href="{{ route('frontend.product_detail', ['id' => $product->product_id ]) }}"><h4 style="color: blue">{{ $product->product_name }}</h4></a>
                        <a href="#" data-id="{{ $product->product_id }}"  class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                    </div>
                    <div class="choose">
                        <ul class="nav nav-pills nav-justified">
                            <li><a href="#"><i class="fa fa-star"></i>Wishlist</a></li>
                            <li><a href="#"><i class="fa fa-eye"></i>Detail</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div><!--product-->
    @endforeach
</div>
<ul class="pagination">
    {{ $listProducts->links() }}
</ul> 