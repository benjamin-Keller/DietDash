<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=yes">
    @include('inc/meta')

    <title>{{ config('app.name') }}</title>



    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template -->
    <script src="https://kit.fontawesome.com/94ed29262a.js" crossorigin="anonymous"></script>
    <link href="vendor/simple-line-icons/css/simple-line-icons.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">

    <!-- Custom styles for this template -->
    <link href="css/landing-page.min.css" rel="stylesheet">

    <style>
        section.pricing {}

        .pricing .card {
            border: none;
            border-radius: 1rem;
            transition: all 0.2s;
            box-shadow: 0 0.5rem 1rem 0 rgba(0, 0, 0, 0.1);
        }

        .pricing hr {
            margin: 1.5rem 0;
        }

        .pricing .card-title {
            margin: 0.5rem 0;
            font-size: 0.9rem;
            letter-spacing: .1rem;
            font-weight: bold;
        }

        .pricing .card-price {
            font-size: 3rem;
            margin: 0;
        }

        .pricing .card-price .period {
            font-size: 0.8rem;
        }

        .pricing ul li {
            margin-bottom: 1rem;
        }

        .pricing .text-muted {
            opacity: 0.7;
        }

        .pricing .btn {
            font-size: 80%;
            border-radius: 5rem;
            letter-spacing: .1rem;
            font-weight: bold;
            padding: 1rem;
            opacity: 0.7;
            transition: all 0.2s;
        }

        /* Hover Effects on Card */

        @media (min-width: 992px) {
            .pricing .card:hover {
                margin-top: -.25rem;
                margin-bottom: .25rem;
                box-shadow: 0 0.5rem 1rem 0 rgba(0, 0, 0, 0.3);
            }
            .pricing .card:hover .btn {
                opacity: 1;
            }
        }

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
            text-decoration-color: #800080 !important;
        }

        /* unvisited link */
        .text-purple-link:link {
            color: #800080;
        }

        /* visited link */
        .text-purple-link:visited {
            color: #800080;
        }

        /* mouse over link */
        .text-purple-link:hover {
            color: #800080;
        }

        /* selected link */
        .text-purple-link:active {
            color: #800080;
        }
    </style>

</head>
<body>

<!-- Navigation -->
<nav class="navbar navbar-light bg-light static-top">
    <div class="container">
        <a class="navbar-brand text-purple" href="{{ route('welcome') }}">DietDash</a>
        @if (Route::has('login'))
            <div class="top-right links">
                @auth
                    <a class="btn btn-purple" href="{{ url('/home') }}">Dashboard</a>
                @else
                    <a class="btn btn-purple" href="{{ route('login') }}">Login</a>
                @endauth
            </div>
        @endif
    </div>
</nav>

@yield('body')

<!-- Footer -->
<footer class="footer bg-light">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 h-100 text-center text-lg-left my-auto ">
                <ul class="list-inline mb-2">
                    <li class="list-inline-item">
                        <a href="{{ route('login') }}" class="text-purple-link">Login</a>
                    </li>
                    <li class="list-inline-item">&sdot;</li>
                    <li class="list-inline-item">
                        <a href="{{ route('register') }}" class="text-purple-link">Register</a>
                    </li>
                    {{--<li class="list-inline-item">&sdot;</li>
                    <li class="list-inline-item">
                        <a href="#">Terms of Use</a>
                    </li>
                    <li class="list-inline-item">&sdot;</li>
                    <li class="list-inline-item">
                        <a href="#">Privacy Policy</a>
                    </li>--}}
                </ul>
                <p class="text-muted small mb-4 mb-lg-0">&copy; DietDash. All Rights Reserved. </p>
            </div>
            <div class="col-lg-6 h-100 text-center text-lg-right my-auto">
                <ul class="list-inline mb-0">
                    <li class="list-inline-item mr-3">
                        Created by <a href="http://netiquette.co.za/" target="_blank" class="text-purple-link">Netiquette</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</footer>

<!-- Bootstrap core JavaScript -->
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>
</html>
