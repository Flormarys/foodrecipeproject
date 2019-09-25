<body id="page-top" class="sidebar-toggled">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-info sidebar sidebar-dark accordion" id="accordionSidebar">

        <!-- Sidebar - Brand -->
        <a class="sidebar-brand d-flex align-items-center justify-content-center" href="/">
        <div class="sidebar-brand-icon rotate-n-15">
        <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">{{ config('app.name', 'Food Recipe') }}</div>
        </a>

        <!-- Divider -->
        <hr class="sidebar-divider my-0">

        <!-- Nav Item - Dashboard -->
        <li class="nav-item">
        <a class="nav-link" href="/historic">
        <i class="fas fa-fw fa-tachometer-alt"></i>
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
        <i class="fas fa-fw fa-cog"></i>
        <span>Ingredients</span>
        </a>
        </li>

        <!-- Nav Item -->
        <li class="nav-item">
        <a class="nav-link collapsed" href="/ingredients/create">
        <i class="fas fa-fw fa-wrench"></i>
        <span>Upload New Ingredient</span>
        </a>
        </li>


        <!-- Nav Item  -->
        <li class="nav-item active">
        <a class="nav-link" href="/recipes">
        <i class="fas fa-fw fa-table"></i>
        <span>Recipes</span></a>
        </li>
    </ul>
<!-- End of Sidebar -->

<!-- Content Wrapper -->
<div id="content-wrapper" class="d-flex flex-column">

    <!-- Topbar -->
    <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

    <!-- Sidebar Toggle (Topbar) -->
    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
    <i class="fa fa-bars"></i>
    </button>

    <!-- Topbar Navbar -->
        <ul class="navbar-nav ml-auto">
            @guest
            <li class="nav-item">
                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
            </li>
            @if (Route::has('register'))
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                </li>
            @endif
            @else
            <li class="nav-item">
                <a class="nav-link" href="#" role="button" aria-haspopup="true" aria-expanded="false" v-pre>
                    {{ Auth::user()->name }} <span class="caret"></span>
                </a>
                <div class="nav-item">
                <a class= class="nav-item active" href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">
                    {{ __('Logout') }}
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
                </div>
            </li>
            @endguest
        </ul>
    </nav>
</body>
