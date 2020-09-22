<div class="sidebar">
    <!-- Sidebar Menu -->
    <nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column"  data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
             with font-awesome or any other icon font library -->
        <li class="nav-item">
            <a href="{{ route('home') }}" class="nav-link">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>Dashboard</p>
            </a>
        </li>
        <li class="nav-item has-treeview">
            <a href="" class="nav-link">
                <i class="nav-icon fas fa-user"></i>
                <p>Patients<i class="right fas fa-angle-left"></i></p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="{{ route('patients.index') }}" class="nav-link">
                        <div class="pl-3">
                            <i class="fas fa-users nav-icon"></i>
                            <p>List Patients</p>
                        </div>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('calculator.index') }}" class="nav-link">
                        <div class="pl-3">
                            <i class="fas fa-calculator nav-icon "></i>
                            <p>Calculate</p>
                        </div>
                    </a>
                    <a href="{{ route('patients.deleted') }}" class="nav-link">
                        <div class="pl-3">
                            <i class="fas fa-trash nav-icon"></i>
                            <p>Deleted Patients</p>
                        </div>
                    </a>
                </li>
                <hr />
            </ul>
        </li>
        <li class="nav-item">
            <a href="{{ route('bookings.index') }}" class="nav-link">
                <i class="nav-icon fas fa-calendar-alt"></i>
                <p>Bookings</p>
            </a>
        </li>
    </ul>
</nav>
<!-- /.sidebar-menu -->
</div>
