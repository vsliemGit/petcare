{{-- View này sẽ kế thừa giao diện từ `backend.layouts.index` --}}
@extends('backend.layouts.index')
{{-- Thay thế nội dung vào Placeholder `title` của view `backend.layouts.index` --}}
@section('title')
Admin - Add Banner
@endsection
@section('custom-css')
<!-- Các js dành cho thư viện CKEditor -->
<!-- Các css dành cho thư viện bootstrap-fileinput -->
<link href="{{ asset('vendor/bootstrap-fileinput/css/fileinput.css') }}" media="all" rel="stylesheet" type="text/css"/>
<link href="{{ asset('vendor/bootstrap-fileinput/themes/explorer-fas/theme.css') }}" media="all" rel="stylesheet" type="text/css"/>
@endsection
@section('custom-js')
@endsection
{{-- Thay thế nội dung vào Placeholder `main-content` của view `backend.layouts.index` --}}
@section('main-content')
<section class="wrapper">
    <div class="form-w3layouts">
        <div class="row">
            <div class="col-lg-12">
                <section class="panel">
                    <header class="panel-heading">
                        Add new Banner
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
                            <form class="cmxform form-horizontal " id="commentForm" action="{{route('banner.store')}}" method="post" enctype="multipart/form-data" novalidate="novalidate">
                                @csrf
                                <div class="form-group">
                                    <label for="banner_name" class=" col-lg-3">Banner name <span class="required" style="color:red">*</span></label>
                                    <div class="col-lg-12">
                                        <input class="form-control" id="banner_name" name="banner_name"  minlength="2" type="text" required="">
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <label for="banner_image" class="col-lg-3">Hình ảnh</label>
                                    <div class="col-lg-12">
                                        <input id="banner_image" name="banner_image" type="file" class="file" data-show-upload="false" data-browse-on-zone-click="true">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="banner_url" class=" col-lg-3">Banner URL</label>
                                    <div class="col-lg-12">
                                        <input class="form-control" id="banner_url" name="banner_url" minlength="2" type="text" required="">
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <label class="col-sm-3 col-lg-3" for="banner_status">Status <span class="required" style="color:red">*</span></label>
                                    <div class="col-lg-12">
                                        <select class="form-control m-bot15" name="banner_status">
                                            <option value="" selected disabled hidden></option>
                                            <option value="1" >Khả dụng</option>
                                            <option value="0" >Khóa</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-lg-offset-3 col-lg-12">
                                        <button class="btn btn-primary" name="add_service" type="submit">Add New</button>
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
    // with plugin options
    $("#banner_image").fileinput({
            theme: 'fas',
            showUpload: false,
            showCaption: false,
            browseClass: "btn btn-primary btn-lg",
            fileType: "any",
            previewFileIcon: "<i class='glyphicon glyphicon-king'></i>",
            overwriteInitial: false
    });
</script>
@endsection