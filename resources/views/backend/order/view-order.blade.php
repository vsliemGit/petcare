{{-- View này sẽ kế thừa giao diện từ `backend.layouts.index` --}}
@extends('backend.layouts.index')

{{-- Thay thế nội dung vào Placeholder `title` của view `backend.layouts.index` --}}
@section('title')
Admin - Order detail
@endsection

{{-- Thay thế nội dung vào Placeholder `main-content` của view `backend.layouts.index` --}}
@section('main-content')
<section class="wrapper">
    <div class="">
        <div class="panel panel-default">
            <div class="panel-heading">
                Chi tiết đơn hàng
            </div>
            <!--table-->
            <div class="table table-bordered"  id="tag_container">
                {{-- content-table --}}
                <table class=" table-bordered">
                    <tr>
                        <td><b>Phương thức vận chuyển : </b></td>
                        <td><i>{{$order->transfer->transfer_name}}</i></td>
                        <td colspan="2"><div><b>THÔNG TIN KHÁCH HÀNG</b></div></td>
                    </tr>
                    <tr>
                        <td><b>Phương thức Thanh toán : </b></td>
                        <td><i>{{$order->payment->payment_name}}</i></td>
                        <td><label for="">Tên khách hàng:</label></td>
                        <td> {{$order->customer->name}}</td>
                    </tr>
                    <tr>
                        <td><b>Thời gian lập đơn hàng : </b></td>
                        <td><i>{{$order->order_created_at}}</i></td>
                        <td><label for="">Số điện thoại:</label></td>
                        <td>(+84) {{$order->customer->phone}}</td>
                    </tr>
                    <tr>
                        <td><b>Trạng thái đơn hàng : </b></td>
                        <td><i>
                            <?php if($order->order_status == 0){ ?>
                            <i>Đang chờ duyệt</i>
                                  <?php  }else{ ?>  
                            <i>Đã duyệt</i>
                          <?php  } ?></i></td>
                        <td><label for="">Email:</label> </td>
                        <td>{{$order->customer->email}}</td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
    <div class="table-agile-info">
        <div class="panel panel-default">
            <div class="panel-heading">
               Danh sách sản phẩm
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
                @include('backend.order.table-detail-order')    
            </div>
        </div>
    </div>
</section>
 <!-- footer -->
 @include('backend.layouts.partials.footer')
 <script>
  </script>
@endsection