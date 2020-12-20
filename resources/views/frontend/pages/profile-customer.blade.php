{{-- View này sẽ kế thừa giao diện từ `frontend.layouts.master` --}}
@extends('frontend.layouts.master')

{{-- Thay thế nội dung vào Placeholder `title` của view `frontend.layouts.index` --}}
@section('title')
Profile | PETCARE
@endsection

@section('custom-css')
<style>

</style>
@endsection

{{-- Content of index --}}
@section('main-content')
<div id="contact-page" class="container">  
    <div class="container bootstrap snippet">
        <div class="row">
            <div class="col-sm-10"><h1>{{Auth::guard('customer')->user()->name}}</h1></div>
            <div class="col-sm-2"><a href="/users" class="pull-right"><img title="profile image" class="img-circle img-responsive" src="http://www.gravatar.com/avatar/28fd20ccec6865e2d5f0e1f4446eb7bf?s=100"></a></div>
        </div>
        <div class="row">
              <div class="col-sm-3"><!--left col-->
                <div class="text-center">
                    <img src="http://ssl.gstatic.com/accounts/ui/avatar_2x.png" class="avatar img-circle img-thumbnail" alt="avatar">
                    <h6>Upload a different photo...</h6>
                    <input type="file" class="text-center center-block file-upload">
                </div><hr><br>
                {{--        
                <div class="panel panel-default">
                    <div class="panel-heading">Website <i class="fa fa-link fa-1x"></i></div>
                    <div class="panel-body"><a href="http://bootnipets.com">bootnipets.com</a></div>
                </div>
                --}}
                <ul class="list-group">
                    <li class="list-group-item text-muted">Activity <i class="fa fa-dashboard fa-1x"></i></li>
                    <li class="list-group-item text-right"><span class="pull-left"><strong>Shares</strong></span> 125</li>
                    <li class="list-group-item text-right"><span class="pull-left"><strong>Likes</strong></span> 13</li>
                    <li class="list-group-item text-right"><span class="pull-left"><strong>Posts</strong></span> 37</li>
                    <li class="list-group-item text-right"><span class="pull-left"><strong>Followers</strong></span> 78</li>
                </ul> 
                   
                <div class="panel panel-default">
                    <div class="panel-heading">Social Media</div>
                    <div class="panel-body">
                        <i class="fa fa-facebook fa-2x"></i> <i class="fa fa-github fa-2x"></i> <i class="fa fa-twitter fa-2x"></i> <i class="fa fa-pinterest fa-2x"></i> <i class="fa fa-google-plus fa-2x"></i>
                    </div>
                </div>             
            </div><!--/col-3-->
            <div class="col-sm-9">
                <ul class="nav nav-tabs">
                    <li class="active"><a data-toggle="tab" href="#home">Home</a></li>
                    <li><a data-toggle="tab" href="#orders">Đơn đặt hàng</a></li>
                    <li><a data-toggle="tab" href="#services">Lịch hẹn</a></li>
                </ul>             
                <div class="tab-content">
                    <div class="tab-pane active" id="home">
                        <hr>
                        <form class="form" action="##" method="post" id="registrationForm">
                            <div class="form-group">                               
                                <div class="col-xs-6">
                                    <label for="full_name"><h4>Full Name</h4></label>
                                    <input type="text" class="form-control" name="full_name" id="full_name" value="{{Auth::guard('customer')->user()->name}}" placeholder="first name" title="enter your first name if any.">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-xs-6">
                                    <label for="user_name"><h4>User Name</h4></label>
                                    <input type="text" class="form-control" name="user_name" id="user_name"value="{{Auth::guard('customer')->user()->username}}"  placeholder="last name" title="enter your last name if any.">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-xs-6">
                                    <label for="email"><h4>Email</h4></label>
                                    <input type="email" class="form-control" name="email" id="email" value="{{Auth::guard('customer')->user()->email}}" placeholder="you@email.com" title="enter your email.">
                                </div>
                            </div>           
                            <div class="form-group">
                                <div class="col-xs-6">
                                    <label for="phone"><h4>Phone</h4></label>
                                    <input type="text" class="form-control" name="phone" id="phone" value="(+84){{Auth::guard('customer')->user()->phone}}" placeholder="enter phone number" title="enter your phone number if any.">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-xs-6">
                                    <label for="address"><h4>Address</h4></label>
                                    <input type="address" class="form-control" id="address" value="{{Auth::guard('customer')->user()->address}}" placeholder="somewhere" title="enter you address">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-xs-6">
                                    <label for="address2"><h4>Address_2</h4></label>
                                    <input type="address2" class="form-control" id="address2" placeholder="somewhere" title="enter you address">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-xs-6">
                                    <label for="password"><h4>Password</h4></label>
                                    <input type="password" class="form-control" name="password" id="password" placeholder="password" title="enter your password.">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-xs-6">
                                    <label for="password2"><h4>Verify</h4></label>
                                    <input type="password" class="form-control" name="password2" id="password2" placeholder="password2" title="enter your password2.">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-xs-12">
                                    <br>
                                    <button class="btn btn-lg btn-success" type="submit"><i class="glyphicon glyphicon-ok-sign"></i> Save</button>
                                    <button class="btn btn-lg" type="reset"><i class="glyphicon glyphicon-repeat"></i> Reset</button>
                                </div>
                            </div>
                        </form>
                    <hr>       
                    </div><!--/tab-pane-->
                    <div class="tab-pane" id="orders">                                 
                    <hr>
                    <table class="table">
                        <thead>
                          <tr>
                            <th scope="col">Mã hóa đơn</th>
                            <th scope="col">Ngày tạo</th>
                            <th scope="col">Ngày vận chuyển</th>
                            <th scope="col">Thanh toán</th>
                            <th scope="col">Vận chuyển</th>
                            <th scope="col">Trạng thái</th>
                            <th style="width:30px;"></th>
                          </tr>
                        </thead>
                        <tbody>
                          @if($orders->count()>0)
                              @foreach ($orders as $order)
                              <tr>
                                <th scope="row">#{{$order->order_id}}</th>
                                <td>{{$order->order_created_at}}</td>
                                <td>{{$order->order_date_shipping}}</td>
                                <td>{{$order->payment->payment_name}}</td>
                                <td>{{$order->transfer->transfer_name}}</td>
                                <td>
                                    <i>
                                        <?php if($order->order_status == 0){ ?>
                                        <i>Đang chờ duyệt</i>
                                              <?php  }else{ ?>  
                                        <i>Đã duyệt</i>
                                         <?php  } ?>
                                    </i>
                                </td>
                                <td>
                                    <a href="javascript:void(0)" data-id="{{$order->order_id}}"
                                        class="active styling-edit view-item" ui-toggle-class="">
                                        <i class="fa fa-eye text-success text-active"></i>
                                    </a>
                                </td>
                              </tr>  
                              @endforeach
                          @else
                            <h2>Giỏ hàng trống!</h2>
                          @endif
                        </tbody>
                      </table>
                      <div id="detail_order">
                      </div>
                    </div><!--/tab-pane-->
                    <div class="tab-pane" id="services">
                    <hr>
                    <hr>
                    <table class="table">
                        <thead>
                          <tr>
                            <th scope="col">#</th>
                            <th scope="col">Ngày hẹn</th>
                            <th scope="col">Giờ hẹn</th>
                            <th scope="col">Trạng thái</th>
                            <th style="width:30px;"></th>
                          </tr>
                        </thead>
                        <tbody>
                          @if($order_services->count()>0)
                              @foreach ($order_services as $key => $service)
                              <tr>
                                <th scope="row"><b>#{{$key+1}}</b></th>
                                <td>{{$service->order_service_date_begin}}</td>
                                <td>{{$service->order_service_time}}</td>
                                <td>
                                    <i>
                                        <?php if($service->order_service_status == 0){ ?>
                                        <i>Đang chờ duyệt</i>
                                              <?php  }else{ ?>  
                                        <i>Đã duyệt</i>
                                         <?php  } ?>
                                    </i>
                                </td>
                                <td>
                                    <a href="javascript:void(0)" data-id="{{$service->order_service_id}}"
                                        class="active styling-edit view-item" ui-toggle-class="">
                                        <i class="fa fa-eye text-success text-active"></i>
                                    </a>
                                </td>
                              </tr>  
                              @endforeach
                          @else
                            <h2>Bạn không có lịch hẹn nào!</h2>
                          @endif
                        </tbody>
                      </table>
                      <div id="detail_order_service">

                        </div>
                    </div>                 
                    </div><!--/tab-pane-->
                </div><!--/tab-content-->
            </div><!--/col-9-->
        </div><!--/row-->                                                                                                      
</div><!--/#contact-page-->
@endsection
@section('custom-scripts')
<script>
    $(document).ready(function() {
        var readURL = function(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                $('.avatar').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }

    $(".file-upload").on('change', function(){
        readURL(this);
    });

    //Load list product
    $('.view-item').click(function(e){
        let order_id = $(this).data('id');
        $.ajax(
            {
                url: "{{route('customer.order.view_order')}}",
                type: "GET",
                data: {
                    id : order_id
                }
            }).done(function(data){   
                $('#detail_order').html(data);
               console.log(data);
            }).error(function(e){
                console.log(e);
            });

    });

     //Load list service
     $('.view-item').click(function(e){
        let order_service_id = $(this).data('id');
        $.ajax(
            {
                url: "{{route('customer.order.view_order_service')}}",
                type: "GET",
                data: {
                    id : order_service_id
                }
            }).done(function(data){   
                $('#detail_order_service').html(data);
               console.log(data);
            }).error(function(e){
                console.log(e);
            });

    });
});
</script>
@endsection