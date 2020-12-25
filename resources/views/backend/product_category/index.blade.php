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
          @include('backend.product_category.table-data')
    </div>
    {{-- modal --}}
    @include('backend.product_category.modal')
    @include('backend.product_category.modal_import_excel')
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

  // codes works on all bootstrap modal windows in application
    $('#modal').on('hidden.bs.modal', function(e)
    { 
        $(this).removeData();
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
      getDataFromStatus($("#select-filter-status").val());
    });

    function getDataFromStatus(value){
      $.ajax(
        { url: "{{route('product_category.filter_status')}}",
          type: 'GET',
          data: {
            value : value
          }
        })
      .done(function(data){
        $("#tag_container").empty().html(data);
      }).fail(function(jqXHR, ajaxOptions, thrownError){
        swal("Error!", "No response from server...", "error");
      });
    }

    //Changing status of item
    $('body').on('click', '.change-item', function(){
      event.preventDefault();
      let pageNumber = $('.pagination').find('.active').children().text();
      $.ajax({
        url : "{{route('product_category.changeStatus')}}",
        method : 'POST',
        data : {
          id : $(this).parent().find('.td-id').text(),
          value : $(this).children().data('id')
        }
      }).done(function(data){
          $("#tag_container").empty().html(data);
          getData(pageNumber);
      }).error(function(data){
        console.log(data);
      });
    });

    //Delete Using AJAX
    function deleteItemAjax(product_id){  
      let currentPageNumner =  $('.pagination').find('.active').children().text();
      swal({
        title: "Are you sure?",
        text: "Once deleted, you will not be able to recover this file!",
        icon: "warning",
        buttons: true,
        dangerMode: true,
      }).then((willDelete) => {
        if (willDelete) {
          var page = window.location.hash.replace('#', '');
          var url = "{{route('product_category.destroy')}}";
          $.ajax({
            url: url,
            type: 'DELETE',
            data: {id: product_id}
          }).done(function(data){
            swal('Deleted!', 'Your file is deleted...', 'success');
            $("#tag_container").empty().html(data);
            getData(currentPageNumner);
          }).error(function(data){
            console.log(data);
            swal("Error!", "No response from server...", "error");
          });
        } else {
          swal("Cancel!", "Your file isn't deleted...", "info");
        }
      });
    }

    //Delete multi items
    function deleteMultiItem(){
        var allIdDelete = [];
        //Get all id of items is checked
        $(".sub_chk:checked").each(function(){
          allIdDelete.push($(this).data('id'));
        });
        if(allIdDelete.length <= 0){
          alert("Please select rows to delete!");
        }else{
          var check = confirm("Are you sure you want to delete this row?");
          if(check == true){
            $.ajax({
              url : "{{route('product_category.destroy')}}",
              type: "DELETE",
              data : {
                id : allIdDelete
              },
              headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            }).done(function(data){
              $("#tag_container").empty().html(data);
              getData("1");
            }).error(function(data){
              alert("Error!", "Have an error when you try to delete...", "error");
              console.log(data);
            });
          }
        }
      }
    }
    
    //Action tool
    $("#btn-action-tool").click(function(){
      var n = $("#action-tool").val();
      switch(n) {
         case "0": 
          resetModal();
          openModal("ADD NEW PRODUCT CATEGOGY", "Add");
          $("#action").val("Add");
          break;
        case "3":
          createPDF();
          break;
        case "1":
          exportExcel();
          break;
        case "2":
          openModalImportExcel();
          break;
        case "4":
          deleteMultiItem();
          break;
        default:
        // code to be executed if n is different from case 1 and 2
      }   
    });

    //Create file PDF from table
    function createPDF(){
      window.open("{{route('product_category.pdf')}}", "directories=no,titlebar=no,toolbar=no,location=no,status=no,menubar=no,scrollbars=yes,resizable=yes");
    }

    //Export file Excel from talbes
    function exportExcel(){
      window.open("{{route('product_category.export_excel')}}", "directories=no,titlebar=no,toolbar=no,location=no,status=no,menubar=no,scrollbars=yes,resizable=yes");
    }

    //Open modal to upload file import Excel
    function openModalImportExcel(){
      $('#uploadModal').modal("show");
    }

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
      if($("#action").val() === "Add"){
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
            _modal.modal('hide');
            swal('Successfully!', 'Add '+name+' is successfuly...', 'success');
            $("#tag_container").empty().html(data);
            getData("1");
            $("#action").val("");
          },
          error: function(data){
            _modal.modal('hide');
            swal("Error!", "Have an error when you try to add...", "error");
          }
        });
      }
    }
    //Edit item using AJAX
    $("body").on('click', '.edit-item', function(){
      event.preventDefault();
      //Get value in feild
      let currentPageNumner =  $('.pagination').find('.active').children().text();
      let id = $(this).parent().parent().find('.td-id').text();
      let name = $(this).parent().parent().find('.td-name').text();
      let slug = $(this).parent().parent().find('.td-slug').text();
      let desc = $(this).parent().parent().find('.td-desc span').text();
      let status = $(this).parent().parent().find('.td-status a').data('id');
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
        if($("#action").val() !== "Add"){
          name = $('#pro_category_name').val();
          slug = $('#pro_category_slug').val();
          desc = $('#pro_category_desc').val();
          status = $('#pro_category_status').val();
          editItemUsingAjax({id, name, slug, desc, status });
        }
      });
    });

    function editItemUsingAjax(data){
      $.ajax({
          url: "{{ route('product_category.update') }}",
          type: 'POST',
          data: {
            pro_category_id : data.id,
            pro_category_name : data.name,
            pro_category_slug : data.slug,
            pro_category_desc : data.desc,
            pro_category_status : data.status
          },
          success: function(data){
            console.log(data);
            _modal.modal('hide');
            swal('Successfully!', 'Edit ""'+name+'" is successfuly...', 'success');
            $("#tag_container").empty().html(data);
            getData(currentPageNumner);
          },
          error: function(data){
            console.log(data);
            _modal.modal('hide');
            swal("Error!", "Have an error when you try to edit...", "error");
          }
        }     
      );
    }
</script>
@endsection   