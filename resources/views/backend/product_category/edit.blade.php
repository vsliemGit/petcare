{{-- View này sẽ kế thừa giao diện từ `backend.layouts.index` --}}
@extends('backend.layouts.index')
{{-- Thay thế nội dung vào Placeholder `title` của view `backend.layouts.index` --}}
@section('title')
Admin - Add Product category
@endsection
{{-- Thay thế nội dung vào Placeholder `main-content` của view `backend.layouts.index` --}}
@section('main-content')
<section class="wrapper">
    <div class="form-w3layouts">
        <div class="row">
            <div class="col-lg-12">
                <section class="panel">
                    <header class="panel-heading">
                        {{ $productCategory->pro_category_name }}
                    </header>
                    <div class="panel-body">
                        <div class="form">
                        <form class="cmxform form-horizontal " id="commentForm" action="{{ Route('product_category.update', ['id' => $productCategory->pro_category_id])}}" method="post" novalidate="novalidate">
                                @csrf
                                <input type="hidden" name="_method" value="PUT" />
                                <div class="form-group ">
                                    <label for="name" class="control-label col-lg-3">Tên loại <span class="required" style="color:red">*</span></label>
                                    <div class="col-lg-6">
                                        <input class="form-control" id="name" name="name" value="{{ old('pro_category_name', $productCategory->pro_category_name) }}" minlength="2" type="text" required="">
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <label for="slug" class="control-label col-lg-3">Slug <span class="required" style="color:red">*</span></label>
                                    <div class="col-lg-6">
                                        <input class=" form-control" id="slug" name="slug" value="{{ old('pro_category_slug', $productCategory->pro_category_slug) }}" minlength="2" type="text" required="">
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <label for="desc" class="control-label col-lg-3">Mô tả</label>
                                    <div class="col-lg-6">
                                        <textarea class="form-control" style="resize: none" rows="8" id="desc" name="desc" required="">{{ old('pro_category_desc', $productCategory->pro_category_desc) }}</textarea>
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <label class="col-sm-3 control-label col-lg-3" for="status">Trạng thái: </label>
                                    <div class="col-lg-6">
                                        <select class="form-control m-bot15" name="status">
                                            <option value="" selected disabled hidden></option>
                                            <option value="1" 
                                                {{old('pro_category_status', $productCategory->pro_category_status) == 1 ? "selected" : ""}}>Khả dụng</option>
                                            <option value="0"
                                                {{old('pro_category_status', $productCategory->pro_category_status) == 0 ? "selected" : ""}}>Khóa</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-lg-offset-3 col-lg-6">
                                        <button class="btn btn-primary" name="save_category_product" type="submit">Sửa</button>
                                        <a href="{{ route('product_category.index') }}" class="btn btn-warning">Cancel</a>
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