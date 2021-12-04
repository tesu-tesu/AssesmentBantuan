
  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="{{ asset('') }}assets/template/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Assessment Bantuan</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item menu-open">
            <a href="{{ route('read_admin') }}" class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('read_admin') }}" class="nav-link {{ Request::is('admin*') ? 'active' : '' }}">
                  <i class="fa fa-user nav-icon"></i>
                  <p>Admin</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('read_user') }}"  class="nav-link {{ Request::is('user*') ? 'active' : '' }}">
                  <i class="fa fa-users nav-icon"></i>
                  <p>User</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('read_lembaga') }}" class="nav-link {{ Request::is('lembaga*') ? 'active' : '' }}">
                  <i class="fas fa-building nav-icon"></i>
                  <p>Lembaga</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('read_pengajuan') }}" class="nav-link {{ Request::is('pengajuan*') ? 'active' : '' }}">
                  <i class="fas fa-file nav-icon"></i>
                  <p>Pengajuan</p>
                </a>
              </li>
            </ul>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>