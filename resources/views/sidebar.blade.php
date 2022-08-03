<div class="pcoded-main-container">
    <div class="pcoded-wrapper">
        <nav class="pcoded-navbar">
            <div class="pcoded-inner-navbar main-menu">
                <div class="pcoded-navigatio-lavel">HỆ THỐNG QUẢN LÝ</div>
                <ul class="pcoded-item pcoded-left-item">
                    <li class="pcoded-hasmenu active pcoded-trigger">
                        <a href="javascript:void(0)">
                            <span class="pcoded-micon"><i class="feather icon-book"></i></span>
                            <span class="pcoded-mtext">QUẢN LÝ DỰ ÁN</span>
                        </a>
                        <ul class="pcoded-submenu">
                            <li class="active">
                                <a href="{{route('projects.index')}}">
                                    <span class="pcoded-mtext">Danh Sách Dự Án</span>
                                </a>
                            </li>
                            <li class="active">
                                <a href="{{route('projects.create')}}">
                                    <span class="pcoded-mtext">Thêm Dự Án</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                </ul>

                <ul class="pcoded-item pcoded-left-item">
                    <li class="pcoded-hasmenu active pcoded-trigger">
                        <a href="javascript:void(0)">
                            <span class="pcoded-micon"><i class="feather icon-bookmark"></i></span>
                            <span class="pcoded-mtext">QUẢN LÝ CÔNG VIỆC</span>
                        </a>
                        <ul class="pcoded-submenu">
                            <li class="active">
                                <a href="{{route('tasks.index')}}">
                                    <span class="pcoded-mtext">Danh Sách Công Việc</span>
                                </a>
                            </li>
                            <li class="active">
                                <a href="{{route('tasks.create')}}">
                                    <span class="pcoded-mtext">Thêm Công Việc</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                </ul>

                <ul class="pcoded-item pcoded-left-item">
                    <li class="pcoded-hasmenu active pcoded-trigger">
                        <a href="javascript:void(0)">
                            <span class="pcoded-micon"><i class="feather icon-user"></i></span>
                            <span class="pcoded-mtext">QUẢN LÝ THÀNH VIÊN</span>
                        </a>
                        <ul class="pcoded-submenu">
                            <li class="active">
                                <a href="{{route('users.index')}}">
                                    <span class="pcoded-mtext">Danh Sách Thành viên</span>
                                </a>
                            </li>
                            <li class="active">
                                <a href="{{route('users.index')}}">
                                    <span class="pcoded-mtext">Thêm Thành viên</span>
                                </a>
                            </li>
                            <li class="active">
                                <a href="{{route('positions.index')}}">
                                    <span class="pcoded-mtext">Quản lý chức vụ</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                </ul>
                <ul class="pcoded-item pcoded-left-item">
                    <li class="pcoded-hasmenu active pcoded-trigger">
                        <a href="javascript:void(0)">
                            <span class="pcoded-micon"><i class="feather icon-list"></i></span>
                            <span class="pcoded-mtext">PHÒNG BAN</span>
                        </a>
                        <ul class="pcoded-submenu">
                            <li class="active">
                                <a href="{{route('departments.index')}}">
                                    <span class="pcoded-mtext">Danh Sách Phòng Ban</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </nav>
        <div class="pcoded-content">
            <div class="pcoded-inner-content">
                <div class="main-body">
                    <div class="page-wrapper">
                        <div class="page-body">
                            <!-- Report Project -->
                            @include('Project.project_report')
                            <!-- End Report Project -->
                            @section('content') @show
                        </div>
                    </div>

                    <div id="styleSelector">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
