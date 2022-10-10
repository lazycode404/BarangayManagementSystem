<!-- Brand Logo -->
<a href="#" class="brand-link">
    <img src="@if ($barangay === null || $barangay->logo === null) {{ asset('assets/images/yourlogo1.png') }} @else {{ asset('assets/images/' . $barangay->logo) }} @endif"
        alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
    <span class="brand-text font-weight-light">Barangay Records</span>
</a>

<style>
    .finals {
        font-size: 15px;
    }

    a {
        text-decoration: none !important;
    }
</style>
<!-- Sidebar -->
<div class="sidebar">
    <!-- Sidebar Menu -->
    <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <li class="nav-header"><a href="/admin/dashboard">DASHBOARD</a></li>
            <li class="nav-item">
                <a href="/admin/barangay" class="nav-link {{ 'admin/barangay' == request()->path() ? 'active' : '' }}">
                    <i class="fa fa-info-circle nav-icon"></i>
                    <p>Barangay Information</p>
                </a>
            </li>
            {{-- BARANGAY OFFICIALS --}}
            <li class="nav-item {{ request()->is('admin/officials_list') ? 'active menu-open' : '' }}">
                <a href="#" class="nav-link {{ request()->is('admin/officials_list') ? 'active menu-open' : '' }}">
                    <i class="nav-icon fa fa-sitemap" aria-hidden="true"></i>
                    <p>
                        Barangay Officials
                        <i class="fa fa-angle-left right"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="fa fa-circle nav-icon"></i>
                            <p>List of Official</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="/admin/officials_list" class="nav-link {{ 'admin/officials_list' == request()->path() ? 'active' : '' }}">
                            <i class="fa fa-circle nav-icon"></i>
                            <p>Manage Official</p>
                        </a>
                    </li>
                </ul>
            </li>

            {{-- BARANGAY RESIDENTS --}}
            <li class="nav-item {{ request()->is('admin/resident') || request()->is('admin/resident/create') ? 'active menu-open' : '' }}">
                <a href="#" class="nav-link {{ request()->is('admin/resident') || request()->is('admin/resident/create') ? 'active menu-open' : '' }}">
                    <i class="nav-icon fa fa-address-book" aria-hidden="true"></i>
                    <p>
                        Residents
                        <i class="fa fa-angle-left right"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="/admin/resident" class="nav-link {{ 'admin/resident' == request()->path() ? 'active' : '' }}">
                            <i class="fa fa-circle nav-icon"></i>
                            <p>Resident List</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="/admin/resident/create" class="nav-link {{ 'admin/resident/create' == request()->path() ? 'active' : '' }}">
                            <i class="fa fa-circle nav-icon"></i>
                            <p>Add Resident</p>
                        </a>
                    </li>
                </ul>
            </li>

            {{-- BLOTTER RECORDS --}}
            <li class="nav-item {{ request()->is('admin/blotter') ? 'active menu-open' : '' }}">
                <a href="#" class="nav-link {{ request()->is('admin/blotter') ? 'active menu-open' : '' }}">
                    <i class="fa fa-database nav-icon" aria-hidden="true"></i>
                    <p>
                        Blotter Record
                        <i class="fa fa-angle-left right"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="/admin/blotter" class="nav-link {{ 'admin/blotter' == request()->path() ? 'active' : '' }}">
                            <i class="fa fa-circle nav-icon"></i>
                            <p>Records</p>
                        </a>
                    </li>
                </ul>
            </li>


             {{-- BLOTTER RECORDS --}}
            <li class="nav-item">
                <a href="#" class="nav-link">
                    <i class="fa fa-file nav-icon" aria-hidden="true"></i>
                    <p>
                        Certificate
                        <i class="fa fa-angle-left right"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="/admin/certificate/issue_certificate" class="nav-link">
                            <i class="fa fa-circle nav-icon"></i>
                            <p>Issue Certificate</p>
                        </a>
                    </li>
                </ul>
            </li>

        </ul>
    </nav>
    <!-- /.sidebar-menu -->
</div>
<!-- /.sidebar -->
