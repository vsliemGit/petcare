<!-- Modal -->
<div class="modal fade" id="quickview" tabindex="-1" role="dialog modal-lg" aria-labelledby="modal_lable" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h3 class="modal-title" id="modal_lable">Modal title</h3>
          </button>
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
                        <form action="{{ route('add-to-cart') }}" method="post" id="add-cart-form">
                            @csrf
                            <span>
                                    <span id="q_product_price"></span>
                                    {{-- <label>Quantity:</label> --}}
                                    <input type="hidden" id="product_id" name="product_id" value="">
                                    <input type="number" name="quantity" value="1" /><br>
                                    <button type="submit" class="btn btn-fefault cart" id="add-to-cart" data-id="">
                                        <i class="fa fa-shopping-cart"></i>
                                        Add to cart
                                    </button>
                            </span>
                        </form>
                        <p><b>Brand:</b> <span id="q_product_brand">Brand of Product</span></p>
                        <a href=""><img src="vendor/frontend/images/product-details/share.png" class="share img-responsive"  alt="" /></a>
                    </div><!--/product-information-->
                </div>
            </div><!--/product-details-->
            <label for="q_product_desc">Description</label>
            <div id="q_product_desc" name="q_product_desc">desc for product</div>          
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>