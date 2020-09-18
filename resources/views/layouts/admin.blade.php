<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Favicon -->
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('/apple-touch-icon.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('/favicon-16x16.png') }}">
    <link rel="manifest" href="{{ asset('/site.webmanifest') }}">

    <title>{{ config('app.name') }}</title>

    <!-- Dark-Mode -->
    <link href="{{ asset('css/dark-converter.css') }}" rel="stylesheet">

    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="{{ asset('bower_components/admin-lte/plugins/fontawesome-free/css/all.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('bower_components/admin-lte/dist/css/adminlte.min.css') }}">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <script src="{{ asset('bower_components/admin-lte/plugins/jquery/jquery.min.js') }}"></script>

    <!-- Chart.js -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>

    <!-- fullCalendar -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js" integrity="sha256-4iQZ6BVL4qNKlQ27TExEhBN1HFPvAvAMbFavKKosSWQ=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.js"></script>

    <style>
        .btn-purple, .btn-purple:active, .btn-purple:visited {
            background-color: #800080;
            color: white;
        }
        .btn-purple:hover {
            background-color: #ac00ac;
            color: white;
        }
        .text-purple {
            color: #800080 !important;
        }
        .link-purple {
            color: #800080 !important;
        }
        .link-purple:hover {
            color: #ac00ac !important;
        }
        .pagination > li > a, .pagination > li > span{ color: #800080; }
        .pagination > li.active > a, .pagination > li.active > span{ background-color: #800080 !important; border-color: #800080 !important; }

        .pagination_invert > li > a, .pagination_invert > li > span{ filter: invert(1) hue-rotate(180deg); }
        .pagination_invert > li.active > a, .pagination_invert > li.active > span{ filter: invert(1) hue-rotate(180deg); }



    </style>
    <!-- DataTables designed and created by SpryMedia Ltd. Available from https://datatables.net/ -->
    <script src="{{ asset('bower_components/admin-lte/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <link rel="stylesheet" type="text/css" href="{{ asset('bower_components/admin-lte/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}"/>
    <script>
        @yield('scripts')
    </script>
</head>

<body class="hold-transition sidebar-mini">
<div class="wrapper">

    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
            </li>
        </ul>


        <!-- Right navbar links -->
        <ul class="navbar-nav ml-auto">
            <!-- Notifications Dropdown Menu -->
            <li class="nav-item dropdown">
                <a id="navbarDropdown" class="nav-link dropdown-toggle color-white a-none" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                    {{ Auth::user()->name }} <span class="caret"></span>
                </a>

                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item">
                        <div class="custom-control custom-switch" >
                            <input type="checkbox" class="custom-control-input" id="darkmode-Switch"
                                   onclick="document.documentElement.classList.toggle('dark-mode');
                                            document.querySelectorAll('.inverted').forEach((result) => result.classList.toggle('invert'));
                                            document.querySelectorAll('.pagination').forEach((result) => result.classList.toggle('pagination_invert'));">
                            <label class="custom-control-label" for="darkmode-Switch">Darkmode</label>
                        </div>
                    </a>
                    <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </div>
            </li>
            <li class="nav-item" >
                <a class="nav-link link-purple inverted" data-widget="control-sidebar" data-slide="true" href="#" role="button">
                    <i class="fas fa-question-circle"></i></a>
            </li>
        </ul>
    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4 inverted" style="background-color: #400040">
        <!-- Brand Logo -->
        <a href="{{ route('home') }}" class="brand-link">
            <img src="{{ asset('img/logo.png') }}" alt="DietDash Logo" class="brand-image img-circle elevation-3"
                 style="opacity: .8">
            <span class="brand-text font-weight-light">DietDash</span>
        </a>

        <!-- Sidebar -->
        <div class="sidebar">
            <!-- Sidebar Menu -->
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column"  data-widget="treeview" role="menu" data-accordion="false">
                    <!-- Add icons to the links using the .nav-icon class
                         with font-awesome or any other icon font library -->
                    <li class="nav-item">
                        <a href="{{ route('home') }}" class="nav-link">
                            <i class="nav-icon fas fa-tachometer-alt"></i>
                            <p>Dashboard</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('patients.index') }}" class="nav-link">
                            <i class="nav-icon fas fa-users"></i>
                            <p>Patients</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('calculator.index') }}" class="nav-link">
                            <i class="nav-icon fas fa-calculator"></i>
                            <p>Calculate</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('bookings.index') }}" class="nav-link">
                            <i class="nav-icon fas fa-calendar-alt"></i>
                            <p>Bookings</p>
                        </a>
                    </li>
                </ul>
            </nav>
            <!-- /.sidebar-menu -->
        </div>
        <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-12">
                        <h1 class="m-0 text-dark">@yield('header')</h1>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <div class="content pb-5">
            <div class="container-fluid">
                @yield('content')
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    <!-- Control Sidebar -->

    <aside class="control-sidebar control-sidebar-dark" style="overflow: auto">
        <!-- Control sidebar content goes here -->
        <div class="p-3">
            @yield('sidebar')

        </div>
    </aside>
    <!-- /.control-sidebar -->

    <!-- Main Footer -->
    <footer class="main-footer">
        <!-- To the right -->
        <div class="float-right d-none d-sm-inline">
        </div>
        <!-- Default to the left -->
        <strong>Copyright &copy; {{ date('yy') }} <a href="http://netiquette.co.za" class="text-purple inverted">Netiquette</a>.</strong> All rights reserved.
    </footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->
<!-- jQuery -->
<script src="{{ asset('bower_components/admin-lte/plugins/jquery/jquery.min.js') }}"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset('bower_components/admin-lte/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('bower_components/admin-lte/dist/js/adminlte.min.js') }}"></script>
<!-- DataTables -->
<script src="{{ asset('bower_components/admin-lte/plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('bower_components/admin-lte/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>

<script>
    $(function(){
        var checkBox = document.getElementById("darkmode-Switch");
        var test = localStorage.input === 'true'? true: false;
        $('#darkmode-Switch').prop('checked', test || false);

        if (checkBox.checked == true){
            document.documentElement.classList.toggle('dark-mode');
            document.querySelectorAll('.inverted').forEach((result) => result.classList.toggle('invert'));
            document.querySelectorAll('.pagination').forEach((result) => result.classList.toggle('pagination_invert'));


        } else {

            var style = document.createElement('style');
            style.innerHTML =
                '.pagination > li > a, .pagination > li > span{ color: #800080; }' +
                '.pagination > li.active > a, .pagination > li.active > span{ background-color: #800080 !important;border-color: #800080 !important; }' +
                '.dark-mode {filter: invert(1) hue-rotate(180deg);}' +
                '.invert {filter: invert(1) hue-rotate(180deg);}';

            // Get the first script tag
            var ref = document.querySelector('script');

            // Insert our new styles before the first script tag
            ref.parentNode.insertBefore(style, ref);
        }
    });

    $('#darkmode-Switch').on('change', function() {
        localStorage.input = $(this).is(':checked');
        console.log($(this).is(':checked'));
    });
</script>
</body>
</html>
