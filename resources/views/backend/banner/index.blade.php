{{-- View này sẽ kế thừa giao diện từ `backend.layouts.index` --}}
@extends('backend.layouts.index')

{{-- Thay thế nội dung vào Placeholder `title` của view `backend.layouts.index` --}}
@section('title')
Admin - Banner
@endsection

{{-- Thay thế nội dung vào Placeholder `main-content` của view `backend.layouts.index` --}}
@section('main-content')
<section class="wrapper">
    <div class="gallery">
		<h2 class="w3ls_head">List Banners</h2>
		<form action="{{route('banner.create')}}">
			<input type="submit" class="btn btn-primary" value="Add Banner" />
		</form>
		<div class="gallery-grids">
				<div class="gallery-top-grids">
					@foreach ($listBanners as $banner)
						<div class="col-sm-4 gallery-grids-left" id="banner_{{$banner->banner_id}}">
							<div class="gallery-grid">
								<a class="example-image-link" href="{{ asset('storage/images/banner/' . $banner->banner_image) }}" data-lightbox="example-set" data-title="Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus vitae cursus ligula">
									<img width="397px;" height="264px;" src="{{ asset('storage/images/banner/' . $banner->banner_image) }}" alt="" />
									<div class="captn">
										<h4>{{$banner->banner_name}}</h4>
										<p>{{$banner->banner_created_at}}</p>
										<form action="{{route('banner.destroy')}}" method="POST">
											@csrf
											<input type="hidden" name="banner_id" value="{{$banner->banner_id}}">
											<a href="javascript:void(0)" class="detele-item text-danger"><i class="fa fa-trash-o"></i> Delete</a>
										</form>
										<span id="banner_p_{{$banner->banner_id}}">
											<?php if($banner->banner_status == 1){ ?>
												<a data-id="{{$banner->banner_id}}" data-status="1" href="javascript:void(0)" class="change-item" ><span data-id="1"class="fa fa-check-square-o text-success text-active"> Show</span></a>
													  <?php  }else{ ?>  
												<a data-id="{{$banner->banner_id}}" data-status="0" href="javascript:void(0)" class="change-item" ><span class="fa  fa-square-o text"> Hide</span></a>
											<?php  } ?>
										</span>					
									</div>
								</a>
							</div>
						</div>
					@endforeach
				</div>
				<div class="clearfix"> </div>
		</div>
		<div class="col-md-12">
			{{ $listBanners->links()}}
		</div>		
	</div>
</section>
 <!-- footer -->
@include('backend.layouts.partials.footer')
{{-- <script src="{{ asset('vendor/backend/js/lightbox-plus-jquery.min.js') }}"></script> --}}
<script>
	 //Setup CSRF to AJAX
	 $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
	//Changing status of item
    $('body').on('click', '.change-item', function(){
      event.preventDefault();
	  var id = $(this).data('id');
      $.ajax({
        url : "{{route('banner.changeStatus')}}",
        method : 'POST',
        data : {
          id :$(this).data('id'),
          value : $(this).data('status')
        }
      }).done(function(data){
          $("#banner_p_"+id).empty().html(data.banner_p);
		console.log(data);
      }).error(function(data){
        console.log(data.message);
      });
    });

	//Submit form with a tag
	$('.detele-item').click(function(e){
		e.preventDefault();
		$(this).parent().submit();
	})
  
</script>
@endsection