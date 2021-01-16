<!-- This file is used to store sidebar items, starting with Backpack\Base 0.9.0 -->
<li class="nav-item">
    <a class="nav-link" href="{{ backpack_url('dashboard') }}">
        <i class="fas fa-tachometer-alt nav-icon"></i> {{ trans('backpack::base.dashboard') }}
    </a>
</li>
<li class="nav-item">
    <a class="nav-link" href="{{ backpack_url('user') }}">
        <i class="nav-icon fas fa-user"></i>
        <span>Users</span>
    </a>
</li>
<li class='nav-item'>
    <a class='nav-link' href='{{ backpack_url('group') }}'>
        <i class='nav-icon fas fa-users'></i>
        Groups
    </a>
</li>
<li class="nav-item nav-dropdown">
    <a class="nav-link nav-dropdown-toggle" href="#">
        <i class="nav-icon fas fa-cogs"></i>
        System
    </a>
    <ul class="nav-dropdown-items">
        <li class='nav-item'>
            <a class='nav-link' href='{{ backpack_url('setting') }}'>
                <i class='nav-icon'></i>
                <span>Settings</span>
            </a>
        </li>
        <li class='nav-item'>
            <a class='nav-link' href='{{ backpack_url('log') }}'>
                <i class='nav-icon'></i>
                Logs
            </a>
        </li>
    </ul>
</li>