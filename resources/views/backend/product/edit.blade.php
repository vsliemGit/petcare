{{-- View này sẽ kế thừa giao diện từ `backend.layouts.index` --}}
@extends('backend.layouts.index')
{{-- Thay thế nội dung vào Placeholder `title` của view `backend.layouts.index` --}}
@section('title')
Admin - Add New Product
@endsection

@section('custom-css')
<!-- Các css dành cho thư viện bootstrap-fileinput -->
<link href="{{ asset('vendor/bootstrap-fileinput/css/fileinput.css') }}" media="all" rel="stylesheet" type="text/css"/>
<link href="{{ asset('vendor/bootstrap-fileinput/themes/explorer-fas/theme.css') }}" media="all" rel="stylesheet" type="text/css"/>
@endsection


{{-- Thay thế nội dung vào Placeholder `main-content` của view `backend.layouts.index` --}}
@section('main-content')
<section class="wrapper">
    <div class="form-w3layouts">
        <div class="row">
            <div class="col-lg-12">
                <section class="panel">
                    <header class="panel-heading">
                        Edit Product
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
                        <form class="cmxform form-horizontal " id="commentForm" action="{{route('product.store')}}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label for="pro_category_id" class="control-label col-lg-3">Tên loại <span class="required" style="color:red">*</span></label>
                                        <div class="col-lg-9">
                                            <select name="pro_category_id" class="form-control m-bot15">
                                                <option value="" selected hidden>Choose Product Caterogy</option>
                                                @foreach ($listProductCategories as $productCatetory)
                                                    <option value="{{ $productCatetory->pro_category_id }}">{{ $productCatetory->pro_category_name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="brand_id" class="control-label col-lg-5">Tên Thương hiệu <span class="required" style="color:red">*</span></label>
                                        <div class="col-lg-7">
                                            <select name="brand_id" class="form-control m-bot15">
                                                <option value="" selected hidden>Choose Brand</option>
                                                @foreach ($listBrands as $brand)
                                                    <option value="{{ $brand->brand_id }}">{{ $brand->brand_name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label for="product_name" class="control-label col-lg-4">Tên sản phẩm <span class="required" style="color:red">*</span></label>
                                        <div class="col-lg-8">
                                            <input class=" form-control" id="product_name" name="product_name" value="{{ old('product_name', $product->product_name) }}" minlength="2" type="text" required="">
                                        </div>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="product_slug" class="control-label col-lg-4">Slug <span class="required" style="color:red">*</span></label>
                                        <div class="col-lg-8">
                                            <input class=" form-control" id="product_slug" name="product_slug" value="{{ old('product_slug', $product->product_slug) }}" minlength="2" type="text" required="">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12 form-group">
                                    <label for="product_desc" class="control-label col-md-1">Mô tả</label>
                                    <div class="col-md-10">
                                        <textarea class="form-control" style="resize: none" rows="8" id="product_desc" name="product_desc" required=""></textarea>
                                    </div>
                                </div>    
                                <div class="form-group ">
                                    <label for="product_desc" class="control-label col-lg-3">Mô tả</label>
                                    <div class="col-lg-6">
                                        <textarea class="form-control" style="resize: none" rows="8" id="product_desc" name="product_desc" required=""></textarea>
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <label for="product_image" class="control-label col-lg-3">Hình ảnh</label>
                                    <div class="col-lg-6">
                                        <input id="product_image" name="product_image" type="file" class="file" data-show-upload="false" data-browse-on-zone-click="true">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="product_quantity" class="control-label col-lg-3">Quantity</label>
                                    <div class="col-lg-6">
                                      <input id="product_quantity" name="product_quantity" class="form-control" type="number" value="0" min="0" max="1000">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label col-lg-3" for="product_basis_price">Basis price</label>
                                    <div class="col-lg-6">
                                        <div class="input-group m-bot15">
                                            <span class="input-group-addon">$</span>
                                                <input id="product_basis_price" name="product_basis_price" type="number" class="form-control">
                                            <span class="input-group-addon ">.00</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="product_price" class="col-sm-3 control-label col-lg-3">Price</label>
                                    <div class="col-lg-6">
                                        <div class="input-group m-bot15">
                                            <span class="input-group-addon">$</span>
                                                <input id="product_price" name="product_price" type="number" class="form-control">
                                            <span class="input-group-addon ">.00</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <label for="product_images" class="control-label col-lg-3">Hình ảnh liên quan</label>
                                    <div class="col-lg-6">
                                        <input id="product_images" name="product_images[]" type="file" class="file" multiple data-show-upload="false" data-browse-on-zone-click="true">
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <label class="col-sm-3 control-label col-lg-3" for="product_status">Trạng thái: </label>
                                    <div class="col-lg-6">
                                        <select class="form-control m-bot15" name="product_status">
                                            <option value="" selected disabled hidden></option>
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
<!-- Các script dành cho thư viện bootstrap-fileinput -->
<script src="{{ asset('vendor/bootstrap-fileinput/js/plugins/sortable.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('vendor/bootstrap-fileinput/js/fileinput.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('vendor/bootstrap-fileinput/js/locales/fr.js') }}" type="text/javascript"></script>
<script src="{{ asset('vendor/bootstrap-fileinput/themes/fas/theme.js') }}" type="text/javascript"></script>
<script src="{{ asset('vendor/bootstrap-fileinput/themes/explorer-fas/theme.js') }}" type="text/javascript"></script>

<script>
    $(document).ready(function(){
        $("#product_name").keyup(function(){
            var valueName = changToSlug($("#product_name").val());
            $("#product_slug").val(valueName);
        });
        
        // with plugin options
        $("#product_image").fileinput({
            theme: 'fas',
            showUpload: false,
            showCaption: false,
            browseClass: "btn btn-primary btn-lg",
            fileType: "any",
            previewFileIcon: "<i class='glyphicon glyphicon-king'></i>",
            overwriteInitial: false
        });
        $("#product_images").fileinput({
            theme: 'fas',
            showUpload: false,
            showCaption: false,
            browseClass: "btn btn-primary btn-lg",
            fileType: "any",
            previewFileIcon: "<i class='glyphicon glyphicon-king'></i>",
            overwriteInitial: false,
            allowedFileExtensions: ["jpg", "gif", "png", "txt"]
        });
    });
    </script>
@endsection