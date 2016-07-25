<aside class="left-side sidebar-offcanvas">
            <section class="sidebar ">
                <div class="page-sidebar  sidebar-nav">
                    <div class="clearfix"></div>
                    <!-- BEGIN SIDEBAR MENU -->
                    <ul class="page-sidebar-menu" id="menu">
                        <li class="{{ Request::is('admin/category') ? 'active' : '' }}{{ Request::is('admin/category/*') ? 'active' : '' }}{{ Request::is('admin/category/*/*') ? 'active' : '' }}{{ Request::is('admin/category/*/*/*') ? 'active' : '' }}">
                            <a href="/admin/category">
                                <i class="livicon" data-name="medal" data-size="18" data-c="#00bc8c" data-hc="#00bc8c" data-loop="true"></i>
                                <span class="title">Categories</span>
                                <span class="fa arrow"></span>
                            </a>
                            <ul class="sub-menu">
                                <li>
                                    <a href="/admin/category">
                                        <i class="fa fa-angle-double-right"></i>
                                        List Categories
                                    </a>
                                </li>
                                <li>
                                    <a href="/admin/category/create">
                                        <i class="fa fa-angle-double-right"></i>
                                        Add Category
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="{{ Request::is('admin/order') ? 'active' : '' }}{{ Request::is('admin/order/*') ? 'active' : '' }}{{ Request::is('admin/order/*/*') ? 'active' : '' }}{{ Request::is('admin/order/*/*/*') ? 'active' : '' }}">
                            <a href="/admin/order">
                                <i class="livicon" data-name="brush" data-c="#F89A14" data-hc="#F89A14" data-size="18" data-loop="true"></i>
                                <span class="title">Orders</span>
                                <span class="fa arrow"></span>
                            </a>
                            <ul class="sub-menu">
                                <li>
                                    <a href="/admin/order">
                                        <i class="fa fa-angle-double-right"></i>
                                        List Orders
                                    </a>
                                </li>
                            </ul>
                        </li>
                        
                        
                    </ul>
                    <!-- END SIDEBAR MENU --> </div>
            </section>
            <!-- /.sidebar --> </aside>