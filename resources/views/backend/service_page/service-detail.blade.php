{{-- View này sẽ kế thừa giao diện từ `backend.layouts.index` --}}
@extends('backend.layouts.index')
{{-- Thay thế nội dung vào Placeholder `title` của view `backend.layouts.index` --}}
@section('title')
Admin - Service detail
@endsection
@section('custom-css')
<!-- Các js dành cho thư viện CKEditor -->
<!-- Các css dành cho thư viện bootstrap-fileinput -->
<link href="{{ asset('vendor/bootstrap-fileinput/css/fileinput.css') }}" media="all" rel="stylesheet" type="text/css"/>
<link href="{{ asset('vendor/bootstrap-fileinput/themes/explorer-fas/theme.css') }}" media="all" rel="stylesheet" type="text/css"/>
@endsection
@section('custom-js')
<!-- Các js dành cho thư viện CKEditor -->
<script src="{{ asset('vendor/backend/ckeditor/ckeditor.js') }}"></script>
@endsection
{{-- Thay thế nội dung vào Placeholder `main-content` của view `backend.layouts.index` --}}
@section('main-content')
<section class="wrapper">
    <div class="form-w3layouts">
        <div class="row">
            <div class="col-lg-12">
                <section class="panel">
                    <header class="panel-heading">
                        Detail service '{{$service->service_name}}'
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
                            <form class="cmxform form-horizontal " id="commentForm" action="{{route('service.detail_update', ['id' => $data->service_detail_id])}}" method="post" enctype="multipart/form-data" novalidate="novalidate">
                                @csrf
                                <div class="form-group">
                                    <label for="service_name" class=" col-lg-3">Name services <span class="required" style="color:red">*</span></label>
                                    <div class="col-lg-12">
                                        <input class="form-control" id="service_name" name="service_name" value="{{ old('service_name', $service->service_name) }}" minlength="2" type="text" required="">
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <label for="service_detail_image" class="col-lg-3">Hình ảnh</label>
                                    <div class="col-lg-12">
                                        <input id="service_detail_image" name="service_detail_image" type="file" class="file" data-show-upload="false" data-browse-on-zone-click="true">
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <label for="service_content" class="col-lg-3">Content</label>
                                    <div class="col-lg-12">
                                        <textarea class="form-control" style="resize: none" rows="8" id="service_content" name="service_content" required="">{{$data->service_detail_content}}</textarea>
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <label class="col-sm-3 col-lg-3" for="service_detail_status">Status <span class="required" style="color:red">*</span></label>
                                    <div class="col-lg-12">
                                        <select class="form-control m-bot15" name="service_detail_status">
                                            <option value="" selected disabled hidden></option>
                                            <option value="1" {{ old('service_detail_status', $data->service_detail_status) == 1 ? "selected" : "" }}>Khả dụng</option>
                                            <option value="0" {{ old('service_detail_status', $data->service_detail_status) == 0 ? "selected" : "" }}>Khóa</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-lg-offset-3 col-lg-12">
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
    // Replace the <textarea id="editor1"> with a CKEditor 4
    // instance, using default configuration.
    CKEDITOR.replace( 'service_content', {
        filebrowserUploadUrl: "{{route('ckeditor.upload', ['_token' => csrf_token() ])}}",
        filebrowserUploadMethod: 'form'
    });
    // with plugin options
    $("#service_detail_image").fileinput({
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