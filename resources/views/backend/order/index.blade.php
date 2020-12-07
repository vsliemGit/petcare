{{-- View này sẽ kế thừa giao diện từ `backend.layouts.index` --}}
@extends('backend.layouts.index')

{{-- Thay thế nội dung vào Placeholder `title` của view `backend.layouts.index` --}}
@section('title')
Admin - List Order
@endsection

{{-- Thay thế nội dung vào Placeholder `main-content` của view `backend.layouts.index` --}}
@section('main-content')
<section class="wrapper">
    <div class="table-agile-info">
        <div class="panel panel-default">
            <div class="panel-heading">
                List Orders
            </div>
            <div class="row w3-res-tb">
                <div class="col-sm-4 m-b-xs">
                  <select id="action-tool" class="input-sm form-control w-sm inline v-middle">
                    <option value="" selected hidden>Choose tools</option>
                    <option value="0">Add item</option>
                    <option value="1">Export Excel</option>
                    <option value="2">Import Excel</option>
                    <option value="3">Create PDF</option>
                    <option value="4">Delete items</option>
                  </select>
                  <button id="btn-action-tool" class="btn btn-sm btn-default">Apply</button>              
                </div>
                <div class="col-sm-5">
                  <select id="select-filter-status" class="input-sm form-control w-sm inline v-middle">
                    <option value="all" selected>All status</option>
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
            <!--table-->
    <div class="table-responsive"  id="tag_container">
        {{-- flash-message --}}
        {{-- content-table --}}
        @include('backend.order.table-data')
        
      </div>
</section>
 <!-- footer -->
 @include('backend.layouts.partials.footer')
 <script>
  //Pagination AJAX
  $(window).on('hashchange', function() {
          if (window.location.hash) {
              var page = window.location.hash.replace('#', '');
              if (page == Number.NaN || page <= 0) {
                  return false;
              }else{
                  getData(page);
              }
          }
      })
      
      $(document).ready(function()
      {
          $(document).on('click', '.pagination a',function(event)
          {
              event.preventDefault();
              $('li').removeClass('active');
              $(this).parent('li').addClass('active');
              var page = $(this).attr('href').split('page=')[1];
              getData(page);
          });
      });
  
      //Reload table html
      function getData(page){
          $.ajax(
          {
              url: '?page=' + page,
              type: "GET",
          }).done(function(data){
              $("#tag_container").html(data);
              location.hash = page;
          }).fail(function(jqXHR, ajaxOptions, thrownError){
              swal("Error!", "No response from server...", "error");
          });
      }
      // End Pagination using AJAX
  </script>
@endsection