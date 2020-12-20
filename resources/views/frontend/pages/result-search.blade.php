{{-- View này sẽ kế thừa giao diện từ `frontend.layouts.master` --}}
@extends('frontend.layouts.master')

{{-- Thay thế nội dung vào Placeholder `title` của view `frontend.layouts.index` --}}
@section('title')
About us | PETCARE
@endsection

@section('custom-css')
<style>

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
            <div class="col-sm-9">
                <div class="features_items">
                    <h2 class="title text-center">{{__('header.title_result_search')}}</h2>
                    @if($product_founds->count()>0)
                        <h4>Sản phẩm được tìm thấy</h4>
                        @foreach($product_founds as $key => $product)
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
                    @endif
                    @if($service_founds->count()>0)
                    <div class="blog-post-area">
                        <div class="single-blog-post">
                            <h4>Dich vụ được tìm thấy</h4>
                            @foreach ($service_founds as $service)
                            <div class="single-blog-post">
                                <h3>{{$service->service_name}}</h3>
                                <div class="post-meta">
                                    <ul>
                                        <li><i class="fa fa-user"></i> Mac Doe</li>
                                        <li><i class="fa fa-clock-o"></i> 1:33 pm</li>
                                        <li><i class="fa fa-calendar"></i> DEC 5, 2013</li>
                                    </ul>
                                    <span>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star-half-o"></i>
                                    </span> 
                                </div>
                                <a href="">
                                    <img src="storage\images\services\service_details\{{$service->service_detail_image}}" alt="">
                                </a>
                                <p>{{$service->service_desc}}</p>
                                <a  class="btn btn-primary" href="{{route('servies.service_single', ['id' => $service->service_detail_id])}}">Xem ngay</a>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    @endif
                    @if (($product_founds->count()<0))
                        <h4>Không tìm thấy kết quả tìm kiếm phù hợp</h4>
                    @endif
                </div>
            </div>
                  
        </div>     
    </div>
</section>
@endsection