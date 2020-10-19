{{-- View này sẽ kế thừa giao diện từ `backend.layouts.index` --}}
@extends('backend.layouts.index')
{{-- Thay thế nội dung vào Placeholder `title` của view `backend.layouts.index` --}}
@section('title')
Admin - List Product categories
@endsection
{{-- Thay thế nội dung vào Placeholder `main-content` của view `backend.layouts.index` --}}
@section('main-content')
<section class="wrapper">
  <div class="table-agile-info">
    <div class="panel panel-default">
      <div class="panel-heading">
          Product Categories Table
      </div>
      <div class="row w3-res-tb">
      <div class="col-sm-4 m-b-xs">
        <select class="input-sm form-control w-sm inline v-middle">
          <option value="0">Export PDF</option>
          <option value="1">Export Excel</option>
          <option value="2">Delete items</option>
          <option value="3">No check</option>
        </select>
        <button class="btn btn-sm btn-default">Apply</button>              
      </div>
      <div class="col-sm-5">
        <select id="select-filter-status"class="input-sm form-control w-sm inline v-middle">
          <option value="" selected disabled hidden>All status</option>
          <option value="1">Active</option>
          <option value="0">Noactive</option>
        </select>
        <button id="btn-filter-status" class="btn btn-sm btn-default">Apply</button>
      </div>
      <div class="col-sm-3">
        <div class="input-group">
          <input type="text" class="input-sm form-control" placeholder="Search">
          <span class="input-group-btn">
            <button class="btn btn-sm btn-default" type="button">Go!</button>
          </span>
        </div>
      </div>
    </div>
    
    <div class="flash-message">
      @foreach (['danger', 'warning', 'success', 'info'] as $msg)
        @if(Session::has('alert-' . $msg))
        <p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }} <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
        @endif
      @endforeach
    </div>
    <!--table-->
    @include('backend.product_category.table-data')
  </div>
</section>
 <!-- footer -->
@include('backend.layouts.partials.footer')
@endsection   