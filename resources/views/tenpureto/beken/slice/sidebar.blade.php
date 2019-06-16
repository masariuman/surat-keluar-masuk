<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>
        <li class="{{ Request::is('dashboard') ? 'active' : '' }}">
          <a href="/dashboard">
            <i class="fa fa-dashboard"></i> <span>Beranda</span>
          </a>
        </li>
        <li class="{{ Request::is('surat-masuk') ? 'active' : '' }}">
          <a href="/surat-masuk">
            <i class="fa fa-sign-in"></i> <span>Surat Masuk</span>
          </a>
        </li>
        <li class="{{ Request::is('surat-keluar') ? 'active' : '' }}">
            <a href="/surat-keluar">
              <i class="fa fa-sign-out"></i> <span>Surat Keluar</span>
            </a>
          </li>
        <li class="header">PENGATURAN</li>
        <li class="{{ Request::is('surat-keluar') ? 'active' : '' }}">
            <a href="{{ route('logout') }}">
              <i class="fa fa-reply"></i> <span>LOG OUT</span>
            </a>
          </li>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>
