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
		<h2 class="w3ls_head">Gallery</h2>
		<div class="gallery-grids">
				<div class="gallery-top-grids">
					<div class="col-sm-4 gallery-grids-left">
						<div class="gallery-grid">
							<a class="example-image-link" href="{{ asset('vendor/backend/images/slider_index_1_1.jpg')}}" data-lightbox="example-set" data-title="Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus vitae cursus ligula">
								<img width="397px;" height="264px;" src="{{ asset('vendor/backend/images/slider_index_1_1.jpg')}}" alt="" />
								<div class="captn">
									<h4>Visitors</h4>
									<p>Aliquam non</p>
								</div>
							</a>
						</div>
					</div>
					<div class="col-sm-4 gallery-grids-left">
						<div class="gallery-grid">
							<a class="example-image-link" href="{{ asset('vendor/backend/images/g2.jpg')}}" data-lightbox="example-set" data-title="Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus vitae cursus ligula">
								<img src="{{ asset('vendor/backend/images/g2.jpg')}}" alt="" />
								<div class="captn">
									<h4>Visitors</h4>
									<p>Aliquam non</p>
								</div>
							</a>
						</div>
					</div>
					<div class="col-sm-4 gallery-grids-left">
						<div class="gallery-grid">
							<a class="example-image-link" href="{{ asset('vendor/backend/images/g3.jpg')}}" data-lightbox="example-set" data-title="Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus vitae cursus ligula">
								<img src="{{ asset('vendor/backend/images/g3.jpg')}}" alt="" />
								<div class="captn">
									<h4>Visitors</h4>
									<p>Aliquam non</p>
								</div>
							</a>
						</div>
					</div>
					<div class="clearfix"> </div>
				</div>
				<div class="gallery-top-grids">
					<div class="col-sm-4 gallery-grids-left">
						<div class="gallery-grid">
							<a class="example-image-link" href="{{ asset('vendor/backend/images/g5.jpg')}}" data-lightbox="example-set" data-title="Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus vitae cursus ligula">
								<img src="{{ asset('vendor/backend/images/g5.jpg')}}" alt="" />
								<div class="captn">
									<h4>Visitors</h4>
									<p>Aliquam non</p>
								</div>
							</a>
						</div>
					</div>
					<div class="col-sm-4 gallery-grids-left">
						<div class="gallery-grid">
							<a class="example-image-link" href="{{ asset('vendor/backend/images/g6.jpg')}}" data-lightbox="example-set" data-title="Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus vitae cursus ligula">
								<img src="{{ asset('vendor/backend/images/g6.jpg')}}" alt="" />
								<div class="captn">
									<h4>Visitors</h4>
									<p>Aliquam non</p>
								</div>
							</a>
						</div>
					</div>
					<div class="col-sm-4 gallery-grids-left">
						<div class="gallery-grid">
							<a class="example-image-link" href="{{ asset('vendor/backend/images/g7.jpg')}}" data-lightbox="example-set" data-title="Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus vitae cursus ligula">
								<img src="{{ asset('vendor/backend/images/g7.jpg')}}" alt="" />
								<div class="captn">
									<h4>Visitors</h4>
									<p>Aliquam non</p>
								</div>
							</a>
						</div>
					</div>
					
					<div class="clearfix"> </div>
				</div>
				<div class="gallery-top-grids">
					<div class="col-sm-4 gallery-grids-left">
						<div class="gallery-grid">
							<a class="example-image-link" href="{{ asset('vendor/backend/images/g8.jpg')}}" data-lightbox="example-set" data-title="Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus vitae cursus ligula">
								<img src="{{ asset('vendor/backend/images/g8.jpg')}}" alt="" />
								<div class="captn">
									<h4>Visitors</h4>
									<p>Aliquam non</p>
								</div>
							</a>
						</div>
					</div>
					<div class="col-sm-4 gallery-grids-left">
						<div class="gallery-grid">
							<a class="example-image-link" href="{{ asset('vendor/backend/images/g9.jpg')}}" data-lightbox="example-set" data-title="Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus vitae cursus ligula">
								<img src="{{ asset('vendor/backend/images/g9.jpg')}}" alt="" />
								<div class="captn">
									<h4>Visitors</h4>
									<p>Aliquam non</p>
								</div>
							</a>
						</div>
					</div>
					<div class="col-sm-4 gallery-grids-left">
						<div class="gallery-grid">
							<a class="example-image-link" href="{{ asset('vendor/backend/images/g4.jpg')}}" data-lightbox="example-set" data-title="Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus vitae cursus ligula">
								<img src="{{ asset('vendor/backend/images/g4.jpg')}}" alt="" />
								<div class="captn">
									<h4>Visitors</h4>
									<p>Aliquam non</p>
								</div>
							</a>
						</div>
					</div>
					
					<div class="clearfix"> </div>
				</div>
				<div class="clearfix"> </div>
				<script src="js/lightbox-plus-jquery.min.js"> </script>
		
	</div>
</section>
 <!-- footer -->
@include('backend.layouts.partials.footer')

<script>
  
</script>
@endsection