{{-- View này sẽ kế thừa giao diện từ `frontend.layouts.master` --}}
@extends('frontend.layouts.master')

{{-- Thay thế nội dung vào Placeholder `title` của view `frontend.layouts.index` --}}
@section('title')
Contact | PETCARE
@endsection

@section('custom-css')
<link type="text/css" rel="stylesheet" href="vendor/frontend/css/style_map.css" />
@endsection

{{-- Content of index --}}
@section('main-content')
<div id="contact-page" class="container">
    <div class="bg">
        <div class="row">    		
            <div class="col-sm-12">    			   			
                <h2 class="title text-center">Contact <strong>Us</strong></h2> 
                <script type="text/javascript">


                    var locations = <?php print_r(json_encode($locations)) ?>;
                
                
                    // var mymap = new GMaps({
                    //   el: '#mymap',
                    //   lat: 21.170240,
                    //   lng: 72.831061,
                    //   zoom:6
                    // });
                    
                
                //     $.each( locations, function( index, value ){
                        
                //         console.log(value.store_longitude);
                //    });
                
                
                  </script>  			    				    				
                <div id="gmap" class="contact-map">
                    <div id="map"></div>
                </div>
            </div>			 		
        </div>    	
        <div class="row" style="padding-top: 20px;">  	
            <div class="col-sm-8">
                <div class="contact-form">
                    <h2 class="title text-center">Get In Touch</h2>
                    <div class="status alert alert-success" style="display: none"></div>
                    <form id="main-contact-form" class="contact-form row" name="contact-form" method="post">
                        <div class="form-group col-md-6">
                            <input type="text" name="name" class="form-control" required="required" placeholder="Name">
                        </div>
                        <div class="form-group col-md-6">
                            <input type="email" name="email" class="form-control" required="required" placeholder="Email">
                        </div>
                        <div class="form-group col-md-12">
                            <input type="text" name="subject" class="form-control" required="required" placeholder="Subject">
                        </div>
                        <div class="form-group col-md-12">
                            <textarea name="message" id="message" required="required" class="form-control" rows="8" placeholder="Your Message Here"></textarea>
                        </div>                        
                        <div class="form-group col-md-12">
                            <input type="submit" name="submit" class="btn btn-primary pull-right" value="Submit">
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="contact-info">
                    <h2 class="title text-center">Contact Info</h2>
                    <address>
                        <p>E-Shopper Inc.</p>
                        <p>935 W. Webster Ave New Streets Chicago, IL 60614, NY</p>
                        <p>Newyork USA</p>
                        <p>Mobile: +2346 17 38 93</p>
                        <p>Fax: 1-714-252-0026</p>
                        <p>Email: info@e-shopper.com</p>
                    </address>
                    <div class="social-networks">
                        <h2 class="title text-center">Social Networking</h2>
                        <ul>
                            <li>
                                <a href="#"><i class="fa fa-facebook"></i></a>
                            </li>
                            <li>
                                <a href="#"><i class="fa fa-twitter"></i></a>
                            </li>
                            <li>
                                <a href="#"><i class="fa fa-google-plus"></i></a>
                            </li>
                            <li>
                                <a href="#"><i class="fa fa-youtube"></i></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>    			
        </div>  
    </div>	
</div><!--/#contact-page-->
@endsection

@section('custom-scripts')
<script
      src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB_XrFQ-4oPgV5Ctw9IbzjZOMUS1_ezagg&callback=initMap&libraries=&v=weekly"
      defer
    ></script>>
<script src="vendor/frontend/js/setting_map.js"></script>
@endsection