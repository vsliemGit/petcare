{{-- View này sẽ kế thừa giao diện từ `backend.layouts.index` --}}
@extends('backend.layouts.index')

{{-- Thay thế nội dung vào Placeholder `title` của view `backend.layouts.index` --}}
@section('title')
Admin - List Sales
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
          List Sales
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
              <th>Condition</th>
              <th>Number</th>
              <th>Start date</th>
              <th>End date</th>
              <th>Status</th>
              <th>Created at</th>
              <th>Action</th>
            </tr>
        </thead>
        <tbody>
        </tbody>
      </table> 
    </div>
  </div>
</section>
 <!-- footer -->
@include('backend.layouts.partials.footer')
<!-- jQuery -->
{{-- <script src="http://code.jquery.com/jquery.js"></script> --}}
<!-- DataTables -->
{{-- <script src="http://cdn.datatables.net/1.10.7/js/jquery.dataTables.min.js"></script> --}}
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.5/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.flash.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.print.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.html5.min.js"></script>
{{-- <script src="https://cdn.datatables.net/select/1.3.1/css/select.dataTables.min.css"></script>

{{-- <script type='text/javascript' src='https://gyrocode.github.io/jquery-datatables-checkboxes/1.2.10/js/dataTables.checkboxes.min.js'></script> --}}
<script type=text/javascript>
 $("#flash-message").delay(2000).slideUp(1000, function() {
        $(this).alert('close');
    });
function format ( d ) {
    // `d` is the original data object for the row
    return '<table cellpadding="5" cellspacing="0" border="0" style="padding-left:50px;">'+
        '<tr>'+
            '<td>ID:</td>'+
            '<td>'+d.sale_id+'</td>'+
        '</tr>'+
        '<tr>'+
            '<td>Name :</td>'+
            '<td>'+d.sale_name+'</td>'+
        '</tr>'+
        '<tr>'+
          '<td>Updated at:</td>'+
            '<td>'+d.sale_updated_at+'</td>'+
        '</tr>'+
    '</table>';
}
var table;
  $(document).ready(function() {
  table = $('.datatable').DataTable({
        processing: true,
        serverSide: true,
        ajax: "{{ route('sale.index') }}",
        columns: [
           {
                "className":      'details-control',
                "orderable":      false,
                "searchable":     false,
                "data":           null,
                "defaultContent": ''
            },
            {data: 'DT_RowIndex', name: 'DT_RowIndex'},
            {data: 'sale_name', name: 'sale_name'},
            {data: 'condition', name: 'condition'},
            {data: 'sale_number', name: 'sale_number'},
            {data: 'sale_start_date', name: 'sale_start_date'},
            {data: 'sale_end_date', name: 'sale_end_date'}, 
            {data: 'status',  name: 'status',  orderable: false,  searchable: false },
            {data: 'sale_created_at', name: 'sale_created_at'},
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
          var url = "{{route('sale.destroy')}}";
          $.ajax({
            url: url,
            type: 'POST',
            data: {id: brand_id}
          }).done(function(data){
            table.ajax.reload();
            swal('Deleted!', 'Your file is deleted...', 'success');
          }).fail(function(data){
            console.log(data);
            swal("Error!", "No response from server...", "error");
          });
        } else {
          swal("Cancel!", "Your file isn't deleted...", "info");
        }
      });
    }
  

</script>
@endsection