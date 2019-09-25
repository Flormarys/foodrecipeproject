<body id="page-top" class="sidebar-toggled">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-info sidebar sidebar-dark accordion" id="accordionSidebar">

        <!-- Sidebar - Brand -->
        <a class="sidebar-brand d-flex align-items-center justify-content-center" href="/">
        <div class="sidebar-brand-icon rotate-n-15">
        <i class="fas fa-utensils"></i>
        </div>
        <div class="sidebar-brand-text mx-3">{{ config('app.name', 'Food Recipe') }}</div>
        </a>

        <!-- Divider -->
        <hr class="sidebar-divider my-0">

        <!-- Nav Item - Dashboard -->
        <li class="nav-item">
        <a class="nav-link" href="/historic">
        <i class="far fa-newspaper"></i>
        <span>Historical</span></a>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider">

        <!-- Heading -->
        <div class="sidebar-heading">
        Interface
        </div>

        <!-- Nav Item  -->
        <li class="nav-item">
        <a class="nav-link collapsed" href="/">
        <i class="fas fa-clipboard-check"></i>
        <span>Ingredients</span>
        </a>
        </li>

        <!-- Nav Item -->
        <li class="nav-item">
        <a class="nav-link collapsed" href="/ingredients/create">
        <i class="far fa-keyboard"></i>
        <span>Upload New Ingredient</span>
        </a>
        </li>


        <!-- Nav Item  -->
        <li class="nav-item active">
        <a class="nav-link" href="/recipes">
        <i class="fas fa-clipboard-list"></i>
        <span>Recipes</span></a>
        </li>
    </ul>
<!-- End of Sidebar -->

<!-- Content Wrapper -->
<div id="content-wrapper" class="d-flex flex-column">

    <!-- Topbar -->
    <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

    <!-- Sidebar Toggle (Topbar) -->
    {{-- <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
    <i class="fa fa-bars"></i>
    </button> --}}

    <!-- Topbar Navbar -->
        <ul class="navbar-nav ml-auto">
            <div class="topbar-divider d-none d-sm-block"></div>
            @guest
            <li class="nav-item">
                <h3 class="m-0 font-weight-bold text-info">
                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                </h3>

            </li>
            @if (Route::has('register'))
                <li class="nav-item">
                    <h3 class="m-0 font-weight-bold text-info">
                        <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                    </h3>
                </li>
            @endif
            @else
            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-info small">{{ Auth::user()->name }} </span>
                <i class="far fa-user-circle"></i>
              </a>
              <!-- Dropdown - User Information -->
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="/users/edit">
                  <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                  Edit
                </a>

                <a class="dropdown-item" href=href="{{ route('logout') }}"
                   onclick="event.preventDefault();
                                 document.getElementById('logout-form').submit();" data-toggle="modal" data-target="#logoutModal">
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                  Logout
                </a>
              </div>
            </li>
            @endguest
        </ul>
    </nav>

</body>
