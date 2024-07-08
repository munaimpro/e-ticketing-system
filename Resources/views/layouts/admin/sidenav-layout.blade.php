<!DOCTYPE html>
<html lang="en" data-bs-theme="light">
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
    <title></title>

    <link rel="icon" type="image/x-icon" href="{{ asset('/favicon.ico') }}" />
    <link href="{{ asset('css/bootstrap.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/animate.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/fontawesome.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/style.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/toastify.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css') }}" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" />
    <link href="{{ asset('css/jquery.dataTables.min.css') }}" rel="stylesheet" />
    <script src="{{ asset('js/jquery-3.7.0.min.js') }}"></script>
    <script src="{{ asset('js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('js/toastify-js.js') }}"></script>
    <script src="{{ asset('js/axios.min.js') }}"></script>
    <script src="{{ asset('js/config.js') }}"></script>
    <script src="{{ asset('js/bootstrap.bundle.js') }}"></script>
</head>

<body>

<div id="loader" class="LoadingOverlay d-none">
    <div class="Line-Progress">
        <div class="indeterminate"></div>
    </div>
</div>

<nav class="navbar fixed-top px-0 shadow-sm bg-white">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">
            <span class="icon-nav m-0 h5" onclick="MenuBarClickHandler()">
                <img class="nav-logo-sm mx-2" src="{{ asset('images/menu.svg') }}" alt="logo"/>
            </span>
            <img class="nav-logo mx-2" src="{{ asset('asset/images/dark-logo.png') }}" alt="logo"/>
        </a>

        <div class="float-right h-auto d-flex">
            <div class="user-dropdown">
                <img class="icon-nav-img" src="{{ asset('images/user.webp') }}" alt=""/>
                <div class="user-dropdown-content">

                    <a href="{{ url('/userProfile') }}" class="side-bar-item">
                        <span class="side-bar-item-caption">Profile</span>
                    </a>

                    <a href="{{ url('/logout') }}" class="side-bar-item">
                        <span class="side-bar-item-caption">Logout</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</nav>

<div id="sideNavRef" class="side-nav-open">
    <a href="{{ route('dashboard') }}" class="side-bar-item nav-link {{ request()->routeIs('dashboard') ? 'active' : '' }}" aria-current="page">
        <i class="bi bi-graph-up"></i>
        <span class="side-bar-item-caption">Dashboard</span>
    </a>
    <a href="{{ route('operatorList') }}" class="side-bar-item nav-link {{ request()->routeIs('operatorList') ? 'active' : '' }}">
        <i class="bi bi-people"></i>
        <span class="side-bar-item-caption">Operator List</span>
    </a>
    <a href="{{ route('users') }}" class="side-bar-item nav-link {{ request()->routeIs('users') ? 'active' : '' }}">
        <i class="bi bi-people"></i>
        <span class="side-bar-item-caption">Customer List</span>
    </a>
    <a href="{{route('allbus')}}" class="side-bar-item nav-link {{ request()->routeIs('allbus') ? 'active' : '' }}">
        <i class="bi bi-list-nested"></i>
        <span class="side-bar-item-caption">All Bus</span>
    </a>
    <a href="{{ route('bus-routes') }}" class="side-bar-item nav-link {{ request()->routeIs('bus-routes') ? 'active' : '' }}">
        <i class="bi bi-currency-dollar"></i>
        <span class="side-bar-item-caption">All Routes</span>
    </a>
    <a href="{{ route('bus-fares') }}" class="side-bar-item nav-link {{ request()->routeIs('bus-fares') ? 'active' : '' }}">
        <i class="bi bi-receipt"></i>
        <span class="side-bar-item-caption">Bus Fares</span>
    </a>
    <a href="{{ route('bookings') }}" class="side-bar-item nav-link {{ request()->routeIs('bookings') ? 'active' : '' }}">
        <i class="bi bi-file-earmark-bar-graph"></i>
        <span class="side-bar-item-caption">Booking List</span>
    </a>
    <a href="{{ route('salse-history') }}" class="side-bar-item nav-link {{ request()->routeIs('salse-history') ? 'active' : '' }}">
        <i class="bi bi-file-earmark-bar-graph"></i>
        <span class="side-bar-item-caption">Sales History</span>
    </a>
    <a href="{{ route('payment_verify') }}" class="side-bar-item nav-link {{ request()->routeIs('payment_verify') ? 'active' : '' }}">
        <i class="bi bi-file-earmark-bar-graph"></i>
        <span class="side-bar-item-caption">Payments</span>
    </a>
    <div class="side-bar-item nav-link" id="contactDropdown">
        <i class="bi bi-envelope"></i>
        <span class="side-bar-item-caption">Contact <i class="bi bi-caret-down-fill"></i></span>
        <div class="dropdown-menu">
            <a class="dropdown-item" href="">Contact 1</a>
            <a class="dropdown-item" href="#">Contact 2</a>
            <a class="dropdown-item" href="#">Contact 3</a>
        </div>
    </div>
</div>

<div id="contentRef" class="content">
    @yield('content')
</div>

<script>
    function MenuBarClickHandler() {
        let sideNav = document.getElementById('sideNavRef');
        let content = document.getElementById('contentRef');
        if (sideNav.classList.contains("side-nav-open")) {
            sideNav.classList.add("side-nav-close");
            sideNav.classList.remove("side-nav-open");
            content.classList.add("content-expand");
            content.classList.remove("content");
        } else {
            sideNav.classList.remove("side-nav-close");
            sideNav.classList.add("side-nav-open");
            content.classList.remove("content-expand");
            content.classList.add("content");
        }
    }

    document.addEventListener('DOMContentLoaded', function() {
        const sideBarItems = document.querySelectorAll('.side-bar-item');

        sideBarItems.forEach(item => {
            item.addEventListener('click', function() {
                sideBarItems.forEach(el => el.classList.remove('active'));
                this.classList.add('active');
            });
        });
    });
</script>

</body>
</html>
