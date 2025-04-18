@php
  use Illuminate\Support\Str;
@endphp

<aside class="menu-sidebar d-none d-lg-block">
  <div class="logo">
    <a href="#">
      <img src="images/icon/logo.png" alt="Cool Admin" />
    </a>
  </div>
  <div class="menu-sidebar__content js-scrollbar1">
    <nav class="navbar-sidebar">
      <ul class="list-unstyled navbar__list">
        <li class="{{ Route::currentRouteName() == 'dashboard' ? 'active' : '' }}">
          <a href={{ route('dashboard') }}>
            <i class="fas fa-tachometer-alt"></i>Dashboard</a>
        </li>
        <li class="{{ Str::startsWith(Route::currentRouteName(), 'orders.') ? 'active' : '' }}">
          <a href={{ route('orders.index') }}>
            <i class="fas fa-tachometer-alt"></i>Orders</a>
        </li>
        <li class="{{ Str::startsWith(Route::currentRouteName(), 'enquiries.') ? 'active' : '' }}">
          <a href={{ route('enquiries.index') }}>
            <i class="fas fa-tachometer-alt"></i>Enquiry</a>
        </li>
      </ul>
    </nav>
  </div>
</aside>
