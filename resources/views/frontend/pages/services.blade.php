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
                        <img src="storage\images\services\service_details/{{$service->service_detail_image}}" alt="">
                    </a>
                    <p>{{$service->service_desc}}</p>
                    <a  class="btn btn-primary" href="{{route('servies.service_single', ['id' => $service->service_detail_id])}}">Đặt lịch ngay</a>
                </div>
                @endforeach
                <div class="pagination-area">
                    <ul class="pagination">
                        <li><a href="" class="active">1</a></li>
                        <li><a href="">2</a></li>
                        <li><a href="">3</a></li>
                        <li><a href=""><i class="fa fa-angle-double-right"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>    
    </div>     
</div>
@endsection