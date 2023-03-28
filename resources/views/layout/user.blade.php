<!DOCTYPE html>
<html lang="en">
<head>
    <!-- basic -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- mobile metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="viewport" content="initial-scale=1, maximum-scale=1">
    <!-- site metas -->
    <title>CRUD</title>
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- site icon -->
    <link rel="icon" href="{{asset("assets/images/fevicon.png")}}" type="image/png" />
    <!-- bootstrap css -->
    <link rel="stylesheet" href="{{asset("assets/css/bootstrap.min.css")}}" />
    <!-- site css -->
    <link rel="stylesheet" href="{{asset("assets/style.css")}}" />
    <!-- responsive css -->
    <link rel="stylesheet" href="{{asset("assets/css/responsive.css")}}" />
    <!-- color css -->
    <link rel="stylesheet" href="{{asset("assets/css/colors.css")}}" />
    <!-- select bootstrap -->
    <link rel="stylesheet" href="{{asset("assets/css/bootstrap-select.css")}}" />
    <!-- scrollbar css -->
    <link rel="stylesheet" href="{{asset("assets/css/perfect-scrollbar.css")}}" />
    <!-- custom css -->
    <link rel="stylesheet" href="{{asset("assets/css/custom.css")}}" />
    <!--[if lt IE 9]>
    <script src="{{asset("https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js")}}"></script>
    <script src="{{asset("https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js")}}"></script>
    <![endif]-->
</head>
<body class="dashboard dashboard_1">
<div class="full_container">
    <div class="inner_container">
        <!-- Sidebar  -->
        <nav id="sidebar">
            <div class="sidebar_blog_1">
                <div class="sidebar-header">
                    <div class="logo_section">
                        <a href="index.html"><img class="logo_icon img-responsive" src="images/logo/logo_icon.png" alt="#" /></a>
                    </div>
                </div>
                <div class="sidebar_user_info">
                    <div class="icon_setting"></div>
                    <div class="user_profle_side">
                        <div class="user_img"><img class="img-responsive" src="{{asset("assets/images/layout_img/user_img.jpg")}}" alt="#" /></div>
                        <div class="user_info">
                            <h6>{{ Auth::user()->name }}</h6>
                            <h5><a class="dropdown-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    <h1 class="text-warning">{{ __('Logout') }}</h1>
                                </a>
                            </h5>
                            <!-- Right Side Of Navbar -->
                            <ul class="navbar-nav ml-auto">

                                <li>
                                    <!-- Authentication Links -->
                                @guest
                                    @if (Route::has('login'))
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                        </li>
                                    @endif

                                    @if (Route::has('register'))
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                        </li>
                                    @endif
                                @else
                                    <li class="nav-item dropdown">
                                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                            {{ Auth::user()->name }}
                                        </a>

                                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                            <a class="dropdown-item" href="{{ route('logout') }}"
                                               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                                <h1 class="text-warning">{{ __('Logout') }}</h1>
                                            </a>

                                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                                @csrf
                                            </form>
                                        </div>
                                    </li>
                                @endguest
                            </ul>
                            <p><span class="online_animation"></span> Online</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="sidebar_blog_2">
                <h4>General</h4>
                <ul class="list-unstyled components">
                    <li>
                        <a href="{{route("view")}}"><i class="fa fa-briefcase blue1_color"></i> <span>View Products</span></a></li>
{{--                    <li>--}}
{{--                        <a href="{{route("manage")}}">--}}
{{--                            <i class="fa fa-paper-plane red_color"></i> <span>Manage Products</span></a>--}}
{{--                    </li>--}}
                   </ul>
            </div>
        </nav>
        <!-- end sidebar -->
        <!-- right content -->
        <div id="content">
            <!-- topbar -->
            <div class="topbar">
                <nav class="navbar navbar-expand-lg navbar-light">
                    <div class="full">
                        <button type="button" id="sidebarCollapse" class="sidebar_toggle"><i class="fa fa-bars"></i></button>
                        <div class="logo_section">
                            <a href="index.html"><img class="img-responsive" src="images/logo/logo.png" alt="#" /></a>
                        </div>
                        <div class="right_topbar">
                            <div class="icon_info">
                                <ul>
                                    <li><a href="#"><i class="fa fa-bell-o"></i><span class="badge">2</span></a></li>
                                    <li><a href="#"><i class="fa fa-question-circle"></i></a></li>
                                    <li><a href="#"><i class="fa fa-envelope-o"></i><span class="badge">3</span></a></li>
                                </ul>
                                <ul class="user_profile_dd">
                                    <li>
                                        <a class="dropdown-toggle" data-toggle="dropdown"><img class="img-responsive rounded-circle" src="images/layout_img/user_img.jpg" alt="#" /><span class="name_user">John David</span></a>
                                        <div class="dropdown-menu">
                                            <a class="dropdown-item" href="profile.html">My Profile</a>
                                            <a class="dropdown-item" href="settings.html">Settings</a>
                                            <a class="dropdown-item" href="help.html">Help</a>
                                            <a class="dropdown-item" href="#"><span>Log Out</span> <i class="fa fa-sign-out"></i></a>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </nav>
            </div>
            <!-- end topbar -->
           @yield('content')

        </div>
    </div>
</div>
<!-- jQuery -->
<script src="{{asset("assets/js/jquery.min.js")}}"></script>
<script src="{{asset("assets/js/popper.min.js")}}"></script>
<script src="{{asset("assets/js/bootstrap.min.js")}}"></script>
<!-- wow animation -->
<script src="{{asset("assets/js/animate.js")}}"></script>
<!-- select country -->
<script src="{{asset("assets/js/bootstrap-select.js")}}"></script>
<!-- owl carousel -->
<script src="{{asset("assets/js/owl.carousel.js")}}"></script>
<!-- chart js -->
<script src="{{asset("assets/js/Chart.min.js")}}"></script>
<script src="{{asset("assets/js/Chart.bundle.min.js")}}"></script>
<script src="{{asset("assets/js/utils.js")}}"></script>
<script src="{{asset("assets/js/analyser.js")}}"></script>
<!-- nice scrollbar -->
<script src="{{asset("assets/js/perfect-scrollbar.min.js")}}"></script>
<script>
    var ps = new PerfectScrollbar('#sidebar');
</script>
<!-- custom js -->
<script src="{{asset("assets/js/custom.js")}}"></script>
<script src="{{asset("assets/js/chart_custom_style1.js")}}"></script>
</body>
</html>
