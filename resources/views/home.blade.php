<!doctype html>
<html lang="en">
<head>
   @include('head')
</head>
<body>
<!-- Pre-loader start -->
<div class="theme-loader">
    <div class="ball-scale">
        <div class='contain'>
            <div class="ring">
                <div class="frame"></div>
            </div>
            <div class="ring">
                <div class="frame"></div>
            </div>
            <div class="ring">
                <div class="frame"></div>
            </div>
            <div class="ring">
                <div class="frame"></div>
            </div>
            <div class="ring">
                <div class="frame"></div>
            </div>
            <div class="ring">
                <div class="frame"></div>
            </div>
            <div class="ring">
                <div class="frame"></div>
            </div>
            <div class="ring">
                <div class="frame"></div>
            </div>
            <div class="ring">
                <div class="frame"></div>
            </div>
            <div class="ring">
                <div class="frame"></div>
            </div>
        </div>
    </div>
</div>
<!-- Pre-loader end -->
<div id="pcoded" class="pcoded">
    <div class="pcoded-overlay-box"></div>
    <div class="pcoded-container navbar-wrapper">

        <nav class="navbar header-navbar pcoded-header">
            <div class="navbar-wrapper">

                <div class="navbar-logo" >
                    <a class="mobile-menu" id="mobile-collapse" href="#!">
                        <i class="feather icon-menu"></i>
                    </a>
                    <a href="{{ route('home') }}">
                        <img class="img-fluid" src="\template\files\assets\images\logo.png" alt="Theme-Logo" width = "25%">
                    </a>
                    <a class="mobile-options">
                        <i class="feather icon-more-horizontal"></i>
                    </a>
                </div>

                <div class="navbar-container container-fluid">
                    <ul class="nav-left">
                        <li class="header-search">
                            <div class="main-search morphsearch-search">
                                <div class="input-group">
                                    <span class="input-group-addon search-close"><i class="feather icon-x"></i></span>
                                    <input type="text" class="form-control">
                                    <span class="input-group-addon search-btn"><i class="feather icon-search"></i></span>
                                </div>
                            </div>
                        </li>
                        <li>
                            <a href="#!" onclick="javascript:toggleFullScreen()">
                                <i class="feather icon-maximize full-screen"></i>
                            </a>
                        </li>
                    </ul>
                    <ul class="nav-right">
                        <li class="header-notification">
                            <div class="dropdown-primary dropdown">

                            </div>
                        </li>
{{--                        <li class="header-notification">--}}
{{--                            <div class="dropdown-primary dropdown">--}}
{{--                                <div class="displayChatbox dropdown-toggle" data-toggle="dropdown">--}}
{{--                                    <i class="feather icon-message-square"></i>--}}
{{--                                    <span class="badge bg-c-green">3</span>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </li>--}}
                        <li class="user-profile header-notification">
                            <div class="dropdown-primary dropdown">

                                <div class="dropdown-toggle" data-toggle="dropdown">
                                    {{--ảnh đại diện--}}
                                    <img src="/avatar_upload/{{Auth::user()->avatar}}" class="img-radius" alt="User-Profile-Image">
{{--                                    <span>{{Auth::guard('account')->user()->fullName}}</span>--}}
                                    <span>{{Auth::user()->name}}</span>
{{--                                    <span>{{Auth::guard('account')->user()->fullName}}</span>--}}
                                    <i class="feather icon-chevron-down"></i>
                                </div>
                                <ul class="show-notification profile-notification dropdown-menu" data-dropdown-in="fadeIn" data-dropdown-out="fadeOut">
                                    <li>
                                        <a href="user-profile.htm">
                                            <i class="feather icon-user"></i> Thông tin
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{route('home.logout')}}">
                                            <i class="feather icon-log-out"></i> Đăng xuất
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <!-- Sidebar inner chat end-->
        @include('sidebar')
    </div>
</div>
@include('footer')
</body>
</html>
