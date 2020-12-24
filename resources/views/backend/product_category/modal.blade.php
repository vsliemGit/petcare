<!-- Modal -->
<div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel"></h5>
        </div>
        <div class="modal-body">
            <form class="cmxform form-horizontal" id="form" method="POST" enctype="multipart/form-data" novalidate="novalidate">
                @method('PUT')
                @csrf
                <div class="form-group ">
                    <label for="pro_category_name" class="control-label col-lg-3">Tên loại <span class="required" style="color:red">*</span></label>
                    <div class="col-lg-6">
                        <input class=" form-control" id="pro_category_name" name="pro_category_name" minlength="2" type="text" required="">
                    </div>
                </div>
                {{-- <div class="form-group ">
                    <label class="col-sm-3 control-label col-lg-3" for="parent_id">Mục cha: </label>
                    <div class="col-lg-6">
                        <select class="form-control m-bot15" name="parent_id">
                            <option value="null">(none)</option>
                            @foreach ($listProductCategoriesParent as $productCategoriesParent)                                              
                                <option value="{{$productCategoriesParent->pro_category_id}}">{{$productCategoriesParent->pro_category_name}} 
                                    {{ old('parent_id', $productCategory->parent_id) == $productCategoriesParent->pro_category_id ? "selected" : "" }}</option>
                            @endforeach
                        </select>
                    </div>
                </div> --}}
                <div class="form-group ">
                    <label for="pro_category_slug" class="control-label col-lg-3">Slug <span class="required" style="color:red">*</span></label>
                    <div class="col-lg-6">
                        <input class=" form-control" id="pro_category_slug" name="pro_category_slug" minlength="2" type="text" required="">
                    </div>
                </div>
                <div class="form-group ">
                    <label for="pro_category_desc" class="control-label col-lg-3">Mô tả</label>
                    <div class="col-lg-6">
                        <textarea class="form-control" style="resize: none" rows="8" id="pro_category_desc" name="pro_category_desc" required=""></textarea>
                    </div>
                </div>
                <div class="form-group ">
                    <label class="control-label col-lg-3" for="pro_category_status">Trạng thái: </label>
                    <div class="col-lg-6">
                        <select class="form-control m-bot15" id="pro_category_status" name="pro_category_status">
                            <option value="" selected disabled hidden></option>
                            <option value="1">Khả dụng</option>
                            <option value="0">Khóa</option>
                        </select>
                    </div>
                </div>
            </form>
        </div>
        <div class="modal-footer">
          <input type="hidden" name="action" id="action" />
          <button type="button" class="btn btn-secondary" name="add_category_product" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary" onclick="createItemUsingAjax()" id="btn-action">Button</button>
        </div>
      </div>
    </div>
  </div>

  <script>
    //Binding field name to slug
    $(document).ready(function(){
        $("#pro_category_name").keyup(function(){
            var valueName = changToSlug($("#pro_category_name").val());
            $("#pro_category_slug").val(valueName);
        })
  });
  </script>