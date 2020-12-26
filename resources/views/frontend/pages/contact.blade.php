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
                        @csrf
                        <div class="form-group col-md-6">
                            <input type="text" name="name" id="name" class="form-control" required="required" placeholder="Name">
                        </div>
                        <div class="form-group col-md-6">
                            <input type="email" name="email" id="email" class="form-control" required="required" placeholder="Email">
                        </div>
                        <div class="form-group col-md-12">
                            <input type="text" name="subject" id="subject" class="form-control" required="required" placeholder="Subject">
                        </div>
                        <div class="form-group col-md-12">
                            <textarea name="message" id="message" id="message" required="required" class="form-control" rows="8" placeholder="Your Message Here"></textarea>
                        </div>                        
                        <div class="form-group col-md-12">
                            <input type="submit" name="submit" id="submit-contact" class="btn btn-primary pull-right" value="Submit">
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="contact-info">
                    <h2 class="title text-center">Contact Info</h2>
                    <address>
                        <p>Petcare Inc.</p>
                        <p>228, Hung Loi, Ninh Kieu, TP.Can Tho</p>
                        <p>Can Tho City</p>
                        <p>Mobile: +2346 17 38 93</p>
                        <p>Fax: 1-714-252-0026</p>
                        <p>Email: cafroostb10298@gmail.com</p>
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
</div>
@endsection

@section('custom-scripts')
<!-- Thư viện Jquery validation -->
<script src="{{ asset('vendor/jquery-validation/jquery.validate.min.js') }}"></script>
<script src="{{ asset('vendor/jquery-validation/localization/messages_vi.min.js') }}"></script>
<script>
    //Checkout
    $("#submit-contact").click(function(e){
        e.preventDefault();
        // $('#form_bill_info').submit();

        var form = $('#main-contact-form');
        // console.log(form.serialize());
        // let button = form.parent().find('.cart_quantity_update').data('id');
        $.ajax(
            {
                url: "{{route('frontend.contact.send')}}",
                type: "POST",
                data: form.serialize(),
            }).done(function(data){
                if(data.code==200){
                    form.trigger("reset");
                    swal( 'Successfully!', data.message , 'success');
                }
                
            }).fail(function(jqXHR, ajaxOptions, thrownError){
                swal("Error!", "No response from server...", "error");
        });
    });
    //Validate
    $(document).ready(function () {
        $("#main-contact-form").validate({
            rules: {
                name: {
                    required: true,
                    minlength: 5,
                    maxlength: 50
                },
                email: {
                    required: true,
                    minlength: 10,
                    maxlength: 100,
                    email: true
                },
                subject: {
                    required: true,
                    minlength: 10,
                    maxlength: 50
                },
                messsage: {
                    required: true,
                    minlength: 20,
                    maxlength: 500,
                }
            },
            messages: {
                name: {
                    required: "Vui lòng nhập đầy đủ Name",
                    minlength: "Name phải có ít nhất 5 kí tự",
                    maxlength: "Name không được vượt quá 50 kí tự"
                },
                email: {
                    required: "Vui lòng nhập đầy đủ Email",
                    minlength: "Email phải có ít nhất 10 kí tự",
                    maxlength: "Email không được vượt quá 100 kí tự",
                    email: "Địa chỉ email phải có format name@domain.com"
                },
                subject: {
                    required: "Vui lòng nhập đầy đủ subject",
                    minlength: "subject phải có ít nhất 10 kí tự",
                    maxlength: "subject không được vượt quá 50 kí tự"
                },
                message: {
                    required: "Vui lòng nhập đầy đủ message",
                    minlength: "message phải có ít nhất 20 ký tự",
                    maxlength: "message không được vượt quá 500 ký tự"
                } 
            },
            // errorElement: "em",
            errorPlacement: function (error, element) {
                // Thêm class `invalid-feedback` cho field đang có lỗi
                error.addClass("invalid-feedback");
                if (element.prop("type") === "checkbox") {
                    error.insertAfter(element.parent("label"));
                } else {
                    error.insertBefore(element);
                }
                // Thêm icon "Kiểm tra không Hợp lệ"
                if (!element.next("span")[0]) {
                    $("<span class='glyphicon glyphicon-remove form-control-feedback'></span>")
                        .insertBefore(element);
                }
            },
            // success: function (label, element) {
            //     // Thêm icon "Kiểm tra Hợp lệ"
            //     if (!$(element).next("span")[0]) {
            //         $("<span class='glyphicon glyphicon-ok form-control-feedback'></span>")
            //             .insertBefore($(element));
            //     }
            // },
            highlight: function (element, errorClass, validClass) {
                $(element).addClass("is-invalid").removeClass("is-valid");
            },
            unhighlight: function (element, errorClass, validClass) {
                $(element).addClass("is-valid").removeClass("is-invalid");
            }
        });
    });
</script>
<script
      src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB_XrFQ-4oPgV5Ctw9IbzjZOMUS1_ezagg&callback=initMap&libraries=&v=weekly"
      defer
    ></script>>
<script src="vendor/frontend/js/setting_map.js"></script>
@endsection