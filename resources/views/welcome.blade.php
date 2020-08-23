<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=yes">
        <meta name="description" content="Dashboard to manage being a Dietitian">
        <meta name="author" content="Netiquette">

        <title>DietDash</title>

        <!-- Favicon -->
        <link rel="apple-touch-icon" sizes="180x180" href="img/apple-touch-icon.png">
        <link rel="icon" type="image/png" sizes="32x32" href="img/favicon-32x32.png">
        <link rel="icon" type="image/png" sizes="16x16" href="img/favicon-16x16.png">
        <link rel="manifest" href="img/site.webmanifest">

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

            .btn-purple, .btn-purple:hover, .btn-purple:active, .btn-purple:visited {
                background-color: #800080;
                color: white;
            }
            .text-purple {
                color: #800080 !important;
            }
        </style>

    </head>
    <body>

    <!-- Navigation -->
    <nav class="navbar navbar-light bg-light static-top">
        <div class="container">
            <a class="navbar-brand text-purple" href="#">DietDash</a>
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

    <!-- Masthead -->
    <header class="masthead text-white text-center">
        <div class="overlay"><img style="height: 100%; width: 100%" src="{{asset('img/berries.jpg')}}"></div>
        <div class="container">
            <div class="row">
                <div class="col-xl-9 mx-auto">
                    <h1 class="mb-5 text-purple">An easy way to manage being a Dietitian.</h1>
                </div>
                <div class="col-md-10 col-lg-8 col-xl-7 mx-auto">
                    <form>
                        <div class="form-row">
                            <div style="margin-left: auto; margin-right: auto;">
                                <a href="{{ route('register') }}" class="btn btn-block btn-lg btn-purple">Register now!</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </header>

    <!-- Icons Grid -->
    <section class="features-icons bg-light text-center">
        <div class="container">
            <div class="row">
                <div class="col-lg-4">
                    <div class="features-icons-item mx-auto mb-5 mb-lg-0 mb-lg-3">
                        <div class="features-icons-icon d-flex">
                            <i class="icon-user m-auto text-purple"></i>
                        </div>
                        <h3>Total Clients</h3>
                        <p class="lead mb-0">{{ $users }} registered with DietDash!</p>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="features-icons-item mx-auto mb-0 mb-lg-3">
                        <div class="features-icons-icon d-flex">
                            <i class="icon-calendar m-auto text-purple"></i>
                        </div>
                        <h3>Total Bookings</h3>
                        <p class="lead mb-0">{{ $upcoming }} booking(s) to date!</p>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="features-icons-item mx-auto mb-5 mb-lg-0 mb-lg-3">
                        <div class="features-icons-icon d-flex">
                            <i class="icon-people m-auto text-purple"></i>
                        </div>
                        <h3>Total Patients</h3>
                        <p class="lead mb-0">{{ $patients }} patients helped with DietDash!</p>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- Image Showcases -->
    <section class="showcase">
        <div class="container-fluid p-0">
            <div class="row no-gutters">

                <div class="col-lg-6 order-lg-2 text-white showcase-img" style="background-image: url('{{asset('img/dashboard.jpg')}}');"></div>
                <div class="col-lg-6 order-lg-1 my-auto showcase-text">
                    <h2>Up to Date Information</h2>
                    <p class="lead mb-0">Keep up to date with all the information you need to run your own Private Practice!</p>
                </div>
            </div>
            <div class="row no-gutters">
                <div class="col-lg-6 text-white showcase-img" style="background-image: url('{{asset('img/bookings.jpg')}}');"></div>
                <div class="col-lg-6 my-auto showcase-text">
                    <h2>Updated For Bootstrap 4</h2>
                    <p class="lead mb-0">Newly improved, and full of great utility classes, Bootstrap 4 is leading the way in mobile responsive web development! All of the themes on Start Bootstrap are now using Bootstrap 4!</p>
                </div>
            </div>
            <div class="row no-gutters">
                <div class="col-lg-6 order-lg-2 text-white showcase-img" style="background-image: url('{{asset('img/reports.jpg')}}');"></div>
                <div class="col-lg-6 order-lg-1 my-auto showcase-text">
                    <h2>Easy to Use &amp; Customize</h2>
                    <p class="lead mb-0">Landing Page is just HTML and CSS with a splash of SCSS for users who demand some deeper customization options. Out of the box, just add your content and images, and your new landing page will be ready to go!</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Testimonials -->
    <section class="testimonials text-center bg-light">
        <div class="container">
            <h2 class="mb-5">What people are saying...</h2>
            <div class="row">
                <div class="col-lg-4">
                    <div class="testimonial-item mx-auto mb-5 mb-lg-0">
                        <img class="img-fluid rounded-circle mb-3" src="img/testimonials-1.jpg" alt="">
                        <h5>Margaret E.</h5>
                        <p class="font-weight-light mb-0">"This is fantastic! Thanks so much guys!"</p>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="testimonial-item mx-auto mb-5 mb-lg-0">
                        <img class="img-fluid rounded-circle mb-3" src="img/testimonials-2.jpg" alt="">
                        <h5>Fred S.</h5>
                        <p class="font-weight-light mb-0">"Bootstrap is amazing. I've been using it to create lots of super nice landing pages."</p>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="testimonial-item mx-auto mb-5 mb-lg-0">
                        <img class="img-fluid rounded-circle mb-3" src="img/testimonials-3.jpg" alt="">
                        <h5>Sarah W.</h5>
                        <p class="font-weight-light mb-0">"Thanks so much for making these free resources available to us!"</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="pricing py-5 showcase">
        <div class="container">
            <div class="row">
                <!-- Student Tier -->
                <div class="col-lg-3">
                    <div class="card mb-5 mb-lg-0">
                        <div class="card-body">
                            <h5 class="card-title text-muted text-uppercase text-center">Student</h5>
                            <h6 class="card-price text-center">500<div style="font-size: small; display:inline"> ZAR</div><span class="period"> /year </span></h6><div class="text-center">(with proof)</div>
                            <hr>
                            <ul class="fa-ul">
                                <li><span class="fa-li"><i class="fas fa-check"></i></span>Manage Patients</li>
                                <li><span class="fa-li"><i class="fas fa-check"></i></span>Manage Bookings</li>
                                <li><span class="fa-li"><i class="fas fa-check"></i></span>Patient Reports</li>
                                <li><span class="fa-li"><i class="fas fa-check"></i></span>Patient Calculations</li>
                                <li class="text-muted"><span class="fa-li"><i class="fas fa-times"></i></span>Manage Payments</li>
                                <li class="text-muted"><span class="fa-li"><i class="fas fa-times"></i></span>Create Invoices</li>
                            </ul>
                            <a href="#" class="btn btn-block btn-purple text-uppercase">Purchase</a>
                        </div>
                    </div>
                </div>
                <!-- Basic Tier -->
                <div class="col-lg-3">
                    <div class="card mb-5 mb-lg-0">
                        <div class="card-body">
                            <h5 class="card-title text-muted text-uppercase text-center">Basic</h5>
                            <h6 class="card-price text-center">1500<div style="font-size: small; display:inline"> ZAR</div><span class="period"> /year </span></h6><div class="text-center"><br /></div>
                            <hr>
                            <ul class="fa-ul">
                                <li><span class="fa-li"><i class="fas fa-check"></i></span>Manage Patients</li>
                                <li><span class="fa-li"><i class="fas fa-check"></i></span>Manage Bookings</li>
                                <li><span class="fa-li"><i class="fas fa-check"></i></span>Patient Reports</li>
                                <li class="text-muted"><span class="fa-li"><i class="fas fa-times"></i></span>Patient Calculations</li>
                                <li class="text-muted"><span class="fa-li"><i class="fas fa-times"></i></span>Manage Payments</li>
                                <li class="text-muted"><span class="fa-li"><i class="fas fa-times"></i></span>Create Invoices</li>
                            </ul>
                            <a href="#" class="btn btn-block btn-purple text-uppercase">Purchase</a>
                        </div>
                    </div>
                </div>
                <!-- Plus Tier -->
                <div class="col-lg-3">
                    <div class="card mb-5 mb-lg-0">
                        <div class="card-body">
                            <h5 class="card-title text-muted text-uppercase text-center">Plus</h5>
                            <h6 class="card-price text-center">2200<div style="font-size: small; display:inline"> ZAR</div><span class="period"> /year</span></h6><div class="text-center"><br /></div>
                            <hr>
                            <ul class="fa-ul">
                                <li><span class="fa-li"><i class="fas fa-check"></i></span>Manage Patients</li>
                                <li><span class="fa-li"><i class="fas fa-check"></i></span>Manage Bookings</li>
                                <li><span class="fa-li"><i class="fas fa-check"></i></span>Patient Reports</li>
                                <li><span class="fa-li"><i class="fas fa-check"></i></span>Patient Calculations</li>
                                <li class="text-muted"><span class="fa-li"><i class="fas fa-times"></i></span>Manage Payments</li>
                                <li class="text-muted"><span class="fa-li"><i class="fas fa-times"></i></span>Create Invoices</li>
                            </ul>
                            <a href="#" class="btn btn-block btn-purple text-uppercase">Purchase</a>
                        </div>
                    </div>
                </div>
                <!-- Pro Tier -->
                <div class="col-lg-3">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title text-muted text-uppercase text-center">Pro</h5>
                            <h6 class="card-price text-center">2999<div style="font-size: small; display:inline"> ZAR</div><span class="period"> /year</span></h6><div class="text-center"><br /></div>
                            <hr>
                            <ul class="fa-ul">
                                <li><span class="fa-li"><i class="fas fa-check"></i></span>Manage Patients</li>
                                <li><span class="fa-li"><i class="fas fa-check"></i></span>Manage Bookings</li>
                                <li><span class="fa-li"><i class="fas fa-check"></i></span>Patient Reports</li>
                                <li><span class="fa-li"><i class="fas fa-check"></i></span>Patient Calculations</li>
                                <li><span class="fa-li"><i class="fas fa-check"></i></span>Manage Payments</li>
                                <li><span class="fa-li"><i class="fas fa-check"></i></span>Create Invoices</li>
                            </ul>
                            <a href="#" class="btn btn-block btn-purple text-uppercase">Purchase</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Call to Action -->
    <section class="call-to-action text-white text-center">
        <div class="overlay"><img style="height: 100%; width: 100%" src="{{asset('img/footer.jpg')}}" /></div>
        <div class="container">
            <div class="row">
                <div class="col-xl-9 mx-auto">
                    <h2 class="mb-4" style="color:black;">Ready to start helping your Patients?<br />Sign up now!</h2>
                </div>
                <div class="col-md-10 col-lg-8 col-xl-7 mx-auto">
                    <form>
                        <div class="form-row">
                            <div style="margin-left: auto; margin-right: auto;">
                                <a href="{{ route('register') }}" class="btn btn-block btn-lg btn-purple">Register!</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="footer bg-light">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 h-100 text-center text-lg-left my-auto">
                    <ul class="list-inline mb-2">
                        <li class="list-inline-item">
                            <a href="#">About</a>
                        </li>
                        <li class="list-inline-item">&sdot;</li>
                        <li class="list-inline-item">
                            <a href="#">Contact</a>
                        </li>
                        <li class="list-inline-item">&sdot;</li>
                        <li class="list-inline-item">
                            <a href="#">Terms of Use</a>
                        </li>
                        <li class="list-inline-item">&sdot;</li>
                        <li class="list-inline-item">
                            <a href="#">Privacy Policy</a>
                        </li>
                    </ul>
                    <p class="text-muted small mb-4 mb-lg-0">&copy; DietDash. All Rights Reserved. </p>
                </div>
                <div class="col-lg-6 h-100 text-center text-lg-right my-auto">
                    <ul class="list-inline mb-0">
                        <li class="list-inline-item mr-3">
                            Created by <a href="http://netiquette.co.za/" target="_blank">Netiquette</a>
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
