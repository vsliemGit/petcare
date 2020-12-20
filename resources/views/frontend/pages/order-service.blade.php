{{-- View này sẽ kế thừa giao diện từ `frontend.layouts.master` --}}
@extends('frontend.layouts.master')

{{-- Thay thế nội dung vào Placeholder `title` của view `frontend.layouts.index` --}}
@section('title')
Order Service | PETCARE
@endsection

@section('custom-css')
<style>

</style>
@endsection

{{-- Content of index --}}
@section('main-content')
<div id="contact-page" class="container">  
    @include('frontend.widgets.order-services')
</div><!--/#contact-page-->
@endsection