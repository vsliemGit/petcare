<div class="left-sidebar">
    <h2>Category</h2>
    <div class="panel-group category-products" id="accordian"><!--category-productsr-->
        <input type="hidden" id="category_id_choosed" name="category_id_choosed">
        @foreach ($listProductCategoriesParent as $productCategoriesParent)
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="panel-title">
                        {{-- <a href="#">{{ $productCategories->pro_category_name }}</a> --}}
                        <a data-toggle="collapse" data-parent="#accordian" href="#{{$productCategoriesParent->pro_category_slug}}">
                            <span class="badge pull-right"><i class="fa fa-plus"></i></span>
                            {{ $productCategoriesParent->pro_category_name }}
                        </a>
                    </h4>
                </div>
                
                @if($productCategoriesParent->child->count()>0)                  
                    <div id="{{$productCategoriesParent->pro_category_slug}}" class="panel-collapse collapse">
                        <div class="panel-body">
                            <ul>
                                @foreach ($productCategoriesParent->child as $productCategoriesChild)
                                    <li style="text-size: 20px;" class="search-products-by-category" data-category-id="{{$productCategoriesChild->pro_category_id}}"><a href="javascript:void(0)">{{$productCategoriesChild->pro_category_name}} </a></li>                                  
                                @endforeach
                            </ul>
                        </div>
                    </div>                  
                @endif
            </div>
        @endforeach        
    </div><!--/category-products-->
    <input type="hidden" id="brand_id_choosed" name="brand_id_choosed">
    <div class="brands_products"><!--brands_products-->
        <h2>Brands</h2>
        <div class="brands-name">
            <ul class="nav nav-pills nav-stacked">
                @foreach($listBrands as $brand)
                    <li class="search-products-by-brand" data-brand-name="{{$brand->brand_name}}" data-brand-id="{{$brand->brand_id}}" ><a href="javascript:void(0)" > <span class="pull-right">({{ $brand->products->count() }})</span>{{ $brand->brand_name }}</a></li>
                @endforeach
            </ul>
        </div>
    </div><!--/brands_products-->
    
    <div class="price-range"><!--price-range-->
        <h2>Price Range</h2>
        <div class="well text-center">
             <input type="text" class="span2" value="" data-slider-min="0" data-slider-max="600" data-slider-step="5" data-slider-value="[250,450]" id="sl2" ><br />
             <b class="pull-left">$ 0</b> <b class="pull-right">$ 600</b>
        </div>

           
        
    </div><!--/price-range-->
    
    <div class="shipping text-center"><!--shipping-->
        <img src="vendor/frontend/images/home/shipping.jpg" alt="" />
    </div><!--/shipping-->

</div>
