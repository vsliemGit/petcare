<div class="features_items new_products"><!--new_products-->
    <h2 class="title text-center">NEW SERVICES</h2>
    <div class="owl-carousel owl-theme">
        @foreach($topNewServices as $key => $service)
        <div class="product-image-wrapper">
            <div class="single-products">
                <div class="productinfo text-center">
                    <img src="{{ asset('storage/images/services/' . $service->service_image) }}"  style="width: 100%; height: 300px;" alt="" />
                    {{-- <h2>${{ number_format($service->service_price, 2)}} </h2> --}}
                    {{-- <a href=""><h4 style="color: blue">{{ $service->service_name }}</h4></a> --}}
                </div>
                <img src="vendor/frontend/images/home/sale.png" class="new" style="width: 42px; height: 42px;" alt="" />
            </div>
            <div class="card-body">
                <h5 class="card-title">{{ $service->service_name }}</h5>
                <p class="card-text" 
                style="display: -webkit-box;  max-width: 250px; -webkit-line-clamp: 3; -webkit-box-orient: vertical; overflow: hidden;">
                {{ $service->service_desc }}</p>
                <a href="" class="btn btn-primary">Xem ngay</a>
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