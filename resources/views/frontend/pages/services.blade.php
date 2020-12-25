{{-- View này sẽ kế thừa giao diện từ `frontend.layouts.master` --}}
@extends('frontend.layouts.master')

{{-- Thay thế nội dung vào Placeholder `title` của view `frontend.layouts.index` --}}
@section('title')
About us | PETCARE
@endsection

{{-- Content of index --}}
@section('main-content')
<div class="container">
    <div class="row">
        <div class="col-sm-3">
            <!--Left-sidebar-->
            @include('frontend.widgets.left-sidebar')
        </div>
        <div class="col-sm-9">
            <div class="blog-post-area">
                <h2 class="title text-center">Services</h2>
                @foreach ($listServices as $service)
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
                <div class="pagination col-sm-12 col-lg-12" style="margin-top: 20px;">
                    {{ $listServices->links() }}
                </div>
            </div>
        </div>    
    </div>     
</div>
@endsection

@section('custom-scripts')
<script>
    //Get list product by category
    $(document).ready(function()
        {
            $('.search-products-by-category').on('click', function(){
                $("#brand_id_choosed").val("");
                var category_id = $(this).data('category-id');
                var category_name = $(this).text();
                $.get( "{{route('show_by_category')}}" , { category_id : category_id } , function( data ) {     
                    $("#main-contain-ajax").empty().html(data);
                    $("#name_by").text(category_name);
                    $("#category_id_choosed").val(category_id);
                }).fail(function(data) {
                    console.log(data);
                });
            }) ;
        });

        //Get list product by brand
        $(document).ready(function()
        {
            $('.search-products-by-brand').on('click', function(){
                $("#category_id_choosed").val("");
                var brand_id = $(this).data('brand-id');
                var brand_name = $(this).data('brand-name');
                $.get( "{{route('show_by_brand')}}" , { brand_id : brand_id } , function( data ) {     
                    $("#main-contain-ajax").empty().html(data);
                    $("#name_by").text('Brand '+brand_name);
                    $("#brand_id_choosed").val(brand_id);
                }).fail(function(data) {
                    console.log(data);
                });
            }) ;
        });
</script>
@endsection