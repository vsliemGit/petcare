{{-- View này sẽ kế thừa giao diện từ `frontend.layouts.master` --}}
@extends('frontend.layouts.master')

{{-- Thay thế nội dung vào Placeholder `title` của view `frontend.layouts.index` --}}
@section('title')
Order Service | PETCARE
@endsection

@section('custom-css')
{{-- jquery ui--}}
<link type="text/css" rel="stylesheet" href="vendor/jquery-ui/jquery-ui.min.css" />
<script src="vendor/jquery-ui/jquery-ui.min.js"></script>
<style>

</style>
@endsection

{{-- Content of index --}}
@section('main-content')
<div id="contact-page" class="container">  
    @include('frontend.widgets.order-services')
</div><!--/#contact-page-->
@endsection