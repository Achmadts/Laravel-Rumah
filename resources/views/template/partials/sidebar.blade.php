<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ asset('/') }}">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">SB Admin <sup>2</sup></div>
    </a>

    @can('manage_petugas')
        <!-- Divider -->
        <hr class="sidebar-divider my-0">
        <!-- Nav Item - Dashboard -->
        <li class="nav-item active">
            <a class="nav-link" href="{{ asset('/dashboard/petugas') }}">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>Dashboard</span></a>
        </li>
    @endcan

    @can('manage_admin')
        <!-- Divider -->
        <hr class="sidebar-divider my-0">
        <!-- Nav Item - Dashboard -->
        <li class="nav-item active">
            <a class="nav-link" href="{{ asset('/dashboard/admin') }}">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>Dashboard</span></a>
        </li>
    @endcan

    <!-- Divider -->

    @can('manage_admin')
        <hr class="sidebar-divider">
        <li class="nav-item active">
            <a class="nav-link" href="{{ asset('/spp') }}">
                <i class="fa-regular fa-note-sticky"></i>
                <span>Data Spp</span></a>
        </li>
    @endcan

    @can('manage_admin')
        <hr class="sidebar-divider">
        <li class="nav-item active">
            <a class="nav-link" href="{{ asset('/kelas') }}">
                <i class="fa-solid fa-school"></i>
                <span>Data Kelas</span></a>
        </li>
    @endcan

    @can('manage_admin')
        <hr class="sidebar-divider">
        <li class="nav-item active">
            <a class="nav-link" href="{{ asset('/siswa') }}">
                <i class="fa-solid fa-person"></i>
                <span>Data Siswa</span></a>
        </li>
    @endcan

    @can('manage_admin')
        <hr class="sidebar-divider">
        <li class="nav-item active">
            <a class="nav-link" href="{{ asset('/user') }}">
                <i class="fa-solid fa-user-large"></i>
                <span>Data Petugas</span></a>
        </li>
    @endcan

    @can('manage_petugas')
        <hr class="sidebar-divider">
        <li class="nav-item active">
            <a class="nav-link" href="{{ asset('/pembayaran') }}">
                <i class="fa-solid fa-sack-dollar"></i>
                <span>Data Pembayaran</span></a>
        </li>
    @endcan
    <hr class="sidebar-divider">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>
</ul>
