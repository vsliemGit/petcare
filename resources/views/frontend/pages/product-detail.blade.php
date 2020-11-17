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

{{-- Content of index --}}
@section('main-content')
<section>
    <div class="container">
        <div class="row">
            <div class="col-sm-3">
                <!--Left-sidebar-->
                @include('frontend.widgets.left-sidebar')
            </div>
            <div class="col-sm-9 padding-right">
                <div class="product-details"><!--product-details-->
                    <div class="col-sm-5">
                        <div class="view-product">
                            <img src="{{ asset('storage/images/' . $product->product_image) }}" alt="" />
                            <h3>ZOOM</h3>
                        </div>
                        <div id="similar-product" class="carousel slide" data-ride="carousel">
                            @php
                                $imageToShow = 3;
                                $totalItem = ceil(count($listProductsRelatedToThisItem)/$imageToShow);
                            @endphp
                              <!-- Wrapper for slides -->
                                <div class="carousel-inner">
                                    <div class="item active">
                                    @foreach ($product->images as $image)
                                        <a href=""><img class="img-similar" src="{{ asset('storage/images/' . $image->getName() ) }}" alt=""></a>
                                    @if (($loop->index + 1) % $imageToShow == 0)
                                    </div>
                                        <div class="item">
                                    @endif
                                    @endforeach
                                    </div>
                                </div>
                              <!-- Controls -->
                              <a class="left item-control" href="#similar-product" data-slide="prev">
                                <i class="fa fa-angle-left"></i>
                              </a>
                              <a class="right item-control" href="#similar-product" data-slide="next">
                                <i class="fa fa-angle-right"></i>
                              </a>
                        </div>
                    </div>
                    <div class="col-sm-7">
                        <div class="product-information"><!--/product-information-->
                            <img src="vendor/frontend/images/product-details/new.jpg" class="newarrival" alt="" />
                            <h2>{{ $product->product_name }}</h2>
                            <p>Web ID: {{ $product->product_id }}</p>
                            <img src="vendor/frontend/images/product-details/rating.png" alt="" />
                            <span>
                                <span>${{ number_format($product->product_quantity) }}</span>
                                <form action="{{ route('add-to-cart') }}" method="post">
                                    @csrf
                                    <label>Quantity:</label>
                                    <input type="number" name="quantity" value="1" />
                                    <input type="hidden" name="product_id" value="{{ $product->product_id }}">
                                    <button type="submit" class="btn btn-fefault cart">
                                        <i class="fa fa-shopping-cart"></i>
                                        Add to cart
                                    </button>
                                </form>
                            </span>
                            <p><b>Availability:</b> In Stock</p>
                            <p><b>Condition:</b> New</p>
                            <p><b>Brand:</b> {{ $product->brand->brand_name }}</p>
                            <a href=""><img src="vendor/frontend/images/product-details/share.png" class="share img-responsive"  alt="" /></a>
                        </div><!--/product-information-->
                    </div>
                </div><!--/product-details-->
                
                <div class="category-tab shop-details-tab"><!--category-tab-->
                    <div class="col-sm-12">
                        <ul class="nav nav-tabs">
                            <li><a href="#details" data-toggle="tab">Details</a></li>
                            <li><a href="#features" data-toggle="tab">Features</a></li>
                            <li class="active"><a href="#reviews" data-toggle="tab">Reviews (5)</a></li>
                        </ul>
                    </div>
                    <div class="tab-content">
                        <div class="tab-pane fade" id="details" >
                            <div class="col-sm-12">
                                <p><b>Description:</b> {{ $product->product_desc }}</p>
                                <p><b>Quantity in stock:</b> {{ number_format($product->product_quantity) }}</p>
                                <p><b>Category:</b> {{ $product->category->pro_category_name }}</p>
                            </div>
                        </div>
                        
                        <div class="tab-pane fade" id="features" >
                            <div class="col-sm-12">
                                <p><b>Description:</b> {{ $product->product_desc }}</p>
                                <p><b>Quantity in stock:</b> {{ number_format($product->product_quantity) }}</p>
                                <p><b>Category:</b> {{ $product->category->pro_category_name }}</p>
                            </div>
                        </div>
                        
                        <div class="tab-pane fade active in" id="reviews" >
                            <div class="col-sm-12">
                                <ul>
                                    <li><a href=""><i class="fa fa-user"></i>EUGEN</a></li>
                                    <li><a href=""><i class="fa fa-clock-o"></i>12:41 PM</a></li>
                                    <li><a href=""><i class="fa fa-calendar-o"></i>31 DEC 2014</a></li>
                                </ul>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>
                                <p><b>Write Your Review</b></p>
                                
                                <form action="#">
                                    <span>
                                        <input type="text" placeholder="Your Name"/>
                                        <input type="email" placeholder="Email Address"/>
                                    </span>
                                    <textarea name="" ></textarea>
                                    <b>Rating: </b> <img src="vendor/frontend/images/product-details/rating.png" alt="" />
                                    <button type="button" class="btn btn-default pull-right">
                                        Submit
                                    </button>
                                </form>
                            </div>
                        </div>
                        
                    </div>
                </div><!--/category-tab-->
                
                <div class="recommended_items"><!--recommended_items-->
                    <h2 class="title text-center">Products related to this item</h2>
                    <div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
                        <div class="carousel-inner">
                            @php
                                $itemToShow = 3;
                                $totalItem = ceil(count($listProductsRelatedToThisItem)/$itemToShow);
                            @endphp                               
                            <div class="item active">
                            @foreach($listProductsRelatedToThisItem as $productRelated)                          
                                <div class="col-sm-4">
                                    <div class="product-image-wrapper">
                                        <div class="single-products">
                                            <div class="productinfo text-center">
                                                <img src="{{ asset('storage/images/' . $productRelated->product_image) }}" alt="" />
                                                <h2>${{ number_format($productRelated->product_price) }}</h2>
                                                <p>{{ $productRelated->product_name }}</p>
                                                <button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @if (($loop->index + 1) % $itemToShow == 0)
                            </div>
                            <div class="item">
                                @endif
                            @endforeach
                            </div>  
                        </div>
                         <a class="left recommended-item-control" href="#recommended-item-carousel" data-slide="prev">
                            <i class="fa fa-angle-left"></i>
                          </a>
                          <a class="right recommended-item-control" href="#recommended-item-carousel" data-slide="next">
                            <i class="fa fa-angle-right"></i>
                          </a>
                    </div>		
                </div><!--/recommended_items-->               
            </div>
        </div>
    </div>
@endsection

