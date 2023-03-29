<html lang="{{ app()->getLocale() }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('vendor/datatables/css/jquery.dataTables.min.css') }}" rel="stylesheet">
</head>

<body>
    <div id="preloader">
        <div class="sk-three-bounce">
            <div class="sk-child sk-bounce1"></div>
            <div class="sk-child sk-bounce2"></div>
            <div class="sk-child sk-bounce3"></div>
        </div>
    </div>
    <div id="main-wrapper">

        <!--**********************************
            Nav header start
        ***********************************-->
        <div class="nav-header">
            <a href="" class="brand-logo">
                <h2 style="color: white; margin-left:20px; margin-top:10px;">ABC</h2>
            </a>

            <div class="nav-control">
                <div class="hamburger">
                    <span class="line"></span><span class="line"></span><span class="line"></span>
                </div>
            </div>
        </div>
        <!--**********************************
            Nav header end
        ***********************************-->

        <!--**********************************
            Header start
        ***********************************-->
        <div class="header">
            <div class="header-content">
                <nav class="navbar navbar-expand">
                    <div class="collapse navbar-collapse justify-content-between">
                        <div class="header-left">
                            <div class="search_bar dropdown">
                                <h2>Welcome to Admin Pannel</h2>
                            </div>
                        </div>

                        <ul class="navbar-nav header-right">

                            <li class="nav-item dropdown header-profile">
                                <a href="{{ route('logout') }}" class="dropdown-item"
                                    onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
                                    <i class="icon-key"></i>
                                    <span class="ml-2">Logout </span>
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                    style="display: none;">
                                    @csrf
                                </form>
                                <div class="dropdown-menu dropdown-menu-right">
                                </div>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
        <!--**********************************
            Header end ti-comment-alt
        ***********************************-->

        <!--**********************************
            Sidebar start
        ***********************************-->
        <div class="quixnav">
            <div class="quixnav-scroll">
                <ul class="metismenu" id="menu">
                    <li><a href=""><i class="icon icon-app-store"></i><span class="nav-text">Dashboard</span></a>
                    </li>
                    </li>

                    <li><a class="has-arrow active" href="javascript:void()" aria-expanded="false"><i
                                class="icon icon-single-04"></i><span class="nav-text">Manage Users</span></a>
                        <ul aria-expanded="false">
                            <li><a class="mdi mdi-format-list-bulleted-type" aria-hidden="true"
                                    href="{{ route('users.index') }}"> All Users</a></li>
                            <li><a class="mdi mdi-plus-circle-outline" aria-hidden="true"
                                    href="{{ route('users.create') }}"> Add User</a></li>
                        </ul>
                    </li>
                    <li><a class="has-arrow" href="javascript:void()" aria-expanded="false"><i
                                class="icon icon-world-2"></i><span class="nav-text">Manage User Roles</span></a>
                        <ul aria-expanded="false">
                            <li><a class="mdi mdi-format-list-bulleted-type" aria-hidden="true"
                                    href="{{ route('roles.index') }}"> All Users Roles</a></li>
                            <li><a class="mdi mdi-plus-circle-outline" aria-hidden="true"
                                    href="{{ route('roles.create') }}"> Add User Role</a></li>
                        </ul>
                    </li>
                    <li><a class="has-arrow" href="javascript:void()" aria-expanded="false"><i
                                class="mdi mdi-format-list-numbers"></i><span class="nav-text">Manage Categories</span></a>
                        <ul aria-expanded="false">
                            <li><a class="mdi mdi-format-list-bulleted-type" aria-hidden="true"
                                    href="{{ route('categories.index') }}"> All Categories</a></li>
                            <li><a class="mdi mdi-plus-circle-outline" aria-hidden="true"
                                    href="{{ route('categories.create') }}"> Add Category</a></li>
                        </ul>
                    </li>
                    <li><a class="has-arrow" href="javascript:void()" aria-expanded="false"><i
                                class="mdi mdi-format-list-numbers"></i><span class="nav-text">Manage Products</span></a>
                        <ul aria-expanded="false">
                            <li><a class="mdi mdi-format-list-bulleted-type" aria-hidden="true"
                                    href="{{ route('products.index') }}"> All Products</a></li>
                            <li><a class="mdi mdi-plus-circle-outline" aria-hidden="true"
                                    href="{{ route('products.create') }}"> Add Products</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
        <!--**********************************
            Sidebar end
        ***********************************-->

        <!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">
            @yield('content')
        </div>
        <!--**********************************
            Content body end
        ***********************************-->


        <!--**********************************
            Footer start
        ***********************************-->
      
        <!--**********************************
            Footer end
        ***********************************-->

        <!--**********************************
           Support ticket button start
        ***********************************-->

        <!--**********************************
           Support ticket button end
        ***********************************-->


    </div>



    <!-- Required vendors -->
    <script src="{{ asset('vendor/global/global.min.js') }}"></script>
    <script src="{{ asset('js/quixnav-init.js') }}"></script>
    <script src="{{ asset('js/custom.min.js') }}"></script>
</body>

</html>
