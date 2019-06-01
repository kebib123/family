@php
$route=\Illuminate\Support\Facades\Route::currentRouteName();
@endphp
<!-- Main Sidebar Container -->

<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
        <img src="https://1.bp.blogspot.com/-_nSlo7Y9SWU/WZb5C7z9_pI/AAAAAAAAA20/ET-P9Q6ymtAK_9eXbBe3_oXOz_LySclIgCK4BGAYYCw/s1600/logo-sec%2Bcopy1.png" class="brand-image  elevation-3"
             style="opacity: .8">
        <span class="brand-text font-weight-light">DXN</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{url('images/user.png')}}" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="{{route('index')}}" class="d-block">Admin</a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
                     with font-awesome or any other icon font library -->
                <li class="nav-item has-treeview menu">
                    <a href="#" class="nav-link ">
                        <i class="nav-icon fa fa-list-ol"></i>
                        <p>
                            Categories
                            <i class="right fa fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('add-category')}}" class="nav-link">
                                <i class="fa fa-plus-circle"></i>
                                <p>Add Category</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item has-treeview menu">
                    <a href="#" class="nav-link ">
                        <i class="nav-icon fa fa-list-ol"></i>
                        <p>
                            Products
                            <i class="right fa fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('add-product')}}" class="nav-link">
                                <i class="fa fa-plus-circle"></i>
                                <p>Add Product</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('show-product')}}" class="nav-link">
                                <i class="fa fa-shopping-bag"></i>
                                <p>View Products</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('show-review')}}" class="nav-link">
                                <i class="fa fa-shopping-bag"></i>
                                <p>View reviews</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item has-treeview menu">
                    <a href="#" class="nav-link ">
                        <i class="nav-icon fa fa-list-ol"></i>
                        <p>
                            Brands
                            <i class="right fa fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('manage-brand')}}" class="nav-link">
                                <i class="fa fa-plus-circle"></i>
                                <p>Manage Brand</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item has-treeview menu">
                    <a href="#" class="nav-link ">
                        <i class="nav-icon fa fa-list-ol"></i>
                        <p>
                            Slides
                            <i class="right fa fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('manage-slide')}}" class="nav-link">
                                <i class="fa fa-plus-circle"></i>
                                <p>Manage Slide</p>
                            </a>
                        </li>
                    </ul>
                </li>



                <li class="nav-item has-treeview menu{{$route=='edit-about'?'-open':null}}">
                    <a href="#" class="nav-link {{$route=='edit-about'?'active':null}}">
                        <i class="nav-icon fa fa-book"></i>
                        <p>
                            About
                            <i class="right fa fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('edit-about')}}" class="nav-link {{$route=='edit-about'?'active':null}}">
                                <i class="fa fa-edit"></i>
                                <p>Edit About</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item has-treeview menu">
                    <a href="#" class="nav-link ">
                        <i class="nav-icon fa fa-shopping-cart"></i>
                        <p>
                            Cart
                            <i class="right fa fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="fa fa-circle-o nav-icon"></i>
                                <p>Add Category</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="fa fa-circle-o nav-icon"></i>
                                <p>View Categories</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item has-treeview menu{{$route=='show-contact'||$route=='add-contact'?'-open':''}}">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fa fa-phone"></i>
                        <p>
                            Contact
                            <i class="right fa fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('show-contact')}}" class="nav-link {{$route=='show-contact'?'active':null}}">
                                <i class="fa fa-street-view"></i>
                                <p>View Contact Form</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('add-contact')}}" class="nav-link {{$route=='add-contact'?'active':null}}">
                                <i class="fa fa-plus-square"></i>
                                <p>Add Contact</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item has-treeview menu">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fa fa-check"></i>
                        <p>
                            Checkout
                            <i class="right fa fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('show-order')}}" class="nav-link">
                                <i class="fa fa-shopping-cart"></i>
                                <p>View Orders</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item has-treeview menu{{$route=='add-faq'||$route=='show-faq'?'-open':null}}">
                    <a href="#" class="nav-link {{$route=='edit-faq'||'add-faq'||'show-faq'?'-active':null}}">
                        <i class="nav-icon fa fa-question"></i>
                        <p>
                            FAQ
                            <i class="right fa fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('add-faq')}}" class="nav-link {{$route=='add-faq'?'active':null}}">
                                <i class="fa fa-circle-o nav-icon"></i>
                                <p>Add Faq</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('show-faq')}}" class="nav-link {{$route=='show-faq'?'active':null}}">
                                <i class="fa fa-circle-o nav-icon"></i>
                                <p>View Faq</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item has-treeview menu{{$route=='add-media'?'-open':null}}">
                    <a href="#" class="nav-link {{$route=='add-media'?'active':null}} ">
                        <i class="nav-icon fa fa-map"></i>
                        <p>
                            Social Media
                            <i class="right fa fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('add-media')}}" class="nav-link {{$route=='add-media'?'active':null}}">
                                <i class="fa fa-circle-o nav-icon"></i>
                                <p>Update Media</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item has-treeview menu{{$route=='show-user'?'-open':null}}">
                    <a href="#" class="nav-link {{$route=='show-user'?'active':null}} ">
                        <i class="nav-icon fa fa-user-shield"></i>
                        <p>
                            Users
                            <i class="right fa fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('show-user')}}" class="nav-link {{$route=='show-user'?'active':null}}">
                                <i class="fa fa-user"></i>
                                <p>Registered Users</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="fa fa-user"></i>
                                <p>Active Users</p>
                            </a>
                        </li>
                    </ul>
                </li>


                <li class="nav-item">
                    <a href="{{route('signin')}}" class="nav-link">
                        <i class="nav-icon fa fa-lock-open"></i>
                        <p>
                            Log Out
                        </p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>