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
                        <i class="fa   fa-suitcase"></i>
                        <span>Banner</span>
                    </a>
                    <ul class="sub">
                        <li></i><a href="{{Route('banner.index')}}">List Banners</a></li>
                        <li></i><a href="{{Route('banner.create')}}">Add Banner</a></li>
                    </ul>
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
                <li class="sub-menu">
                    <a href="javascript:;">
                        <i class="fa fa-ambulance"></i>
                        <span>Services</span>
                    </a>
                    <ul class="sub">
						<li></i><a href="{{Route('service.index')}}">List Services</a></li>
                        <li><a href="{{Route('service.create')}}">Add Services</a></li>
                    </ul>
                </li>
                <li class="sub-menu">
                    <a href="javascript:;">
                        <i class="fa fa-shopping-cart"></i>
                        <span>Orders</span>
                    </a>
                    <ul class="sub">
						<li></i><a href="{{Route('order.index')}}">List Orders</a></li>
                    </ul>
                    <ul class="sub">
						<li></i><a href="{{Route('order.service.index')}}">List Order Service</a></li>
                    </ul>
                </li>
                <li class="sub-menu">
                    <a href="javascript:;">
                        <i class="fa fa-shopping-cart"></i>
                        <span>Promotions</span>
                    </a>
                    <ul class="sub">
                        <li></i><a href="{{Route('coupon.index')}}">Coupons</a></li>
                        <li></i><a href="{{Route('coupon.create')}}">Add coupon</a></li>
                        <li></i><a href="{{Route('sale.index')}}">Sales</a></li>
                        <li></i><a href="{{Route('sale.create')}}">Add sale</a></li>
                    </ul>
                </li>
                <li class="sub-menu">
                    <a href="javascript:;">
                        <i class="fa fa-user"></i>
                        <span>Users</span>
                    </a>
                    <ul class="sub">
						<li></i><a href="{{Route('user.index')}}">List Users</a></li>
                    </ul>
                </li>
                <li class="sub-menu">
                    <a href="javascript:;">
                        <i class="fa fa-users"></i>
                        <span>Customers</span>
                    </a>
                    <ul class="sub">
						<li></i><a href="{{Route('customer.index')}}">List Customers</a></li>
                    </ul>
                </li>
                {{-- <li class="sub-menu">
                    <a href="javascript:;">
                        <i class="fa  fa-truck"></i>
                        <span>Transfers</span>
                    </a>
                    <ul class="sub">
						<li></i><a href="{{Route('customer.index')}}">List Customers</a></li>
                    </ul>
                </li> --}}
            </ul>            
        </div>
        <!-- sidebar menu end-->
    </div>

<script>
</script>
</aside>
<!--sidebar end-->