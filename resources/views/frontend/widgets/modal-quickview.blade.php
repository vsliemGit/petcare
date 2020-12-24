<!-- Modal -->
<style>
  @media screen and (min-width: 768px){
    .modal-dialog {
      width: 800px;
      margin: 30px auto;
    }
  }
  
  @media screen and (min-width: 992px;){
    .modal-lg{
      width: 1200px;
    }
  }
</style>
<div class="modal fade" id="quickview" tabindex="-1" role="dialog modal-lg" aria-labelledby="modal_lable" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h3 class="modal-title" id="modal_lable">Modal title</h3>
        </div>
        <div class="modal-body">
            <div class="row product-details"><!--product-details-->
                <div class="col-sm-5">
                    <div id="listImages">
                      <ul id="imageGallery">
                      </ul>
                    </div>                  
                </div>
                <div class="col-sm-7">
                    <div class="product-information"><!--/product-information-->
                        <img src="vendor/frontend/images/product-details/new.jpg" class="newarrival" alt="" />
                        <h1 id="q_product_name" style="margin-top: 10px;">Product Name</h1>
                        <p>Web ID: <span id="q_product_id">ID product</span></p>
                        <ul class="list-inline" id="q_rating"><!--rating-->
                                          
                        </ul><!--/rating-->
                        <span>
                          <span id="q_product_price"></span>
                        </span>
                        <p><b>Brand:</b> <span id="q_product_brand">Brand of Product</span></p>
                        <a href=""><img src="vendor/frontend/images/product-details/share.png" class="share img-responsive"  alt="" /></a>
                    </div><!--/product-information-->
                </div>
            </div><!--/product-details-->
            <hr>
            <label for="q_product_desc">Description</label>
            <div id="q_product_desc" name="q_product_desc">desc for product</div>          
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
</div>