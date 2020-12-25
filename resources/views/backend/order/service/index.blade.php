{{-- View này sẽ kế thừa giao diện từ `backend.layouts.index` --}}
@extends('backend.layouts.index')

{{-- Thay thế nội dung vào Placeholder `title` của view `backend.layouts.index` --}}
@section('title')
Admin - List Order Service
@endsection

@section('custom-css')
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.7/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.22/css/dataTables.bootstrap.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.6.5/css/buttons.bootstrap.min.css">

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
                List Orders Service
            </div>
            <!--table-->
    <div class="table-responsive"  id="tag_container">
      <table id="example" class="table table-striped b-t b-light datatable">
        <thead >
            <tr>
              <th style="width:20px;">
              </th>
              <th>No.</th>
              <th>ID</th>
              <th>Customer</th>
              <th>Time</th>
              <th>Date Begin</th>
              <th>Status</th>
              <th>Created at</th>
              <th style="width:30px;"></th>
            </tr>
        </thead>
        <tbody>
        </tbody>
      </table>
    </div>
</section>
<!-- footer -->
@include('backend.layouts.partials.footer')
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.5/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.flash.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.print.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.html5.min.js"></script>
<script>
  function format ( d ) {
        // `d` is the original data object for the row
        return '<table cellpadding="5" cellspacing="0" border="0" style="padding-left:50px;">'+
            '<tr>'+
                '<td>ID:</td>'+
                '<td>'+d.order_service_id+'</td>'+
            '</tr>'+
            '<tr>'+
                '<td>Adress :</td>'+
                '<td>'+d.order_service_time+'</td>'+
            '</tr>'+
            '<tr>'+
                '<td>To Name :</td>'+
                '<td>'+d.customer+'</td>'+
            '</tr>'+
            '<tr>'+
                '<td>To Email :</td>'+
                '<td>'+d.order_service_date_begin+'</td>'+
            '</tr>'
        '</table>';
    }
    $(document).ready(function() {
      var table = $('.datatable').DataTable({
            processing: true,
            serverSide: true,   
            ajax: "{{ route('order.service.index') }}",
            columns: [
                {
                    "className":      'details-control',
                    "orderable":      false,
                    "searchable":     false,
                    "data":           null,
                    "defaultContent": ''
                },
                {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                {data: 'order_service_id', name: 'order_service_id'},
                {data: 'customer', name: 'customer'},
                {data: 'order_service_time', name: 'order_service_time'},
                {data: 'order_service_date_begin', name: 'order_service_date_begin'},
                {data: 'status',  name: 'status',  orderable: false,  searchable: false },
                {data: 'order_created_at', name: 'order_created_at'},
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
</script>
@endsection