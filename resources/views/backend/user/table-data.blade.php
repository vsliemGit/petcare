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
          <th>Username</th>
          <th>Email</th>
          <th>Is Admin</th>
          <th>Created at</th>
          <th>Updated at</th>
          <th style="width:30px;"></th>
      </tr>
      </thead>
      <tbody>
      @php $i = 0;  @endphp
      @foreach($listUsers as $user)
      @php $i++;  @endphp
      <tr>
          <td><label class="i-checks m-b-none"><input type="checkbox" class="sub_chk" data-id="{{ $user->id }}"><i></i></label></td>
          <td class="td-id">{{ $user->id }}</td>
          <td class="td-name"><span class="text-ellipsis">{{ $user->name }}</span></td>
          <td class="td-slug"><span class="text-ellipsis">{{ $user->username }}</span></td>
          <td class="td-desc"><span class="text-ellipsis">{{ $user->email }}</span></td>
          <td class="td-status change-item">
            <?php if($user->is_admin == 1){ ?>
              <a data-id="1" href="javascript:void(0)"><span data-id="1"class="fa fa-check text-success text-active"></span></a>
                    <?php  }else{ ?>  
              <a data-id="0" href="javascript:void(0)"><span class="fa fa-times text-danger text"></span></a>
            <?php  } ?>
          </td>
          <td><span class="text-ellipsis">{{ $user->created_at }}</span></td>
          <td><span class="text-ellipsis">{{ $user->updated_at }}</span></td>
          <td>
          <a href="javascript:void(0)"
              class="active styling-edit edit-item" ui-toggle-class="">
              <i class="fa fa-pencil-square-o text-success text-active"></i></a>
          <a onclick="deleteItemAjax({{$user->id}})"        
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
        <small class="text-muted inline m-t-sm m-b-sm">showing {{$listUsers->firstItem()}}-{{$listUsers->lastItem()}} of {{$listUsers->total()}} items</small>
      </div>
      <div class="col-sm-7 text-right text-center-xs">                
        {{ $listUsers->links()}}
      </div>
    </div></footer>
  
  <script>