<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <a href="{{route('dashboard')}}" class="brand-link">
      <span class="brand-text font-weight-light">Task Management System</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <li class="nav-item">
                <a href="{{route('dashboard')}}" class="nav-link {{ request()->is('dashboard') ? 'active' : '' }}"><i class="fas fa-border-all"></i><span> Dashboard</span></a>
            </li>

            <!-- <li class="nav-item">
                <a href="#" class="nav-link"><i class="nav-icon fas fa-copy"></i><p>Task<i class="fas fa-angle-left right"></i></p></a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="#" class="nav-link"><i class="far fa-circle nav-icon"></i><p>Create Task</p></a>
                    </li>

                    <li class="nav-item">
                        <a href="#" class="nav-link"><i class="far fa-circle nav-icon"></i><p>All Task</p></a>
                    </li>
                </ul>
            </li> -->

            <li class="nav-item {{ request()->is('tasks') || request()->is('tasks/create') || request()->is('tasks/edit/*') || request()->is('tasks/view/*') ? 'menu-open' : '' }}">
                    <a href="#" class="dropdown nav-link {{ request()->is('tasks') || request()->is('tasks/create') ? 'active' : '' }}">
                    <i class="fas fa-tasks"></i>
                    <p> Task <i class="right fas fa-angle-right"></i></p>
                </a>
                <ul class="nav nav-treeview" style="{{ request()->is('tasks') || request()->is('tasks/create') || request()->is('tasks/edit/*') || request()->is('tasks/view/*') ? 'display: block;' : 'display: none;' }}">
                    <li class="nav-item">
                        <a href="{{ route('tasks.create') }}" class="nav-link {{ request()->is('tasks/create') ? 'active' : '' }}">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Create Task</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('tasks.index') }}" class="nav-link {{ request()->is('tasks') || request()->is('tasks/edit/*') || request()->is('tasks/view/*') ? 'active' : '' }}">
                            <i class="far fa-circle nav-icon"></i>
                            <p>All Task</p>
                        </a>
                    </li>
                </ul>
            </li>
        </ul>
      </nav>
    </div>
</aside>
