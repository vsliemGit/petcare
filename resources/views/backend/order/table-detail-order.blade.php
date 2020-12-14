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
            <label class="i-checks m-b-none">
                <input  id="check-all" type="checkbox"><i></i>
            </label>
          </th>
          <th>ID Product</th>
          <th>Image Product</th>
          <th>Name Product</th>
          <th>Basic Price</th>
          <th>Price of Product</th>
          <th>Quantiry in Order</th>
      </tr>
      </thead>
      <tbody>
      @php $i = 0;  @endphp
      @foreach($order->detail as $item)
      @php $i++;  @endphp
      <tr>
          <td><label class="i-checks m-b-none"><input type="checkbox" class="sub_chk" data-id="{{ $item->product_id }}"><i></i></label></td>
          <td class="td-id"><span class="text-ellipsis">{{ $item->product_id}}</span></td>
          <td><img src="{{ asset('storage/images/' . $item->product_image) }}" class="img-list" /></td>
          <td class="td-name"><span class="text-ellipsis">{{ $item->product_name}}</span></td>
          <td class="td-price"><span class="text-ellipsis">{{ number_format($item->product_price) }}</span></td>
          <td class="td-price"><span class="text-ellipsis">{{ number_format($item->product_basis_price) }}</span></td>
          <td class="td-quantity"><span class="text-ellipsis">{{ $item->pivot->order_detail_quantity }}</span></td>
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