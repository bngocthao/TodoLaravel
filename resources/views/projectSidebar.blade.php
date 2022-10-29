{{-- show hết cho người dùng admin, show pj đc quản lý quản lý cho quản lý, --}}
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
