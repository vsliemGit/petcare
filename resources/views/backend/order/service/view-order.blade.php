{{-- View này sẽ kế thừa giao diện từ `backend.layouts.index` --}}
@extends('backend.layouts.index')

{{-- Thay thế nội dung vào Placeholder `title` của view `backend.layouts.index` --}}
@section('title')
Admin - Order detail
@endsection

@section('custom-css')

@endsection

{{-- Thay thế nội dung vào Placeholder `main-content` của view `backend.layouts.index` --}}
@section('main-content')
<section class="wrapper">
    <div class="">
        <div class="panel panel-default">
            <div class="panel-heading">
                Chi tiết lịch hẹn
            </div>
            <!--table-->
            <div class="table table-bordered"  id="tag_container">
                {{-- content-table --}}
                <table class=" table-bordered">
                    <tr>
                        <td><b>Ngày hẹn: </b></td>
                        <td><i>{{$order_service->order_service_date_begin}}</i></td>
                        <td colspan="2"><div><b>THÔNG TIN KHÁCH HÀNG</b></div></td>
                    </tr>
                    <tr>
                        <td><b>Giờ hẹn : </b></td>
                        <td><i>{{$order_service->order_service_time}}</i></td>
                        <td><label for="">Tên khách hàng:</label></td>
                        <td> {{$order_service->customer->name}}</td>
                    </tr>
                    <tr>
                        <td><b>Thời gian lập lịch hẹn : </b></td>
                        <td><i>{{$order_service->order_created_at}}</i></td>
                        <td><label for="">Ngày chỉnh sửa:</label></td>
                        <td>(+84) {{$order_service->order_updated_at}}</td>
                    </tr>
                    <tr>
                        <td><b>Trạng thái lịch hẹn : </b></td>
                        <td>                         
                            <select id="select-order-order-status" data-id="{{$order_service->order_service_id}}" class="input-sm form-control w-sm inline v-middle" {{ old('order_service_status', $order_service->order_service_status) == -1 ? "disabled" : "" }}>
                              <option value="0" {{ old('order_service_status', $order_service->order_service_status) == 0 ? "selected" : "" }}><i>Đang chờ duyệt</i></option>
                              <option value="1" {{ old('order_service_status', $order_service->order_service_status) == 1 ? "selected" : "" }}><i>Đã duyệt</i></option>
                              <option value="2" {{ old('order_service_status', $order_service->order_service_status) == 2 ? "selected" : "" }}><i>Đã hoàn thành</i></option>
                              <option value="-1" {{ old('order_service_status', $order_service->order_service_status) == -1 ? "selected" : "" }}><i>Đã hủy</i></option>
                            </select>
                        </td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
    <div class="table-agile-info">
        <div class="panel panel-default">
            <div class="panel-heading">
               Danh sách dịch vụ
            </div>
            <div class="row w3-res-tb">
                <div class="col-sm-4 m-b-xs">
                  <select id="action-tool" class="input-sm form-control w-sm inline v-middle">
                    <option value="" selected hidden>Choose tools</option>
                    <option value="0">Add item</option>
                    <option value="1">Export Excel</option>
                    <option value="2">Import Excel</option>
                    <option value="3">Create PDF</option>
                    <option value="4">Delete items</option>
                  </select>
                  <button id="btn-action-tool" class="btn btn-sm btn-default">Apply</button>              
                </div>
                <div class="col-sm-5">
                  <select id="select-filter-status" class="input-sm form-control w-sm inline v-middle">
                    <option value="all" selected>All status</option>
                    <option value="1">Active</option>
                    <option value="0">Noactive</option>
                  </select>
                  <button id="btn-filter-status" class="btn btn-sm btn-default">Apply</button>
                </div>
                <div class="col-sm-3">
                  <div class="input-group">
                    <input type="text" class="input-sm form-control" placeholder="Search">
                    <span class="input-group-btn">
                      <button class="btn btn-sm btn-default" type="button">Go!</button>
                    </span>
                  </div>
                </div>
            </div>
            <!--table-->
            <div class="table-responsive"  id="tag_container">
                {{-- content-table --}}
                @include('backend.order.service.table-detail-order')    
            </div>
        </div>
    </div>
</section>
 <!-- footer -->
 @include('backend.layouts.partials.footer')
@endsection

@section('custom-js')
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script>
    //Setup CSRF to AJAX
    $.ajaxSetup({
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
    });

    //Changing status of Order
    $('#select-order-order-status').change(function(){
      var value  = $(this).val();
      var id = $(this).data('id');
      $.ajax({
        url : "{{route('order.change_status_service')}}",
        method : 'POST',
        data : {
          id : id,
          value : value
        }
      }).done(function(data){
        console.log(data);
        if(data.code == 200){
            swal('Successfully!',data.message, 'success');
        }else{
          swal("Error!", "Some thing error", "error");
          console.log(data);
        }
      }).error(function(data){
          swal("Error!", "Some thing error", "error");
          console.log(data);
      });
    });

</script>
@endsection