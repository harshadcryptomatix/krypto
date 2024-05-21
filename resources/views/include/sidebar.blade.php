<!-- ======= Sidebar ======= -->
<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item">
        <a class="nav-link @if (!Request::is('*dashboard*')) collapsed @endif" href="{{ route('dashboard') }}">
          <i class="bi bi-grid"></i>
          <span>{{__('Dashboard')}}</span>
        </a>
      </li><!-- End Dashboard Nav -->

      <li class="nav-item">
        <a class="nav-link @if (!Request::is('*profile-info*')) collapsed @endif" href="{{ route('profile.details')}}">
        <i class="ri-account-circle-fill"></i>
          <span>{{__('Profile')}}</span>
        </a>
      </li><!-- End Dashboard Nav -->
    </ul>
  </aside><!-- End Sidebar-->