<section id="slider"><!--slider-->
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div id="slider-carousel" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">
                        <li data-target="#slider-carousel" data-slide-to="0" class="active"></li>
                        <li data-target="#slider-carousel" data-slide-to="1"></li>
                        <li data-target="#slider-carousel" data-slide-to="2"></li>
                        <li data-target="#slider-carousel" data-slide-to="4"></li>
                    </ol>
                    
                    <div class="carousel-inner">                       
                        @foreach ($listBanners as $banner)
                            @if($loop->first)
                                <div class="item active">
                                    <img style="height: 450px; width: 1140px; margin: 0" src="storage/images/banner/{{$banner->banner_image}}" class="girl img-responsive" alt="" />
                                </div>
                            @else
                                <div class="item">
                                    <img style="height: 450px; width: 1140px; margin: 0p" src="storage/images/banner/{{$banner->banner_image}}" class="girl img-responsive" alt="" />
                                </div>
                            @endif
                        @endforeach
                    </div>
                    
                    <a href="#slider-carousel" class="left control-carousel hidden-xs" data-slide="prev">
                        <i class="fa fa-angle-left"></i>
                    </a>
                    <a href="#slider-carousel" class="right control-carousel hidden-xs" data-slide="next">
                        <i class="fa fa-angle-right"></i>
                    </a>
                </div>
                
            </div>
        </div>
    </div>
</section><!--/slider-->