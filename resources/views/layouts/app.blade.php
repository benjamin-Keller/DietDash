<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ 'DietDash' }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <script src="https://kit.fontawesome.com/94ed29262a.js" crossorigin="anonymous"></script>
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">

    <script
        src="https://code.jquery.com/jquery-3.5.1.min.js"
        integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0="
        crossorigin="anonymous"></script>
    @yield('header')


</head>
<body>
<div id="app">
    <nav class="navbar navbar-expand-md color-white topbar-color shadow-sm">
        <div class="container color-white">
            <a class="navbar-brand color-white" href="{{ url('/') }}">
                {{ 'DietDash' }}
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Left Side Of Navbar -->
                <ul class="navbar-nav mr-auto"></ul>

                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav ml-auto" >
                    <!-- Authentication Links -->
                    @guest
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}" style="color: white;">{{ __('Login') }}</a>
                        </li>
                        @if (Route::has('register'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}" style="color: white;">{{ __('Register') }}</a>
                            </li>
                        @endif
                    @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle color-white" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}"
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
            </div>
        </div>
    </nav>

    <main class="py-4, container-fluid ">

        <div id="sidebar" class="sidebar float-left">
            <div class="text-center">
                <a href="{{ route('home') }}"><img src="{{ asset('img/logo.png') }}" class="w-50" alt="Logo"></a>

                <h5>{{ Auth::user()->name }}</h5>
            </div>
            <div class="item-container">
                <a href="{{ route('home') }}">
                    <h6 class="menu-item"><i class="fas fa-tachometer-alt"></i> Dashboard</h6>
                </a>
                <a href="{{ route('patients.index') }}">
                    <h6 class="menu-item"><i class="fas fa-users"></i> Patients</h6>
                </a>
                <a href="{{ route('calculator.index') }}">
                    <h6 class="menu-item"><i class="fas fa-calculator"></i> Calculations</h6>
                </a>
                <a href="{{ route('bookings.index') }}">
                    <h6 class="menu-item"><i class="fas fa-calendar-alt"></i> Bookings</h6>
                </a>
                <a href="{{ route('payments.index') }}">
                    <h6 class="menu-item"><i class="fas fa-credit-card"></i> Payments</h6>
                </a>
                <hr />
                <a href="{{ route('help.index') }}">
                    <h6 class="menu-item"><i class="fa fa-info-circle" aria-hidden="true"></i> Help</h6>
                </a>
                <a href="{{ route('logout') }}"
                   onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">
                    <h6 class="menu-item"><i class="fa fa-sign-out"></i> {{ __('Logout') }}</h6>
                </a>
            </div>
        </div>
        <br />
        <div class="content ">
            @yield('content')
        </div>
    </main>
</div>

<!-- Scripts -->
<script src="{{ asset('js/app.js') }}" defer></script>
@yield('javascript')

</body>
</html>
