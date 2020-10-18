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
  <div class="col-sm-5 m-b-xs">
    <select class="input-sm form-control w-sm inline v-middle">
      <option value="0">Export PDF</option>
      <option value="1">Export Excel</option>
      <option value="2">Delete items</option>
      <option value="3">No check</option>
    </select>
    <button class="btn btn-sm btn-default">Apply</button>                
  </div>
  <div class="col-sm-4">
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

<div class="table-responsive">
  <table class="table table-striped b-t b-light">
    <thead>
      <tr>
        <th style="width:20px;">
          <label class="i-checks m-b-none">
            <input type="checkbox"><i></i>
          </label>
        </th>
        <th>ID</th>
        <th>Name</th>
        <th>Slug</th>
        <th>Describe</th>
        <th>Status</th>
        <th>Created at</th>
        <th>Updated at</th>
        <th style="width:30px;"></th>
      </tr>
    </thead>
    <tbody>
      @foreach($listProductCategories as $productCatetory)
      <tr>
        <td><label class="i-checks m-b-none"><input type="checkbox" name="post[]"><i></i></label></td>
        <td>{{ $productCatetory->pro_category_id }}</td>
        <td><span class="text-ellipsis">{{ $productCatetory->pro_category_name }}</span></td>
        <td><span class="text-ellipsis">{{ $productCatetory->pro_category_slug }}</span></td>
        <td><span class="text-ellipsis">{{ $productCatetory->pro_category_desc }}</span></td>
        <td><span class="text-ellipsis" >
          <?php if($productCatetory->pro_category_status == 1){ ?>
          <a href="{{Route('product_category.changeStatus', ['id'=> $productCatetory->pro_category_id])}}"><span class="fa fa-check text-success text-active"></span></a>
                <?php  }else{ ?>  
                 <a href="{{Route('product_category.changeStatus', ['id'=> $productCatetory->pro_category_id])}}"><span class="fa fa-times text-danger text"></span></a>
          <?php  } ?>
        </span></td>
        <td><span class="text-ellipsis">{{ $productCatetory->pro_category_created_at }}</span></td>
        <td><span class="text-ellipsis">{{ $productCatetory->pro_category_updated_at }}</span></td>
        <td>
          <a href="{{ Route('product_category.edit', ['id'=> $productCatetory->pro_category_id]) }}" class="active styling-edit" ui-toggle-class="">
            <i class="fa fa-pencil-square-o text-success text-active"></i></a>
          <a onclick="return confirm('Bạn có chắc là muốn xóa danh mục này ko?')" href="{{Route('product_category.destroy', ['id'=> $productCatetory->pro_category_id])}}" class="active styling-edit" ui-toggle-class="">
            <i class="fa fa-trash-o" style="color: red;"></i>
          </a>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>
<footer class="panel-footer">
  <div class="row">
    
    <div class="col-sm-5 text-center">
      <small class="text-muted inline m-t-sm m-b-sm">showing 20-30 of 50 items</small>
    </div>
    <div class="col-sm-7 text-right text-center-xs">                
      {{-- <ul class="pagination pagination-sm m-t-none m-b-none">
        <li><a href=""><i class="fa fa-chevron-left"></i></a></li>
        <li><a href="">1</a></li>
        <li><a href="">2</a></li>
        <li><a href="">3</a></li>
        <li><a href="">4</a></li>
        <li><a href=""><i class="fa fa-chevron-right"></i></a></li>
      </ul> --}}
      {{ $listProductCategories->links()}}
    </div>
  </div>
</footer>
</div>
</div>
 <!-- footer -->
@include('backend.layouts.partials.footer')

<script>
</script>
@endsection