{{-- table-data --}}
<div class="table-responsive" id="tag_container">
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
    </footer>
</div>
 