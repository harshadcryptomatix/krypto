<!-- ======= Sidebar ======= -->
<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item">
        <a class="nav-link @if (!Request::is('*dashboard*')) collapsed @endif" href="{{ route('admin.dashboard') }}">
          <i class="bi bi-grid"></i>
          <span>Dashboard</span>
        </a>
      </li><!-- End Dashboard Nav -->

      <li class="nav-item">
        <a class="nav-link @if (!Request::is('*admin-users*') && !Request::is('*merchants*')) collapsed @endif" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-person"></i><span>User Management</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="components-nav" class="nav-content collapse @if((Request::is('*admin-users*') || Request::is('*merchants*'))) show @endif" data-bs-parent="#sidebar-nav">
          <li>
            <a href="{{route('admin.admin-list')}}" @if (Request::is('*admin-users*')) class="active"  @endif>
              <i class="bi bi-circle"></i><span>{{__('Admins')}}</span>
            </a>
          </li>
          <li>
            <a href="{{route('admin.merchants')}}" @if (Request::is('*merchants*')) class="active"  @endif>
              <i class="bi bi-circle"></i><span>{{__('Merchants')}}</span>
            </a>
          </li>
         
        </ul>
      </li><!-- End Components Nav -->

      <li class="nav-item">
        <a class="nav-link @if (!Request::is('*merchant-applications*')) collapsed @endif" data-bs-target="#applications-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-person"></i><span>Applications </span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="applications-nav" class="nav-content collapse @if(Request::is('*merchant-applications*')) show @endif" data-bs-parent="#sidebar-nav">
          <li>
            
            <a href="{{route('admin.merchantapplications')}}" @if (Request::is('*merchant-applications*')) class="active"  @endif>
              <i class="bi bi-circle"></i><span>Merchant's Applications</span>
            </a>
          </li>
        </ul>
      </li><!-- End Components Nav -->

      

      <li class="nav-item">
        <a class="nav-link @if (!Request::is('*orders*')) collapsed @endif" href="{{route('admin.orders.index')}}">
        <i class="bi bi-shop-window"></i>
          <span>{{__('Orders')}}</span>
        </a>
      </li><!-- End Dashboard Nav -->
      
    </ul>

  </aside><!-- End Sidebar-->