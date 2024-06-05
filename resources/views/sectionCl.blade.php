<aside class="main-sidebar sidebar-secondary elevation-4">
    <!-- Brand Logo -->
    <a href="login" class="brand-link">
      <img src="{{ asset('https://i.pinimg.com/564x/c1/4d/42/c14d4224df992ee8f06ef82afff0d9c0.jpg')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">@lang('GARAGISTE')</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">

        <div class="info" style="color:rgb(21, 20, 20)">
          {{ Auth::user()->name}}

        </div>
      </div>



      <!-- Sidebar Menu -->
      <nav class="mt-2 custom-nav">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-item">
            <a href="{{route('vehicules.index')}}" class="nav-link custom-nav-link">
              <i class="nav-icon fas fa-th custom-icon"></i>
              <p>@lang('Gestion des Vehicules')</p>
            </a>
            <a href="{{route('factures.listec')}}" class="nav-link custom-nav-link">
              <i class="nav-icon fas fa-th custom-icon"></i>
              <p>@lang('Gestion des Factures')</p>
            </a>
          </li>
        </ul>
      </nav>

      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
