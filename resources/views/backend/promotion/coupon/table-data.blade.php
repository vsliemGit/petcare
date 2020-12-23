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
          <th>Name</th>
          <th>Code</th>
          <th>Number</th>
          <th>Times</th>
          <th>Condition</th>
          <th>Status</th>
          <th>Created at</th>
          <th>Updated at</th>
          <th style="width:30px;"></th>
      </tr>
      </thead>
      <tbody>
      @php $i = 0;  @endphp
      @foreach($listCoupons as $coupon)
      @php $i++;  @endphp
      <tr>
          <td><label class="i-checks m-b-none"><input type="checkbox" class="sub_chk" data-id="{{ $coupon->coupon_id }}"><i></i></label></td>
          <td class="td-id">{{ $coupon->coupon_id }}</td>
          <td class="td-name"><span class="text-ellipsis">{{ $coupon->coupon_name }}</span></td>
          <td class="td-code"><span class="text-ellipsis">{{ $coupon->coupon_code }}</span></td>
          <td class="td-number"><span class="text-ellipsis">{{ $coupon->coupon_number }}</span></td>
          <td class="td-times"><span class="text-ellipsis">{{ $coupon->coupon_times }}</span></td>
          <td class="td-status change-item">
            <?php if($coupon->coupon_condition == 1){ ?>
              <span class="td-name"><span class="text-ellipsis"><i>Giảm theo VNĐ</i></span></span>
                    <?php  }else{ ?>  
              <span class="td-name"><span class="text-ellipsis"><i>Giảm theo % </i></span></span>
            <?php  } ?>
          </td>
          <td class="td-status change-item">
            <?php if($coupon->coupon_status == 1){ ?>
              <a data-id="1" href="javascript:void(0)"><span data-id="1"class="fa fa-check text-success text-active"></span></a>
                    <?php  }else{ ?>  
              <a data-id="0" href="javascript:void(0)"><span class="fa fa-times text-danger text"></span></a>
            <?php  } ?>
          </td>
          <td><span class="text-ellipsis">{{ $coupon->coupon_created_at }}</span></td>
          <td><span class="text-ellipsis">{{ $coupon->coupon_updated_at }}</span></td>
          <td>
          <a href="{{route('coupon.edit', ['id' => $coupon->coupon_id])}}"
              class="active styling-edit edit-item" ui-toggle-class="">
              <i class="fa fa-pencil-square-o text-success text-active"></i></a>
          <a onclick="deleteItemAjax({{$coupon->coupon_id}})"        
              href="javascript:void(0)"
              id="remove-step-form"
              class="active styling-edit" ui-toggle-class="">
              <i class="fa fa-trash-o" style="color: red;"></i>
          </a>
          </td>
      </tr>
      @endforeach
      @php
        while($i < 5){
          echo "<tr><td><label class='i-checks m-b-none'><input type='checkbox' name='post[]''><i></i></label></td><td>&nbsp</td><td>&nbsp</td><td>&nbsp</td><td>&nbsp</td><td>&nbsp</td><td>&nbsp</td><td>&nbsp</td><td>&nbsp</td><td>&nbsp</td><td>&nbsp</td></tr>";
          $i++;
        }
      @endphp
      </tbody>
  </table>
  {{-- footer --}}
  <footer class="panel-footer">
    <div class="row">
      <div class="col-sm-5 text-center">
        <small class="text-muted inline m-t-sm m-b-sm">showing {{$listCoupons->firstItem()}}-{{$listCoupons->lastItem()}} of {{$listCoupons->total()}} items</small>
      </div>
      <div class="col-sm-7 text-right text-center-xs">                
        {{ $listCoupons->links()}}
      </div>
    </div></footer>
  
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