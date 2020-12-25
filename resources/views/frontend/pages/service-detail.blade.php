{{-- View này sẽ kế thừa giao diện từ `frontend.layouts.master` --}}
@extends('frontend.layouts.master')

{{-- Thay thế nội dung vào Placeholder `title` của view `frontend.layouts.index` --}}
@section('title')
Service Single | PETCARE
@endsection

{{-- Content of index --}}
@section('main-content')
<div class="container">
    <div class="row">
        <div class="col-sm-3">
            <!--Left-sidebar-->
            @include('frontend.widgets.left-sidebar')
        </div>
        {{-- <div class="col-sm-9">
            <div class="blog-post-area">
                <h2 class="title text-center">Latest From our Blog</h2>
                <div class="single-blog-post">
                    <h3>Girls Pink T Shirt arrived in store</h3>
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
                        <img src="vendor/frontend/images/blog/blog-one.jpg" alt="">
                    </a>
                    <p>
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p> <br>

                    <p>
                        Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.</p> <br>

                    <p>
                        Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt.</p> <br>

                    <p>
                        Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem.
                    </p>
                    <div class="pager-area">
                        <ul class="pager pull-right">
                            <li><a href="#">Pre</a></li>
                            <li><a href="#">Next</a></li>
                        </ul>
                    </div>
                </div>
            </div><!--/blog-post-area-->

            <div class="rating-area">
                <ul class="ratings">
                    <li class="rate-this">Rate this item:</li>
                    <li>
                        <i class="fa fa-star color"></i>
                        <i class="fa fa-star color"></i>
                        <i class="fa fa-star color"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                    </li>
                    <li class="color">(6 votes)</li>
                </ul>
                <ul class="tag">
                    <li>TAG:</li>
                    <li><a class="color" href="">Pink <span>/</span></a></li>
                    <li><a class="color" href="">T-Shirt <span>/</span></a></li>
                    <li><a class="color" href="">Girls</a></li>
                </ul>
            </div><!--/rating-area-->

            <div class="socials-share">
                <a href=""><img src="vendor/frontend/images/blog/socials.png" alt=""></a>
            </div><!--/socials-share-->

            <div class="media commnets">
                <a class="pull-left" href="#">
                    <img class="media-object" src="vendor/frontend/images/blog/man-one.jpg" alt="">
                </a>
                <div class="media-body">
                    <h4 class="media-heading">Annie Davis</h4>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.  Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                    <div class="blog-socials">
                        <ul>
                            <li><a href=""><i class="fa fa-facebook"></i></a></li>
                            <li><a href=""><i class="fa fa-twitter"></i></a></li>
                            <li><a href=""><i class="fa fa-dribbble"></i></a></li>
                            <li><a href=""><i class="fa fa-google-plus"></i></a></li>
                        </ul>
                        <a class="btn btn-primary" href="">Other Posts</a>
                    </div>
                </div>
            </div><!--Comments-->
            <div class="response-area">
                <h2>3 RESPONSES</h2>
                <ul class="media-list">
                    <li class="media">
                        
                        <a class="pull-left" href="#">
                            <img class="media-object" src="vendor/frontend/images/blog/man-two.jpg" alt="">
                        </a>
                        <div class="media-body">
                            <ul class="sinlge-post-meta">
                                <li><i class="fa fa-user"></i>Janis Gallagher</li>
                                <li><i class="fa fa-clock-o"></i> 1:33 pm</li>
                                <li><i class="fa fa-calendar"></i> DEC 5, 2013</li>
                            </ul>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.  Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                            <a class="btn btn-primary" href=""><i class="fa fa-reply"></i>Replay</a>
                        </div>
                    </li>
                    <li class="media second-media">
                        <a class="pull-left" href="#">
                            <img class="media-object" src="vendor/frontend/images/blog/man-three.jpg" alt="">
                        </a>
                        <div class="media-body">
                            <ul class="sinlge-post-meta">
                                <li><i class="fa fa-user"></i>Janis Gallagher</li>
                                <li><i class="fa fa-clock-o"></i> 1:33 pm</li>
                                <li><i class="fa fa-calendar"></i> DEC 5, 2013</li>
                            </ul>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.  Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                            <a class="btn btn-primary" href=""><i class="fa fa-reply"></i>Replay</a>
                        </div>
                    </li>
                    <li class="media">
                        <a class="pull-left" href="#">
                            <img class="media-object" src="vendor/frontend/images/blog/man-four.jpg" alt="">
                        </a>
                        <div class="media-body">
                            <ul class="sinlge-post-meta">
                                <li><i class="fa fa-user"></i>Janis Gallagher</li>
                                <li><i class="fa fa-clock-o"></i> 1:33 pm</li>
                                <li><i class="fa fa-calendar"></i> DEC 5, 2013</li>
                            </ul>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.  Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                            <a class="btn btn-primary" href=""><i class="fa fa-reply"></i>Replay</a>
                        </div>
                    </li>
                </ul>					
            </div><!--/Response-area-->
            <div class="replay-box">
                <div class="row">
                    <div class="col-sm-4">
                        <h2>Leave a replay</h2>
                        <form>
                            <div class="blank-arrow">
                                <label>Your Name</label>
                            </div>
                            <span>*</span>
                            <input type="text" placeholder="write your name...">
                            <div class="blank-arrow">
                                <label>Email Address</label>
                            </div>
                            <span>*</span>
                            <input type="email" placeholder="your email address...">
                            <div class="blank-arrow">
                                <label>Web Site</label>
                            </div>
                            <input type="email" placeholder="current city...">
                        </form>
                    </div>
                    <div class="col-sm-8">
                        <div class="text-area">
                            <div class="blank-arrow">
                                <label>Your Name</label>
                            </div>
                            <span>*</span>
                            <textarea name="message" rows="11"></textarea>
                            <a class="btn btn-primary" href="">post comment</a>
                        </div>
                    </div>
                </div>
            </div><!--/Repaly Box-->
        </div> --}}
        <div class="col-sm-9">
            <div>{!! $service_detail->service_detail_content !!}</div>
            <div class="col-sm-12" style="margin-bottom: 20px; ">
                <a class="btn btn-primary"  style="width: 300px;" href="{{route('frontend.show_order_service')}}">Đặt lịch ngay</a>
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