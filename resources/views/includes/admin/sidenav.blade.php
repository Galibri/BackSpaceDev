 <div id="sidebar-wrapper" class="bg-dark">
    <ul class="sidebar-nav">
        <li>
            <a href="{{ route('bsd-admin.dashboard') }}">
                <i class="fa fa-dashboard mr-2"></i> Dashboard
            </a>
        </li>
        <li class="sidebar-submenu-items active">
            <a href="#pageSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                <i class="fa fa-file-text mr-2"></i> Pages
            </a>
            <ul class="collapse list-unstyled" id="pageSubmenu">
                <li>
                    <a href="#">All Pages</a>
                </li>
                <li>
                    <a href="#">Add New</a>
                </li>
            </ul>
        </li>
        <li class="sidebar-submenu-items active">
            <a href="#mediaSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                <i class="fa fa-camera mr-2"></i> Media
            </a>
            <ul class="collapse list-unstyled" id="mediaSubmenu">
                <li>
                    <a href="#">All Media</a>
                </li>
                <li>
                    <a href="#">Add New</a>
                </li>
                <li>
                    <a href="#">Categories</a>
                </li>
            </ul>
        </li>
        <li class="sidebar-submenu-items active">
            <a href="#postSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                <i class="fa fa-edit mr-2"></i> Posts
            </a>
            <ul class="collapse list-unstyled" id="postSubmenu">
                <li>
                    <a href="#">All Posts</a>
                </li>
                <li>
                    <a href="#">Add New</a>
                </li>
                <li>
                    <a href="#">Categories</a>
                </li>
            </ul>
        </li>
        <li class="sidebar-submenu-items active">
            <a href="#userSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                <i class="fa fa-users mr-2"></i> Users
            </a>
            <ul class="collapse list-unstyled" id="userSubmenu">
                <li>
                    <a href="{{ route('user.index') }}">All Users</a>
                </li>
                <li>
                    <a href="{{ route('user.create') }}">Add New</a>
                </li>
                <li>
                    <a href="{{ route('permissions.index') }}">Roles &amp; Permissions</a>
                </li>
            </ul>
        </li>
    </ul>
        </div>