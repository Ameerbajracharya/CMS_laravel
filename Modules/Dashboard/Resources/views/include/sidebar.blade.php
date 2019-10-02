<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">

        <span class="brand-text font-weight-light">Kite Cms</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
            <img src="{{asset('public/backend/dist/img/avatar.png')}}" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="{{route('user.show',Auth::user()->id)}}" class="d-block">{{Auth::user()->name}}</a>

            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav  nav-pills nav-sidebar flex-column navbar-nav" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
                     with font-awesome or any other icon font library -->
                @can('isAdmin')
                <li class="nav-item dropdown active">
                    <a href="#" class="nav-link ">
                        <i class="nav-icon fa fa-user" aria-hidden="true"></i>
                        <p>User
                            <i class="right fa fa-angle-down"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{Route('user')}}" class="nav-link">
                                <i class="fa fa-circle-o nav-icon"></i>
                                <p>List</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{Route('user.create')}}" class="nav-link">
                                <i class="fa fa-plus nav-icon"></i>
                                <p>Register</p>
                            </a>
                        </li>
                    </ul>
                </li>
                @endcan
                <li class="nav-item dropdown @if(request()->is('viewslider*')) active @endif">
                    <a href="" class="nav-link ">
                        <i class="nav-icon fa fa-sliders" aria-hidden="true"></i>
                        <p>Slider
                            <i class="right fa fa-angle-down"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview" @if(request()->is('viewslider*')) style="display: block" @endif>
                        <li @if(request()->is('viewslider')) class="nav-item active" @endif>
                            <a href="{{Route('viewslider')}}" class="nav-lweink">
                                <i class="fa fa-circle-o nav-icon"></i>
                                <p>List</p>
                            </a>
                        </li>
                        <li @if(request()->is('createslider')) class="nav-item active" @endif>
                            <a href="{{Route('createslider')}}" class="nav-link">
                                <i class="fa fa-plus nav-icon"></i>
                                <p>Add</p>
                            </a>
                        </li>
                    </ul>
                </li>

                  <li class="nav-item dropdown">
                    <a href="" class="nav-link ">
                        <i class="nav-icon fa fa-image" aria-hidden="true"></i>
                        <p>Gallery
                            <i class="right fa fa-angle-down"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{Route('gallery')}}" class="nav-link">
                                <i class="fa fa-circle-o nav-icon"></i>
                                <p>List</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{Route('gallery.create')}}" class="nav-link">
                                <i class="fa fa-plus nav-icon"></i>
                                <p>Add</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item dropdown">
                    <a href="#" class="nav-link ">
                        <i class="nav-icon fa fa-film" aria-hidden="true"></i>
                        <p>Multimedia
                            <i class="right fa fa-angle-down"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{Route('viewmultimedia')}}" class="nav-link">
                                <i class="fa fa-circle-o nav-icon"></i>
                                <p>List</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{Route('createmultimedia')}}" class="nav-link">
                                <i class="fa fa-plus nav-icon"></i>
                                <p>Add</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a href="#" class="nav-link ">
                        <i class="nav-icon fa fa-bullhorn "></i>
                        <p>Posts
                            <i class="right fa fa-angle-down"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{Route('post.view')}}" class="nav-link">
                                <i class="fa fa-circle-o nav-icon"></i>
                                <p>List</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{Route('post.create')}}" class="nav-link">
                                <i class="fa fa-plus nav-icon"></i>
                                <p>Add</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item ">
                    <a href="#" class="nav-link ">
                        <i class="nav-icon fa fa-cart-plus"></i>
                        <p>
                            Product
                            <i class="right fa fa-angle-down"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('product.view')}}" class="nav-link">
                                <i class="fa fa-circle-o nav-icon"></i>
                                <p>List</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{Route('product.create')}}" class="nav-link">
                                <i class="fa fa-plus nav-icon"></i>
                                <p>Add</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a href="#" class="nav-link ">
                        <i class="nav-icon fa fa-apple "></i>
                        <p>Brand
                            <i class="right fa fa-angle-down"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('brand.view')}}" class="nav-link">
                                <i class="nav-icon fa fa-circle-o "></i>
                                <p>List</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{Route('brand.create')}}" class="nav-link">
                                <i class="fa fa-plus nav-icon"></i>
                                <p>Add</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a href="#" class="nav-link ">
                        <i class="nav-icon fa fa-bookmark-o"></i>
                        <p>Category
                            <i class="right fa fa-angle-down"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('category.view')}}" class="nav-link">
                                <i class="fa fa-circle-o nav-icon"></i>
                                <p>List</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{Route('categroy.create')}}" class="nav-link">
                                <i class="fa fa-plus nav-icon"></i>
                                <p>Add</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a href="#" class="nav-link ">
                        <i class="nav-icon fa fa-text-height"></i>
                        <p>ProductType
                            <i class="right fa fa-angle-down"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('producttype.view')}}" class="nav-link">
                                <i class="fa fa-circle-o nav-icon"></i>
                                <p>List</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{Route('producttype.create')}}" class="nav-link">
                                <i class="fa fa-plus nav-icon"></i>
                                <p>Add</p>
                            </a>
                        </li>
                    </ul>
                </li>
                @can('isAdmin')
                <li class="nav-item">
                    <a href="{{Route('setting.index')}}" class="nav-link">
                        <i class="nav-icon fa fa-envelope" ></i>
                        <p>
                            About
                        </p>
                    </a>
                </li>

                @endcan
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
