{{-- View này sẽ kế thừa giao diện từ `backend.layouts.index` --}}
@extends('backend.layouts.index')
{{-- Thay thế nội dung vào Placeholder `title` của view `backend.layouts.index` --}}
@section('title')
Admin - Add Brand
@endsection
{{-- Thay thế nội dung vào Placeholder `main-content` của view `backend.layouts.index` --}}
@section('main-content')
<section class="wrapper">
    <div class="form-w3layouts">
        <div class="row">
            <div class="col-lg-12">
                <section class="panel">
                    <header class="panel-heading">
                        Thêm mới Thương hiệu
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
                        <div class=" form">
                            <form class="cmxform form-horizontal " id="commentForm" action="{{Route('brand.store')}}" method="post" enctype="multipart/form-data" novalidate="novalidate">
                                @csrf
                                <div class="form-group ">
                                    <label for="brand_name" class="control-label col-lg-3">Tên Thương hiệu <span class="required" style="color:red">*</span></label>
                                    <div class="col-lg-6">
                                        <input class=" form-control" id="brand_name" name="brand_name" minlength="2" type="text" required="">
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <label for="brand_slug" class="control-label col-lg-3">Slug <span class="required" style="color:red">*</span></label>
                                    <div class="col-lg-6">
                                        <input class=" form-control" id="brand_slug" name="brand_slug" minlength="2" type="text" required="">
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <label for="brand_desc" class="control-label col-lg-3">Mô tả</label>
                                    <div class="col-lg-6">
                                        <textarea class="form-control" style="resize: none" rows="8" id="brand_desc" name="brand_desc" required=""></textarea>
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <label class="col-sm-3 control-label col-lg-3" for="brand_status">Trạng thái: </label>
                                    <div class="col-lg-6">
                                        <select class="form-control m-bot15" name="brand_status">
                                            <option value="" selected disabled hidden></option>
                                            <option value="1">Khả dụng</option>
                                            <option value="0">Khóa</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-lg-offset-3 col-lg-6">
                                        <button class="btn btn-primary" name="add_category_product" type="submit">Thêm</button>
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

<script>
    $(document).ready(function(){
        $("#brand_name").keyup(function(){
            var valueName = changToSlug($("#brand_name").val());
            $("#brand_slug").val(valueName);
        })
    });
    </script>
@endsection