 <div id="sidebar-wrapper" class="bg-dark">
    <ul class="sidebar-nav">
        <li class="{{ Route::is('bsd-admin.dashboard') ? 'active' : '' }}">
            <a href="{{ route('bsd-admin.dashboard') }}">
                <i class="fa fa-dashboard mr-2"></i> Dashboard
            </a>
        </li>
        <li class="sidebar-submenu-items {{ Route::is('files.index') ? 'active' : '' }}">
            <a href="{{ route('files.index') }}">
                <i class="fa fa-camera mr-2"></i> Media
            </a>
        </li>
        <li class="sidebar-submenu-items">
            <a href="#postSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle {{ Request::is(['bsd-admin/posts', 'bsd-admin/posts/*', 'bsd-admin/categories', 'bsd-admin/categories/*']) ? 'active' : '' }}">
                <i class="fa fa-edit mr-2"></i> Posts
            </a>
            <ul class="collapse {{ Request::is(['bsd-admin/posts', 'bsd-admin/posts/*', 'bsd-admin/categories', 'bsd-admin/categories/*']) ? 'show' : '' }}" id="postSubmenu">
                <li class="{{ Route::is('posts.index') ? 'active' : '' }}">
                    <a href="{{ route('posts.index') }}">All Posts</a>
                </li>
                <li class="{{ Route::is('posts.create') ? 'active' : '' }}">
                    <a href="{{ route('posts.create') }}">Add New Post</a>
                </li>
                <li class="{{ Route::is('categories.index') ? 'active' : '' }}">
                    <a href="{{ route('categories.index') }}">All Categories</a>
                </li>
                <li class="{{ Route::is('categories.create') ? 'active' : '' }}">
                    <a href="{{ route('categories.create') }}">Add New Category</a>
                </li>
            </ul>
        </li>
        <li class="sidebar-submenu-items">
            <a href="#userSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle {{ Request::is(['bsd-admin/user', 'bsd-admin/user/*']) ? 'active' : '' }}">
                <i class="fa fa-users mr-2"></i> Users
            </a>
            <ul class="collapse {{ Request::is(['bsd-admin/user', 'bsd-admin/user/*']) ? 'show' : '' }}" id="userSubmenu">
                <li class="{{ Route::is('user.index') ? 'active' : '' }}">
                    <a href="{{ route('user.index') }}">All Users</a>
                </li>
                <li class="{{ Route::is('user.create') ? 'active' : '' }}">
                    <a href="{{ route('user.create') }}">Add New</a>
                </li>
            </ul>
        </li>
        <li class="sidebar-submenu-items">
            <a href="#permissionsSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle {{ Request::is(['bsd-admin/permissions', 'bsd-admin/permissions/*']) ? 'active' : '' }}">
                <i class="fa fa-plus mr-2"></i> Permissions
            </a>
            <ul class="collapse  {{ Request::is(['bsd-admin/permissions', 'bsd-admin/permissions/*']) ? 'show' : '' }}" id="permissionsSubmenu">
                <li class="{{ Route::is('permissions.index') ? 'active' : '' }}">
                    <a href="{{ route('permissions.index') }}">All Permission</a>
                </li>
                <li class="{{ Route::is('permissions.create') ? 'active' : '' }}">
                    <a href="{{ route('permissions.create') }}">Add New</a>
                </li>
            </ul>
        </li>
        <li class="sidebar-submenu-items">
            <a href="#rolesSubmenu" data-toggle="collapse" aria-expanded="true" class="dropdown-toggle {{ Request::is(['bsd-admin/roles', 'bsd-admin/roles/*']) ? 'active' : '' }}">
                <i class="fa fa-universal-access mr-2"></i> Roles
            </a>
            <ul class="collapse {{ Request::is(['bsd-admin/roles', 'bsd-admin/roles/*']) ? 'show' : '' }}" id="rolesSubmenu">
                <li class="{{ Route::is('roles.index') ? 'active' : '' }}">
                    <a href="{{ route('roles.index') }}">All Roles</a>
                </li>
                <li class="{{ Route::is('roles.create') ? 'active' : '' }}">
                    <a href="{{ route('roles.create') }}">Add New</a>
                </li>
            </ul>
        </li>
        <li class="sidebar-submenu-items">
            <a href="#clientsSubmenu" data-toggle="collapse" aria-expanded="true" class="dropdown-toggle {{ Request::is(['bsd-admin/clients', 'bsd-admin/clients/*', 'bsd-admin/projects', 'bsd-admin/projects/*']) ? 'active' : '' }}">
                <i class="fa fa-user mr-2"></i> Clients
            </a>
            <ul class="collapse {{ Request::is(['bsd-admin/clients', 'bsd-admin/clients/*', 'bsd-admin/projects', 'bsd-admin/projects/*']) ? 'show' : '' }}" id="clientsSubmenu">
                <li class="{{ Route::is('clients.index') ? 'active' : '' }}">
                    <a href="{{ route('clients.index') }}">All Clients</a>
                </li>
                <li class="{{ Route::is('clients.create') ? 'active' : '' }}">
                    <a href="{{ route('clients.create') }}">Add New Client</a>
                </li>
                <li class="{{ Route::is('projects.index') ? 'active' : '' }}">
                    <a href="{{ route('projects.index') }}">All Projects</a>
                </li>
                <li class="{{ Route::is('projects.create') ? 'active' : '' }}">
                    <a href="{{ route('projects.create') }}">Add New Project</a>
                </li>
            </ul>
        </li>
    </ul>
        </div>