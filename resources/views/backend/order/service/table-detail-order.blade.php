{{-- table-data --}}
{{-- flash-message --}}
<div class="flash-message">
    @foreach (['danger', 'warning', 'success', 'info'] as $msg)
      @if(Session::has('alert-' . $msg))
      <p id="flash-message" class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }} <a  href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
      @endif
    @endforeach
  </div>
  <table class="table table-striped b-t b-light">
      <thead>
      <tr>
        <th style="width:20px;">
            
        </th>
        <th>ID</th>
        <th>Image</th>
        <th>Name</th>
        <th>Created at</th>
        <th style="width:30px;"></th>
      </tr>
      </thead>
      <tbody>
      @php $i = 0;  @endphp
      @foreach($order_service->detail as $item)
      @php $i++;  @endphp
      <tr>
          <td><label class="i-checks m-b-none"><input type="checkbox" class="sub_chk" data-id="{{ $item->service_id }}"><i></i></label></td>
          <td class="td-id"><span class="text-ellipsis">{{ $item->service_id}}</span></td>
          <td><img src="{{ asset('storage/images/services/' . $item->service_image) }}" class="img-list" /></td>
          <td class="td-name"><span class="text-ellipsis">{{ $item->service_name}}</span></td>
          <td class="td-name"><span class="text-ellipsis">{{ $item->service_created_at}}</span></td>
      </tr>
      @endforeach
      </tbody>
  </table>
  {{-- footer --}}
  {{-- <footer class="panel-footer">
    <div class="row">
      <div class="col-sm-5 text-center">
        <small class="text-muted inline m-t-sm m-b-sm">showing {{$order_detail->firstItem()}}-{{$order_detail->lastItem()}} of {{$order_detail->total()}} items</small>
      </div>
      <div class="col-sm-7 text-right text-center-xs">                
        {{ $order_detail->links()}}
      </div>
    </div></footer> --}}
  
<script>
  //Set timeout close flash-message
      $("#flash-message").delay(2000).slideUp(1000, function() {
      $(this).alert('close');
  });
  //Check all checkbox
    $(document).ready(function() {
      $('#check-all').on('click', function(e) {
           if($(this).is(':checked',true))  
           {
              $(".sub_chk").prop('checked', true);  
           } else {  
              $(".sub_chk").prop('checked',false);  
           }  
      });
  
      $('.sub_chk').on('click',function(){
        if($('.sub_chk:checked').length == $('.sub_chk').length){
          $('#check-all').prop('checked',true);
        }else{
          $('#check-all').prop('checked',false);
        }
      });
    });
  </script>