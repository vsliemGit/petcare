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
        <th>ID</th>
        <th>Image</th>
        <th>Name</th>
        <th>Price</th>
        <th>Status</th>
        <th>Quantity</th>
        <th>Category</th>
        <th>Brand</th>
        <th style="width:30px;"></th>
      </tr>
      </thead>
      <tbody>
      @php $i = 0;  @endphp
      @foreach($listProducts as $product)
      @php $i++;  @endphp
      <tr id="row_for_product_{{$product->product_id}}">
          <td><label class="i-checks m-b-none"><input type="checkbox" class="sub_chk" data-id="{{ $product->product_id }}"><i></i></label></td>
          <td class="td-id">{{ $product->product_id }}</td>
          <td><img src="{{ asset('storage/images/' . $product->product_image) }}" class="img-list" /></td>
          <td class="td-name"><span class="text-ellipsis">{{ $product->product_name }}</span></td>
          <td class="td-name"><span class="text-ellipsis">{{ number_format($product->product_price) }}</span></td>
          <td class="td-status change-item">
            <?php if($product->product_status == 1){ ?>
              <a data-id="1" href="javascript:void(0)"><span data-id="1"class="fa fa-check text-success text-active"></span></a>
                    <?php  }else{ ?>  
              <a data-id="0" href="javascript:void(0)"><span class="fa fa-times text-danger text"></span></a>
            <?php  } ?>
          </td>
          <td><span class="text-ellipsis">{{ number_format($product->product_quantity) }}</span></td>
          <td><span class="text-ellipsis">{{ $product->category->pro_category_name }}</span></td>
          <td><span class="text-ellipsis">{{ $product->brand->brand_name }}</span></td>
          <td>
          <a href="{{ route('product.edit', ['id' => $product->product_id])}} "
              class="active styling-edit edit-item" ui-toggle-class="">
              <i class="fa fa-pencil-square-o text-success text-active"></i></a>
          <a onclick="deleteItemAjax({{$product->product_id}})"        
              href="javascript:void(0)"
              id="remove-step-form"
              class="active styling-edit" ui-toggle-class="">
              <i class="fa fa-trash-o" style="color: red;"></i>
          </a>
          <a href="{{ route('product.detail', ['id' => $product->product_id])}} "
            id="remove-step-form"
            class="active styling-edit" ui-toggle-class="">
            <i class="fa fa-building-o"></i>
          </a>
          </td>
      </tr>
      @endforeach
      @php
        while($i < 5){
          echo "<tr><td><label class='i-checks m-b-none'><input type='checkbox' name='post[]''><i></i></label></td><td>&nbsp</td><td>&nbsp</td><td>&nbsp</td><td>&nbsp</td><td>&nbsp</td><td>&nbsp</td><td>&nbsp</td><td>&nbsp</td></tr>";
          $i++;
        }
      @endphp
      </tbody>
  </table>
  {{-- footer --}}
  <footer class="panel-footer">
    <div class="row">
      <div class="col-sm-5 text-center">
        <small class="text-muted inline m-t-sm m-b-sm">showing {{$listProducts->firstItem()}}-{{$listProducts->lastItem()}} of {{$listProducts->total()}} items</small>
      </div>
      <div class="col-sm-7 text-right text-center-xs">                
        {{ $listProducts->links()}}
      </div>
    </div></footer>
  
  <script>
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