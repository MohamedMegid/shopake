<header class="header">
        <a href="/admin/dashboard" class="logo">
            <!-- Add the class icon to your logo image or logo icon to add the margining -->
            <img src="" alt=""></a>
        <nav class="navbar navbar-static-top" role="navigation">
            <!-- Sidebar toggle button-->
            <div>
                <a href="#" class="navbar-btn sidebar-toggle" data-toggle="offcanvas" role="button">
                    <div class="responsive_nav"></div>
                </a>
            </div>
            <div class="navbar-right">
                <ul class="nav navbar-nav">
                    
                    <li class="dropdown user user-menu">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <img src="/img/users/{{Auth::user()->basic_photo}}" width="35" class="img-circle img-responsive pull-left" height="35" alt="">
                            <div class="riot">
                                <div>
                                    {{Auth::user()->name}}
                                    <span>
                                        <i class="caret"></i>
                                    </span>
                                </div>
                            </div>
                        </a>
                        <ul class="dropdown-menu">
                            <!-- User image -->
                            <li class="user-header bg-light-blue">
                                <img src="/img/users/{{Auth::user()->basic_photo}}" class="img-responsive img-circle" alt="">
                                <p class="topprofiletext">{{Auth::user()->name}}</p>
                            </li>
                            <!-- Menu Body -->
                            <!-- Menu Footer-->
                            <li class="user-footer">
                                <div class="pull-right">
                                    <a href="/admin/logout">
                                        <i class="livicon" data-name="sign-out" data-s="18"></i>
                                        Logout
                                    </a>
                                </div>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </nav>
    </header>