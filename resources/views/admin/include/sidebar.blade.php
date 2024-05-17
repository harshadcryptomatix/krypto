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
        <a class="nav-link collapsed" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-person"></i><span>User Management</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="components-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="#">
              <i class="bi bi-circle"></i><span>Admins</span>
            </a>
            <a href="{{route('admin.merchants')}}">
              <i class="bi bi-circle"></i><span>Merchants</span>
            </a>
          </li>
        </ul>
      </li><!-- End Components Nav -->
      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#applications-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-person"></i><span>Applications </span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="applications-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            
            <a href="{{route('admin.merchantapplications')}}">
              <i class="bi bi-circle"></i><span>Merchant's Applications</span>
            </a>
          </li>
        </ul>
      </li><!-- End Components Nav -->
    {{--
      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#forms-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-journal-text"></i><span>Forms</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="forms-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="forms-elements.html">
              <i class="bi bi-circle"></i><span>Form Elements</span>
            </a>
          </li>
          <li>
            <a href="forms-layouts.html">
              <i class="bi bi-circle"></i><span>Form Layouts</span>
            </a>
          </li>
          <li>
            <a href="forms-editors.html">
              <i class="bi bi-circle"></i><span>Form Editors</span>
            </a>
          </li>
          <li>
            <a href="forms-validation.html">
              <i class="bi bi-circle"></i><span>Form Validation</span>
            </a>
          </li>
        </ul>
      </li><!-- End Forms Nav -->

      <li class="nav-item">
        <a class="nav-link " data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-person"></i><span>User Management</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="components-nav" class="nav-content collapse @if(Request::is('*admin-users*')) show @endif" data-bs-parent="#sidebar-nav">
          <li>
            <a href="{{route('admin.admin-list')}}" @if (Request::is('*admin-users*')) class="active"  @endif>
              <i class="bi bi-circle"></i><span>{{__('Admins')}}</span>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <i class="bi bi-circle"></i><span>{{__('Merchants')}}</span>
            </a>
          </li>
         
        </ul>
      </li><!-- End Components Nav -->
    </ul>

  </aside><!-- End Sidebar-->