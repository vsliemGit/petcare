<div class="features_items new_products"><!--new_products-->
    <h2 class="title text-center">NEW SERVICES</h2>
    <div class="owl-carousel owl-theme">
        @foreach($topNewServices as $key => $service)
        <div class="card" style="width: 100%; margin-left: 10px;">
            <img class="card-img-top" src="{{ asset('storage/images/services/' . $service->service_image) }}" alt="Card image cap">
            <div class="card-body">
              <h5 class="card-title">{{ $service->service_name }}</h5>
              <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
              <a href="#" class="btn btn-primary">Order service now</a>
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