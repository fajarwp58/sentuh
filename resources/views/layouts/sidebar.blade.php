<div class="container-fluid page-body-wrapper">
<!-- partial:partials/_sidebar.html -->
<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
      <li class="nav-item">
        <a class="nav-link" href="{{ url('/') }}">
          <i class="icon-grid menu-icon"></i>
          <span class="menu-title">CRUD</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{ route('crud.fabric') }}">
          <i class="icon-paper menu-icon"></i>
          <span class="menu-title">FABRIC JS</span>
        </a>
      </li>
    </ul>
  </nav>

  <div class="main-panel">
    @yield('content')
<!-- container-scroller -->
</div>
<!-- main-panel ends -->
</div>
