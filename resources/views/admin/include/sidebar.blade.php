<!-- ======= Sidebar ======= -->
<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item">
        <a class="nav-link " href="{{ route('admin.dashboard') }}">
          <i class="bi bi-grid"></i>
          <span>Dashboard</span>
        </a>
      </li><!-- End Dashboard Nav -->

     

      <li class="nav-item">
        <a class="nav-link " data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-person"></i><span>User Management</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="components-nav" class="nav-content collapse @if(Request::is('*admin-users*')) show @endif" data-bs-parent="#sidebar-nav">
          <li>
            <a href="{{route('admin.admin-list')}}" @if (Request::is('*admin-users*')) class="active"  @endif>
              <i class="bi bi-circle"></i><span>Admins</span>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <i class="bi bi-circle"></i><span>Merchants</span>
            </a>
          </li>
         
        </ul>
      </li><!-- End Components Nav -->
    </ul>

  </aside><!-- End Sidebar-->