<!--sidebar start-->
<aside>
    <div id="sidebar" class="nav-collapse">
        <!-- sidebar menu start-->
        <div class="leftside-navigation">
            <ul class="sidebar-menu" id="nav-accordion">
                <li>
                <a class="active" href="{{Route('home.index')}}">
                        <i class="fa fa-dashboard"></i>
                        <span>Dashboard</span>
                    </a>
                </li> 
                <li class="sub-menu">
                    <a href="javascript:;">
                        <i class="fa fa-list-ul"></i>
                        <span>Product Categories</span>
                    </a>
                    <ul class="sub">
						<li></i><a href="{{Route('product_category.index')}}">List Product Categores</a></li>
                        <li><a href="{{Route('product_category.create')}}">Add Product Category</a></li>
                    </ul>
                </li>
                <li class="sub-menu">
                    <a href="javascript:;">
                        <i class="fa fa-book"></i>
                        <span>Brands</span>
                    </a>
                    <ul class="sub">
						<li></i><a href="{{Route('brand.index')}}">List Brands</a></li>
                        <li><a href="{{Route('brand.create')}}">Add New Brand</a></li>
                    </ul>
                </li>
                <li class="sub-menu">
                    <a href="javascript:;">
                        <i class="fa fa-table"></i>
                        <span>Products</span>
                    </a>
                    <ul class="sub">
						<li></i><a href="{{Route('product.index')}}">List Products</a></li>
                        <li><a href="{{Route('product.create')}}">Add Products</a></li>
                    </ul>
                </li>
            </ul>            
        </div>
        <!-- sidebar menu end-->
    </div>

<script>
</script>
</aside>
<!--sidebar end-->