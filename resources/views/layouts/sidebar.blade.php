{{--Left sidebar--}}
<nav class="mt-2">

    <ul class="nav nav-pills nav-sidebar flex-column nav-child-indent" data-widget="treeview" role="menu"
        data-accordion="false">

        <li class="nav-item">
            <a href="{{ route('home') }}" class="nav-link {{ Request::is('home*') ? "active":'' }}">
                <i class="fas fa-cog"></i>
                <p>Главная</p>
            </a>
        </li>

        <li class="nav-item">
            <a href="{{ route('dayIndex') }}" class="nav-link {{ Request::is('day*') ? "active":'' }}">
                <i class="fas fa-calendar-day"></i>
                <p>Days</p>
            </a>
        </li>

        <li class="nav-item has-treeview">
            <a href="#"
               class="nav-link {{ (Request::is('permission*') || Request::is('role*') || Request::is('user*')) ? 'active':''}}">
                <i class="fas fa-users-cog"></i>
                <p>
                    @lang('cruds.userManagement.title')
                    <i class="right fas fa-angle-left"></i>
                </p>
            </a>
            <ul class="nav nav-treeview"
                style="display: {{ (Request::is('permission*') || Request::is('role*') || Request::is('user*')) ? 'block':'none'}};">
                <li class="nav-item">
                    <a href="{{ route('permissionIndex') }}"
                       class="nav-link {{ Request::is('permission*') ? "active":'' }}">
                        <i class="fas fa-key"></i>
                        <p> @lang('cruds.permission.title_singular')</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('roleIndex') }}"
                       class="nav-link {{ Request::is('role*') ? "active":'' }}">
                        <i class="fas fa-user-lock"></i>
                        <p> @lang('cruds.role.fields.roles')</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('userIndex') }}"
                       class="nav-link {{ Request::is('user*') ? "active":'' }}">
                        <i class="fas fa-user-friends"></i>
                        <p> @lang('cruds.user.title')</p>
                    </a>
                </li>
            </ul>
        </li>
    </ul>
</nav>
