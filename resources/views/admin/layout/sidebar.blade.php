<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
  <!-- Sidebar - Brand -->
  <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ url('/admin') }}">
    <div class="sidebar-brand-icon rotate-n-15">
      <i class="fas fa-laugh-wink"></i>
    </div>
    <div class="sidebar-brand-text mx-3">ADMIN <sup>2</sup></div>
  </a>

  <!-- Divider -->
  <hr class="sidebar-divider my-0">

  <!-- Nav Item - Dashboard -->
  <li class="nav-item <?php if ($title === 'Dashboard') { echo 'active'; } ?>">
    <a class="nav-link" href="{{ route('dashboard') }}">
      <i class="fas fa-fw fa-tachometer-alt"></i>
      <span>Dashboard</span></a>
  </li>

  <li class="nav-item <?php if ($title === 'Verifikasi Pembayaran') { echo 'active'; } ?>">
    <a class="nav-link" href="{{ route('verifikasi') }}">
      <i class="fas fa-fw fa-list"></i>
      <span>Verifikasi Pembayaran</span></a>
  </li>

  <li class="nav-item <?php if ($title === 'Data Barang') { echo 'active'; } ?>">
    <a class="nav-link" href="{{ route('data_barang') }}">
      <i class="fas fa-fw fa fa-shopping-bag"></i>
      <span>Data Barang</span></a>
  </li>

  <li class="nav-item <?php if ($title === 'Kategori') { echo 'active'; } ?>">
    <a class="nav-link" href="{{ route('data_kategori') }}">
      <i class="fas fa-fw fa-quote-right"></i>
      <span>Kategori</span></a>
  </li>

  <!-- Divider -->
  <hr class="sidebar-divider">

  <!-- Heading -->
  <div class="sidebar-heading">
    Interface
  </div>

  <!-- Nav Item - Pages Collapse Menu -->
  <li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
      <i class="fas fa-fw fa-cog"></i>
      <span>Components</span>
    </a>
    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
      <div class="bg-white py-2 collapse-inner rounded">
        <h6 class="collapse-header">Custom Components:</h6>
      </div>
    </div>
  </li>
  <!-- Sidebar Toggler (Sidebar) -->
  <div class="text-center d-none d-md-inline">
    <button class="rounded-circle border-0" id="sidebarToggle"></button>
  </div>
</ul>