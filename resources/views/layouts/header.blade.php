<!-- ========== Left Sidebar Start ========== -->
<div class="left side-menu">

<!-- LOGO -->
<div class="topbar-left">
    <div class="">
        <!--<a href="index" class="logo text-center">Admiria</a>-->
        <a href="index" class="logo"><img src="{{ URL::asset('assets/images/logo-sm.png') }}" height="36" alt="logo"></a>
    </div>
</div>
<div class="sidebar-inner slimscrollleft">
    <div id="sidebar-menu">
        <ul>
            <li class="menu-title">Navigation</li>
            <li>
                <a href="{{ route("dashboard") }}" class="waves-effect"><i class="mdi mdi-view-dashboard"></i> <span>  Dashboard  </span> </a>
            </li>
          
            <li>
                <a href="{{route("users.index")}}" class="waves-effect"><i class="mdi mdi-account-outline"></i><span> User Management </span></a>
            </li>
            <li class="has_sub">
                <a href="javascript:void(0);" class="waves-effect"><i class="mdi mdi-border-all"></i><span> Product Management <span class="pull-right"><i class="mdi mdi-chevron-right"></i></span> </span></a>
                <ul class="list-unstyled">
                    <li><a href="{{ route("category.index") }}">Categories</a></li>
                    <li><a href="{{ route("product.index") }}">Products</a></li>
                    <li><a href="#">Coupons</a></li>
                </ul>
            </li>
            <li>
                <a href="calendar" class="waves-effect"><i class="mdi mdi-cart-outline"></i><span> Order Management </span></a>
            </li>
            <li>
                <a href="calendar" class="waves-effect"><i class="mdi mdi-star-half"></i><span>Reviews & Rating</span></a>
            </li>
            <li>
                <a href="calendar" class="waves-effect"><i class="mdi mdi-thumbs-up-down"></i><span>Testimonial</span></a>
            </li>
            <li>
                <a href="calendar" class="waves-effect"><i class="mdi mdi-view-carousel"></i><span>Slider Management</span></a>
            </li>
            <li class="has_sub">
                <a href="javascript:void(0);" class="waves-effect"><i class="mdi mdi-pencil-box-outline"></i><span> Blog Management <span class="pull-right"><i class="mdi mdi-chevron-right"></i></span> </span></a>
                <ul class="list-unstyled">
                    <li><a href="#">Categories</a></li>
                    <li><a href="#">Manage Blog</a></li>
                </ul>
            </li>
            <li class="has_sub">
                <a href="javascript:void(0);" class="waves-effect"><i class="mdi mdi-file-document-box"></i><span> Page Management <span class="pull-right"><i class="mdi mdi-chevron-right"></i></span> </span></a>
                <ul class="list-unstyled">
                    <li><a href="#">About Us</a></li>
                    <li><a href="#">Term & Condition</a></li>
                    <li><a href="#">Privacy Policy</a></li>
                    <li><a href="#">Contact Us</a></li>
                </ul>
            </li>
            <li>
                <a href="calendar" class="waves-effect"><i class="mdi mdi-truck-delivery"></i><span>Shipping Management</span></a>
            </li>
            <li>
                <a href="calendar" class="waves-effect"><i class="mdi mdi-ticket-account"></i><span>Support Ticket</span></a>
            </li>
            <li>
                <a href="calendar" class="waves-effect"><i class="mdi mdi-settings"></i><span>Site Setting</span></a>
            </li>
             
        </ul>
    </div>
    <div class="clearfix"></div>
</div> <!-- end sidebarinner -->
</div>
<!-- Left Sidebar End -->
