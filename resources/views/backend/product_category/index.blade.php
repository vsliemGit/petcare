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
        <select id="action-tool" class="input-sm form-control w-sm inline v-middle">
          <option value="" selected hidden>Choose tools</option>
          <option value="0">Export PDF</option>
          <option value="1">Export Excel</option>
          <option value="2">Add item</option>
          <option value="3">Delete items</option>
          <option value="4">No check</option>
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
      @include('backend.product_category.table-data')
      {{-- footer --}}
    </div>
    {{-- modal --}}
    @include('backend.product_category.modal')
  </div>
</section>
 <!-- footer -->
@include('backend.layouts.partials.footer')

<script type="text/javascript">
  var _modal = $('#modal');
  //Binding field name to slug
    $(document).ready(function(){
        $("#name_product_category").keyup(function(){
            var valueName = changToSlug($("#name_product_category").val());
            $("#slug_product_category").val(valueName);
        })
  });

  //Set timeout close flash-message
  $("#flash-message").delay(5000).slideUp(1000, function() {
    $(this).alert('close');
  });

  //Check all checkbox
  $("#check-all").click(function(){
    $('input:checkbox').not(this).prop('checked', this.checked);
  });

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

    //Setup CSRF to AJAX
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    //Filter status of product category
    $("#btn-filter-status").click(function(){
      var value = $("#select-filter-status").val(); 
      getDataFromStatus(value);
    });

    function getDataFromStatus(value){
      var url = 'http://localhost/petcare/public/admin/product-category/filter-status/'+ value;
      $.ajax({ url: url,type: 'GET', datatype: "html"})
      .done(function(data){
        $("#tag_container").empty().html(data);
      }).fail(function(jqXHR, ajaxOptions, thrownError){
        swal("Error!", "No response from server...", "error");
      });
    }

    //Changing status of item
    $('body').on('click', '.change-item', function(){
      event.preventDefault();
      let currentURL = window.location.href;
      $.ajax({
        url : "{{route('product_category.changeStatus')}}",
        method : 'POST',
        data : {
          id : $(this).parent().find('.td-id').text(),
          value : $(this).children().data('id')
        }
      }).done(function(data){
          location.hash = $('.pagination a').attr('href').split('page=')[0];
          $("#tag_container").empty().html(data);
          location = currentURL;
      }).error(function(data){
        console.log(data);
      });
    });

    //Delete Using AJAX
    function deleteItemAjax(product_id){  
      let currentURL = window.location.href;
      swal({
        title: "Are you sure?",
        text: "Once deleted, you will not be able to recover this file!",
        icon: "warning",
        buttons: true,
        dangerMode: true,
      }).then((willDelete) => {
        if (willDelete) {
          var page = window.location.hash.replace('#', '');
          var url = "http://localhost/petcare/public/admin/product-category/delete/" + product_id;
          $.ajax({
            url: url,
            type: 'DELETE',
            datatype: "json"
          }).done(function(data){
            swal('Deleted!', 'Your file is deleted...', 'success');
            location.hash = $('.pagination a').attr('href').split('page=')[0];
            $("#tag_container").empty().html(data);
            location = currentURL;
          }).fail(function(jqXHR, ajaxOptions, thrownError){
            swal("Error!", "No response from server...", "error");
          });
            } else {
              swal("Cancel!", "Your file isn't deleted...", "info");
            }
      });
    }
    
    //Action tool
    $("#btn-action-tool").click(function(){
      var n = $("#action-tool").val();
      switch(n) {
         case "2": 
          resetModal();
          openModal("ADD NEW PRODUCT CATEGOGY", "Add");
          $("#action").val("Add");
          break;
        case 0:
          //execute code block 2
          break;
        default:
        // code to be executed if n is different from case 1 and 2
      }   
    });

    //Open modal(set title and text for action button)
    function openModal(title, textButton){
        _modal.find('.modal-title').text(title);
        _modal.find('#btn-action').text(textButton); 
        _modal.modal('show');
    }

    //Reset value in modal to null
    function resetModal(){
      _modal.find('input').each(function(){
        $(this).val(null);
      });
      $('textarea').val(null);
      $('select').val(null);
    }


    //Create item using AJAX
    function createItemUsingAjax(){
      if($("#action").val() == "Add"){
        var name = $('#pro_category_name').val();
        var slug = $('#pro_category_slug').val();
        var desc = $('#pro_category_desc').val();
        var status = $('#pro_category_status').val();
        $.ajax({
          url: "{{route('product_category.store')}}",
          method : 'POST',
          data: {
            pro_category_name : name,
            pro_category_slug : slug,
            pro_category_desc : desc,
            pro_category_status : status
          },
          success: function(data){
            _modal.modal('toggle');
            swal('Successfully!', 'Add '+name+' is successfuly...', 'success');
            location.hash = $('.pagination a').attr('href').split('page=')[0];
            $("#tag_container").empty().html(data);
          },
          error: function(data){
            swal("Error!", "Have an error when you try to add...", "error");
          }
        });
      }
    }

    //Edit item using AJAX
    $("body").on('click', '.edit-item', function(){
        event.preventDefault();
        //Get value in feild
        var currentURL = window.location.href;
        var id = $(this).parent().parent().find('.td-id').text();
        var name = $(this).parent().parent().find('.td-name').text();
        var slug = $(this).parent().parent().find('.td-slug').text();
        var desc = $(this).parent().parent().find('.td-desc span').text();
        var status = $(this).parent().parent().find('.td-status a').data('id');
        //Open modal
        openModal('EDIT PRODUCT CATEGORY', 'Save changes');
        _modal.modal('show');
        //Set value for modal
        $('input[name="pro_category_name"]').val(name);
        $('input[name="pro_category_slug"]').val(slug);
        $('textarea[name="pro_category_desc"').val(desc);
        $('select[name="pro_category_status"]').val(status);
        //Edit item whem click btn-action
        $('#btn-action').on('click', function(){
          event.preventDefault();
          name = $('#pro_category_name').val();
          slug = $('#pro_category_slug').val();
          desc = $('#pro_category_desc').val();
          status = $('#pro_category_status').val();
          $.ajax({
              url: "{{ route('product_category.update') }}",
              type: 'POST',
              data:{
                pro_category_id : id,
                pro_category_name : name,
                pro_category_slug : slug,
                pro_category_desc : desc,
                pro_category_status : status
              },
              success: function(data){
                _modal.modal('hide');
                swal('Successfully!', 'Edit ""'+name+'" is successfuly...', 'success');
                $("#tag_container").empty().html(data);
                location.hash = $('.pagination a').attr('href').split('page=')[0];
                location = currentURL;
              },
              error: function(d){
                console.log(data);
                _modal.modal('hide');
                swal("Error!", "Have an error when you try to edit...", "error");
              }
            }     
          );
        });
      });
</script>
@endsection   