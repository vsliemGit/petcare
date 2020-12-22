{{-- View này sẽ kế thừa giao diện từ `backend.layouts.index` --}}
@extends('backend.layouts.index')
{{-- Thay thế nội dung vào Placeholder `title` của view `backend.layouts.index` --}}
@section('title')
Admin - Add Coupon
@endsection
{{-- Thay thế nội dung vào Placeholder `main-content` của view `backend.layouts.index` --}}
@section('main-content')
<section class="wrapper">
    <div class="form-w3layouts">
        <div class="row">
            <div class="col-lg-12">
                <section class="panel">
                    <header class="panel-heading">
                        Add new Coupon
                    </header>
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                            </ul>
                        </div>
                    @endif
                    <div class="panel-body">
                        <div class="form">
                            <form class="cmxform form-horizontal " id="commentForm" action="{{Route('coupon.store')}}" method="post" enctype="multipart/form-data" novalidate="novalidate">
                                @csrf
                                <div class="form-group ">
                                    <label for="coupon_name" class="control-label col-lg-3">Name <span class="required" style="color:red">*</span></label>
                                    <div class="col-lg-6">
                                        <input class=" form-control" id="coupon_name" name="coupon_name" minlength="2" type="text" required="">
                                    </div>
                                </div>                            
                                <div class="form-group ">
                                    <label for="coupon_times" class="control-label col-lg-3">Times <span class="required" style="color:red">*</span></label>
                                    <div class="col-lg-6">
                                        <input class="form-control" id="coupon_times" name="coupon_times" minlength="2" type="number" required="">
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <label for="coupon_condition" class="control-label col-lg-3">Condition</label>
                                    <div class="col-lg-6">
                                        <select class="form-control m-bot15"  name="coupon_condition" id="coupon_condition">
                                            <option value="" selected hidden>----Chọn----</option>
                                            <option value="0">Giảm theo phần trăm(%)</option>
                                            <option value="1">Giảm theo tiền</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <label for="coupon_number" class="control-label col-lg-3">Number <span class="required" style="color:red">*</span></label>
                                    <div class="col-lg-6">
                                        <input class="form-control" id="coupon_number" name="coupon_number" minlength="2" type="number" required="">
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <label class="col-sm-3 control-label col-lg-3" for="coupon_status">Trạng thái: </label>
                                    <div class="col-lg-6">
                                        <select class="form-control m-bot15" name="coupon_status">
                                            <option value="" selected disabled hidden>----Chọn----</option>
                                            <option value="1">Khả dụng</option>
                                            <option value="0">Khóa</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-lg-offset-3 col-lg-6">
                                        <button class="btn btn-primary" name="add_coupon" type="submit">Thêm</button>
                                        <button class="btn btn-default" type="button">Cancel</button>
                                    </div>
                                </div>
                            </form>
                        </div>

                    </div>
                </section>
            </div>
        </div>
    </div>
</section>

<script></script>
@endsection