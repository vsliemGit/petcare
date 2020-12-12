{{-- View này sẽ kế thừa giao diện từ `backend.layouts.index` --}}
@extends('backend.layouts.index')
{{-- Thay thế nội dung vào Placeholder `title` của view `backend.layouts.index` --}}
@section('title')
Admin - Edit Service
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
                        Edit {{$service->service_name}}
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
                            <form class="cmxform form-horizontal " id="commentForm" action="{{route('service.update', ['id' => $service->service_id])}}" method="post" enctype="multipart/form-data" novalidate="novalidate">
                                @csrf
                                <div class="form-group ">
                                    <label for="service_name" class="control-label col-lg-3">Name services <span class="required" style="color:red">*</span></label>
                                    <div class="col-lg-6">
                                        <input class=" form-control" id="service_name" name="service_name" value="{{ old('service_name', $service->service_name) }}" minlength="2" type="text" required="">
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <label for="service_slug" class="control-label col-lg-3">Slug <span class="required" style="color:red">*</span></label>
                                    <div class="col-lg-6">
                                        <input class=" form-control" id="service_slug" name="service_slug" value="{{ old('service_slug', $service->service_slug) }}" minlength="2" type="text" required="">
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <label for="service_image" class="control-label col-lg-3">Hình ảnh</label>
                                    <div class="col-lg-6">
                                        <input id="service_image" name="service_image" type="file" class="file" data-show-upload="false" data-browse-on-zone-click="true">
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <label for="service_desc" class="control-label col-lg-3">Description</label>
                                    <div class="col-lg-6">
                                        <textarea class="form-control" style="resize: none" rows="8" id="service_desc" name="service_desc" required="">{{ old('service_desc', $service->service_desc) }}</textarea>
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <label class="col-sm-3 control-label col-lg-3" for="service_status">Status: </label>
                                    <div class="col-lg-6">
                                        <select class="form-control m-bot15" name="service_status">
                                            <option value="" selected disabled hidden></option>
                                            <option value="1" {{ old('service_status', $service->service_status) == 1 ? "selected" : "" }}>Khả dụng</option>
                                            <option value="0" {{ old('service_status', $service->service_status) == 0 ? "selected" : "" }}>Khóa</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-lg-offset-3 col-lg-6">
                                        <button class="btn btn-primary" name="add_service" type="submit">Update</button>
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
        $("#service_name").keyup(function(){
            var valueName = changToSlug($("#service_name").val());
            $("#service_slug").val(valueName);
        })
    });
     // with plugin options
    $("#service_image").fileinput({
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