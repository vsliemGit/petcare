{{-- table-data --}}
<<<<<<< HEAD
<div class="table-responsive">
    <table class="table table-striped b-t b-light">
        <thead>
        <tr>
            <th style="width:20px;">
            <label class="i-checks m-b-none">
                <input type="checkbox"><i></i>
            </label>
            </th>
            <th>ID</th>
            <th>Name</th>
            <th>Slug</th>
            <th>Describe</th>
            <th>Status</th>
            <th>Created at</th>
            <th>Updated at</th>
            <th style="width:30px;"></th>
        </tr>
        </thead>
        <tbody>
        @foreach($listProductCategories as $productCatetory)
        <tr>
            <td><label class="i-checks m-b-none"><input type="checkbox" name="post[]"><i></i></label></td>
            <td>{{ $productCatetory->pro_category_id }}</td>
            <td><span class="text-ellipsis">{{ $productCatetory->pro_category_name }}</span></td>
            <td><span class="text-ellipsis">{{ $productCatetory->pro_category_slug }}</span></td>
            <td><span class="text-ellipsis">{{ $productCatetory->pro_category_desc }}</span></td>
            <td><span class="text-ellipsis" >
            <?php if($productCatetory->pro_category_status == 1){ ?>
            <a href="{{Route('product_category.changeStatus', ['id'=> $productCatetory->pro_category_id])}}"><span class="fa fa-check text-success text-active"></span></a>
                    <?php  }else{ ?>  
                    <a href="{{Route('product_category.changeStatus', ['id'=> $productCatetory->pro_category_id])}}"><span class="fa fa-times text-danger text"></span></a>
            <?php  } ?>
            </span></td>
            <td><span class="text-ellipsis">{{ $productCatetory->pro_category_created_at }}</span></td>
            <td><span class="text-ellipsis">{{ $productCatetory->pro_category_updated_at }}</span></td>
            <td>
            <a href="{{ Route('product_category.edit', ['id'=> $productCatetory->pro_category_id]) }}" 
                class="active styling-edit" ui-toggle-class="">
                <i class="fa fa-pencil-square-o text-success text-active"></i></a>
            <a onclick="return confirm('Bạn có chắc là muốn xóa danh mục này ko?')" 
                href="{{Route('product_category.destroy', ['id'=> $productCatetory->pro_category_id])}}" 
                class="active styling-edit" ui-toggle-class="">
                <i class="fa fa-trash-o" style="color: red;"></i>
            </a>
            </td>
        </tr>
        @endforeach
        </tbody>
    </table>
</div>
=======
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
        <th>Slug</th>
        <th>Describe</th>
        <th>Status</th>
        <th>Created at</th>
        <th>Updated at</th>
        <th style="width:30px;"></th>
    </tr>
    </thead>
    <tbody>
    @php $i = 0;  @endphp
    @foreach($listProductCategories as $productCatetory)
    @php $i++;  @endphp
    <tr>
        <td><label class="i-checks m-b-none"><input type="checkbox" name="post[]"><i></i></label></td>
        <td class="td-id">{{ $productCatetory->pro_category_id }}</td>
        <td class="td-name"><span class="text-ellipsis">{{ $productCatetory->pro_category_name }}</span></td>
        <td class="td-slug"><span class="text-ellipsis">{{ $productCatetory->pro_category_slug }}</span></td>
        <td class="td-desc"><span class="text-ellipsis">{{ $productCatetory->pro_category_desc }}</span></td>
        <td class="td-status change-item">
          <?php if($productCatetory->pro_category_status == 1){ ?>
            <a data-id="1" href="javascript:void(0)"><span data-id="1"class="fa fa-check text-success text-active"></span></a>
                  <?php  }else{ ?>  
            <a data-id="0" href="javascript:void(0)"><span class="fa fa-times text-danger text"></span></a>
          <?php  } ?>
        </td>
        <td><span class="text-ellipsis">{{ $productCatetory->pro_category_created_at }}</span></td>
        <td><span class="text-ellipsis">{{ $productCatetory->pro_category_updated_at }}</span></td>
        <td>
        <a href="javascript:void(0)"
            class="active styling-edit edit-item" ui-toggle-class="">
            <i class="fa fa-pencil-square-o text-success text-active"></i></a>
        <a onclick="deleteItemAjax({{$productCatetory->pro_category_id}})"
            action="{{Route('product_category.destroy', ['id'=> $productCatetory->pro_category_id])}}"          
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
>>>>>>> remotes/origin/develop_ajax
{{-- footer --}}
<footer class="panel-footer">
  <div class="row">
    <div class="col-sm-5 text-center">
      <small class="text-muted inline m-t-sm m-b-sm">showing {{$listProductCategories->firstItem()}}-{{$listProductCategories->lastItem()}} of {{$listProductCategories->total()}} items</small>
    </div>
    <div class="col-sm-7 text-right text-center-xs">                
      {{ $listProductCategories->links()}}
    </div>
  </div>
<<<<<<< HEAD
</footer>
 
=======
</footer>
>>>>>>> remotes/origin/develop_ajax
