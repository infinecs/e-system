
                <div class="nk-sidebar nk-sidebar-fixed is-theme" id="sidebar">
                    <div class="nk-sidebar-element nk-sidebar-head">
                        <div class="nk-sidebar-brand">
                            <a href="admin/index" class="logo-link">
                                <div class="logo-wrap">
                                    <img class="logo-img logo-light" src="{{asset('images/logo/infinecs-white.png')}}" srcset="{{asset('images/logo/infinecs-white.png')}}" alt="">
                                    <img class="logo-img logo-dark" src="{{asset('images/logo/infinecs-white.png')}}" srcset="{{asset('images/logo/infinecs-white.png')}}" alt="">
                                    <img class="logo-img logo-icon" src="{{asset('images/logo/infinecs-white.png')}}" srcset="{{asset('images/logo/infinecs-white.png')}}" alt="">
                                </div>
                            </a>
                            <div class="nk-compact-toggle me-n1">
                                <button class="btn btn-md btn-icon text-light btn-no-hover compact-toggle">
                                    <em class="icon off ni ni-chevrons-left"></em>
                                    <em class="icon on ni ni-chevrons-right"></em>
                                </button>
                            </div>
                            <div class="nk-sidebar-toggle me-n1">
                                <button class="btn btn-md btn-icon text-light btn-no-hover sidebar-toggle">
                                    <em class="icon ni ni-arrow-left"></em>
                                </button>
                            </div>
                        </div><!-- end nk-sidebar-brand -->
                    </div><!-- end nk-sidebar-element -->
                    <div class="nk-sidebar-element nk-sidebar-body">
                        <div class="nk-sidebar-content">
                            <div class="nk-sidebar-menu" data-simplebar>
                                <ul class="nk-menu">
                                    <li class="nk-menu-item has-sub">
                                        <a href="admin/index" class="nk-menu-link ">
                                            <span class="nk-menu-icon"><em class="icon ni ni-dashboard"></em></span>
                                            <span class="nk-menu-text">Dashboard</span>
                                        </a>
                                    </li>
                                    <li class="nk-menu-heading">
                                        <h6 class="overline-title">Applications</h6>
                                    </li>
                                    <li class="nk-menu-item has-sub">
                                        <a href="#" class="nk-menu-link nk-menu-toggle">
                                            <span class="nk-menu-icon"><em class="icon ni ni-laptop"></em></span>
                                            <span class="nk-menu-text">Asset Management</span>
                                        </a>
                                        <ul class="nk-menu-sub">
                                            <li class="nk-menu-item">
                                                <a href="/admin/assetList" class="nk-menu-link">
                                                    <span class="nk-menu-text">Asset List</span>
                                                </a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="nk-menu-item has-sub">
                                        <a href="#" class="nk-menu-link nk-menu-toggle">
                                            <span class="nk-menu-icon"><em class="icon ni ni-users"></em></span>
                                            <span class="nk-menu-text">User Management</span>
                                        </a>
                                        <ul class="nk-menu-sub">
                                            <li class="nk-menu-item">
                                                <a href="/admin/userList" class="nk-menu-link">
                                                    <span class="nk-menu-text">Users List</span>
                                                </a>
                                            </li>
                                        </ul>
                                    </li>
                                    
                                </ul><!-- .nk-menu -->
                            </div><!-- .nk-sidebar-menu -->
                        </div><!-- .nk-sidebar-content -->
                    </div><!-- .nk-sidebar-element -->
                </div><!-- .nki-sidebar -->
                <!-- sidebar @e -->
                <!-- wrap -->
                <div class="nk-wrap">
                    <!-- include Header  -->
                    <div class="nk-header nk-header-fixed">
                        <div class="container-fluid">
                            <div class="nk-header-wrap d-flex justify-content-end mr-1">
                                <div class="nk-header-logo ms-n1">
                                    <div class="nk-sidebar-toggle">
                                        <button class="btn btn-sm btn-icon btn-zoom sidebar-toggle d-sm-none"><em class="icon ni ni-menu"></em></button>
                                        <button class="btn btn-md btn-icon btn-zoom sidebar-toggle d-none d-sm-inline-flex"><em class="icon ni ni-menu"></em></button>
                                    </div>
                                    <div class="nk-navbar-toggle me-2">
                                        <button class="btn btn-sm btn-icon btn-zoom navbar-toggle d-sm-none"><em class="icon ni ni-menu-right"></em></button>
                                        <button class="btn btn-md btn-icon btn-zoom navbar-toggle d-none d-sm-inline-flex"><em class="icon ni ni-menu-right"></em></button>
                                    </div>
                                    <a href="./html/index.html" class="logo-link">
                                        <div class="logo-wrap">
                                            <img class="logo-img logo-light" src="./images/logo.png" srcset="./images/logo2x.png 2x" alt="">
                                            <img class="logo-img logo-dark" src="./images/logo-dark.png" srcset="./images/logo-dark2x.png 2x" alt="">
                                            <img class="logo-img logo-icon" src="./images/logo-icon.png" srcset="./images/logo-icon2x.png 2x" alt="">
                                        </div>
                                    </a>
                                </div>
                                <nav class="nk-header-menu nk-navbar ">
                                    <ul class="nk-nav">
                                        
                                        <li class="dropdown d-flex justify-content-end">
                                            <a href="#" data-bs-toggle="dropdown">
                                                <div class="d-sm-none">
                                                    <div class="media media-md media-circle">
                                                        <img src="./images/avatar/a.jpg" alt="" class="img-thumbnail">
                                                    </div>
                                                </div>
                                                <div class="d-none d-sm-block">
                                                    <div class="media media-circle">
                                                        <img src="./images/avatar/a.jpg" alt="" class="img-thumbnail">
                                                    </div>
                                                </div>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-md">
                                                <div class="dropdown-content dropdown-content-x-lg py-3 border-bottom border-light">
                                                    <div class="media-group">
                                                        <div class="media media-xl media-middle media-circle"><img src="./images/avatar/a.jpg" alt="" class="img-thumbnail"></div>
                                                        <div class="media-text">
                                                            <div class="lead-text">{{$user->name}}</div>
                                                            <span class="sub-text">{{ ucfirst(trans($user->role)) }}</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="dropdown-content dropdown-content-x-lg py-3 border-bottom border-light">
                                                    <ul class="link-list">
                                                        <li><a href="admin/profile"><em class="icon ni ni-user"></em> <span>My Profile</span></a></li>
                                                        <li><a href="#"><em class="icon ni ni-contact"></em> <span>My Contacts</span></a></li>
                                                        <li><a href="admin/userEdit"><em class="icon ni ni-setting-alt"></em> <span>Account Settings</span></a></li>
                                                    </ul>
                                                </div>
                                                <div class="dropdown-content dropdown-content-x-lg py-3">
                                                    <ul class="link-list">
                                                        <li><a href="admin/logout"><em class="icon ni ni-signout"></em> <span>Log Out</span></a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </nav>
                            </div><!-- .nk-header-wrap -->
                        </div><!-- .container-fliud -->
                    </div>
            
                    
