{{-- View này sẽ kế thừa giao diện từ `backend.layouts.index` --}}
@extends('backend.layouts.index')
{{-- Thay thế nội dung vào Placeholder `title` của view `backend.layouts.index` --}}
@section('title')
Admin - Add Sale
@endsection

@section('custom-css')
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

@endsection
{{-- Thay thế nội dung vào Placeholder `main-content` của view `backend.layouts.index` --}}
@section('main-content')
<section class="wrapper">
    <div class="form-w3layouts">
        <div class="row">
            <div class="col-lg-12">
                <section class="panel">
                    <header class="panel-heading">
                        Add new Sale
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
                            <form class="cmxform form-horizontal " id="commentForm" action="{{Route('sale.store')}}" method="post" enctype="multipart/form-data" novalidate="novalidate">
                                @csrf
                                <div class="form-group ">
                                    <label for="sale_name" class="control-label col-lg-3">Name <span class="required" style="color:red">*</span></label>
                                    <div class="col-lg-6">
                                        <input class=" form-control" id="sale_name" name="sale_name" minlength="2" type="text" required="">
                                    </div>
                                </div>                            
                                <div class="form-group ">
                                    <label for="sale_start_date" class="control-label col-lg-3">Start date <span class="required" style="color:red">*</span></label>
                                    <div class="col-lg-6">
                                        <input type="text" name="sale_start_date" id="datepicker1" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <label for="sale_end_date" class="control-label col-lg-3">End date <span class="required" style="color:red">*</span></label>
                                    <div class="col-lg-6">
                                        <input type="text" name="sale_end_date" id="datepicker2" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <label for="sale_condition" class="control-label col-lg-3">Condition</label>
                                    <div class="col-lg-6">
                                        <select class="form-control m-bot15"  name="sale_condition" id="sale_condition">
                                            <option value="" selected hidden>----Chọn----</option>
                                            <option value="0">Giảm theo phần trăm(%)</option>
                                            <option value="1">Giảm theo tiền</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <label for="sale_number" class="control-label col-lg-3">Number <span class="required" style="color:red">*</span></label>
                                    <div class="col-lg-6">
                                        <input class="form-control" id="sale_number" name="sale_number" minlength="2" type="number" required="">
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <label class="col-sm-3 control-label col-lg-3" for="sale_status">Trạng thái: </label>
                                    <div class="col-lg-6">
                                        <select class="form-control m-bot15" name="sale_status">
                                            <option value="" selected disabled hidden>----Chọn----</option>
                                            <option value="1">Khả dụng</option>
                                            <option value="0">Khóa</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-lg-offset-3 col-lg-6">
                                        <button class="btn btn-primary" type="submit">Thêm</button>
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

@endsection

@section('custom-js')
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script>
     $(document).ready(function(){
        //Custom datepicker
        $( "#datepicker1" ).datepicker({
            prevText: "Tháng trước",
            nextText: "Tháng sau",
            dateFormat: "yy-mm-dd",
            dayNamesMin: ['T2','T3', 'T4','T5','T6','T7','CN'],
            monthNames: ['Tháng 1', 'Tháng 2', 'Tháng 3', 'Tháng 4', 'Tháng 5', 'Tháng 6', 'Tháng 7', 'Tháng 8', 'Tháng 9', 'Tháng 10','Tháng 11', 'Tháng 12'],
            monthNamesShort : ['Thg1', 'Thg2', 'Thg3', 'Thg4', 'Thg5', 'Thg6', 'Thg7', 'Thg8', 'Thg9', 'Thg10','Thg11', 'Thg12'],
            duration: 'slow',
            changeMonth: true,
            changeYear: true,
            minDate: 0
        });

        $( "#datepicker2" ).datepicker({
            prevText: "Tháng trước",
            nextText: "Tháng sau",
            dateFormat: "yy-mm-dd",
            dayNamesMin: ['T2','T3', 'T4','T5','T6','T7','CN'],
            monthNames : ['Tháng 1', 'Tháng 2', 'Tháng 3', 'Tháng 4', 'Tháng 5', 'Tháng 6', 'Tháng 7', 'Tháng 8', 'Tháng 9', 'Tháng 10','Tháng 11', 'Tháng 12'],
            monthNamesShort : ['Thg1', 'Thg2', 'Thg3', 'Thg4', 'Thg5', 'Thg6', 'Thg7', 'Thg8', 'Thg9', 'Thg10','Thg11', 'Thg12'],
            duration: 'slow',
            changeMonth: true,
            changeYear: true,
            minDate: 0
        });
     });
</script>
@endsection