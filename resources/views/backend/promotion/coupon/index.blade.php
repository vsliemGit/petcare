{{-- View này sẽ kế thừa giao diện từ `backend.layouts.index` --}}
@extends('backend.layouts.index')

{{-- Thay thế nội dung vào Placeholder `title` của view `backend.layouts.index` --}}
@section('title')
Admin - List Coupons
@endsection

@section('custom-css')
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.7/css/jquery.dataTables.min.css">
{{-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"> --}}
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.22/css/dataTables.bootstrap.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.6.5/css/buttons.bootstrap.min.css">
{{-- <link rel='stylesheet' type='text/css' href='https://gyrocode.github.io/jquery-datatables-checkboxes/1.2.10/css/dataTables.checkboxes.css'> --}}

<style>
  td.details-control {
    background: url('https://datatables.net/examples/resources/details_open.png') no-repeat center center;
    cursor: pointer;
  }
  tr.shown td.details-control {
      background: url('https://datatables.net/examples/resources/details_close.png') no-repeat center center;
  }
  table.dataTable thead .sorting{
    background-image:none
  }
  table.dataTable thead .sorting_desc{
    background-image:none
  }
  table.dataTable thead .sorting_asc{
    background-image:none
  }
</style>
@endsection


{{-- Thay thế nội dung vào Placeholder `main-content` của view `backend.layouts.index` --}}
@section('main-content')
<section class="wrapper">
  <div class="table-agile-info">
    <div class="panel panel-default">
      <div class="panel-heading">
          List Coupons
      </div>
    </div>
    <!--table-->
    <div class="table-responsive"  id="tag_container">
      <div class="flash-message">
        @foreach (['danger', 'warning', 'success', 'info'] as $msg)
          @if(Session::has('alert-' . $msg))
          <p id="flash-message" class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }} <a  href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
          @endif
        @endforeach
      </div>
      <table id="example" class="table table-striped b-t b-light datatable">
        <thead >
            <tr>
              <th></th>
              <th>No.</th>
              <th>Name</th>
              <th>Code</th>
              <th>Number</th>
              <th>Times</th>
              <th>Condition</th>
              <th>Status</th>
              <th>Action</th>
            </tr>
        </thead>
        <tbody>
        </tbody>
      </table> 
    </div>
    {{-- modal --}}
    {{-- @include('backend.brand.modal')
    @include('backend.brand.modal_import_excel') --}}
  </div>
</section>
 <!-- footer -->
@include('backend.layouts.partials.footer')
<script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.5/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.flash.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.print.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.html5.min.js"></script>

<script>
    //Set timeout close flash-message
    $("#flash-message").delay(2000).slideUp(1000, function() {
          $(this).alert('close');
      });

    var table;

    $(document).ready(function() {
      table = $('.datatable').DataTable({
            processing: true,
            serverSide: true,        
            ajax: "{{ route('coupon.index') }}",
            columns: [
              {
                    "className":      'details-control',
                    "orderable":      false,
                    "searchable":     false,
                    "data":           null,
                    "defaultContent": ''
                },
                {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                {data: 'coupon_name', name: 'coupon_name'},
                {data: 'coupon_code', name: 'coupon_code'}, 
                {data: 'coupon_number', name: 'coupon_number'},
                {data: 'coupon_times', name: 'coupon_times'},
                {data: 'condition', name: 'condition'},
                {data: 'status',  name: 'status',  orderable: false,  searchable: false },
                {data: 'action', name: 'action',  orderable: false,  searchable: false },
            ],
            dom: 'Bfrtip',
        });
        // Add event listener for opening and closing details
        $('#example tbody').on('click', 'td.details-control', function () {
            var tr = $(this).closest('tr');
            var row = table.row( tr );
    
            if ( row.child.isShown() ) {
                // This row is already open - close it
                row.child.hide();
                tr.removeClass('shown');
            }
            else {
                // Open this row
                row.child( format(row.data()) ).show();
                tr.addClass('shown');
            }
        } );  
    });

  function format ( d ) {
      return '<table cellpadding="5" cellspacing="0" border="0" style="padding-left:50px;">'+
          '<tr>'+
              '<td>ID:</td>'+
              '<td>'+d.coupon_id+'</td>'+
          '</tr>'+
          '<tr>'+
              '<td>Name:</td>'+
              '<td>'+d.coupon_name+'</td>'+
          '</tr>'+
          '<tr>'+
              '<td>Code :</td>'+
              '<td>'+d.coupon_code+'</td>'+
          '</tr>'+
          '<tr>'+
            '<td>Number:</td>'+
              '<td>'+d.coupon_number+'</td>'+
          '</tr>'+ 
          '<td>Created at:</td>'+
              '<td>'+d.coupon_created_at+'</td>'+
          '</tr>'+
          '<td>Updated at:</td>'+
              '<td>'+d.coupon_updated_at+'</td>'+
          '</tr>'
      '</table>';  
  }
  //Setup CSRF to AJAX
  $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    //Delete Using AJAX
    function deleteItemAjax(brand_id){  
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
          var url = "{{route('coupon.destroy')}}";
          $.ajax({
            url: url,
            type: 'POST',
            data: {id: brand_id}
          }).done(function(data){
            table.ajax.reload();
            swal('Deleted!', 'Your file is deleted...', 'success');
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
        let allIdDelete = [];
        //Get all id of items is checked
        $(".sub_chk:checked").each(function(){
          allIdDelete.push($(this).data('id'));
        });
        if(allIdDelete.length <= 0){
          alert("Please select rows to delete!");
        }else{
          let check = confirm("Are you sure you want to delete this row?");
          if(check == true){
            $.ajax({
              url : "{{route('coupon.destroy')}}",
              type: "POST",
              data : {
                id : allIdDelete
              }
            }).done(function(data){
              getData("1");
            }).error(function(data){
              alert("Error!", "Have an error when you try to delete...", "error");
              console.log(data);
            });
          }
        }
      }
    
</script>
@endsection