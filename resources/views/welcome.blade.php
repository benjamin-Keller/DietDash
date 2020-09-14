@extends('layouts.landing')

@section('body')
    <!-- Masthead -->
    <header class="masthead text-white text-center" oncontextmenu="return false" ondragstart="return false">
        <div class="overlay"><img style="height: 100%; width: 100%; object-fit: cover" src="{{asset('img/berries.jpg')}}"></div>
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
    <section class="showcase" >
        <div class="container-fluid p-0">
            <div class="row no-gutters">

                <div class="col-lg-6 order-lg-2 text-white showcase-img" oncontextmenu="return false" ondragstart="return false"><img style="height: 100%; width: 100%; object-fit: cover;" src="{{asset('img/dashboard.jpg')}}"></div>
                <div class="col-lg-6 order-lg-1 my-auto showcase-text">
                    <h2>Up to Date Information</h2>
                    <p class="lead mb-0">Keep up to date with all the information you need to run your own Private Practice!</p>
                </div>
            </div>
            <div class="row no-gutters">
                <div class="col-lg-6 text-white showcase-img" oncontextmenu="return false" ondragstart="return false"><img style="height: 100%; width: 100%; object-fit: cover;" src="{{asset('img/bookings.jpg')}}"></div>
                <div class="col-lg-6 my-auto showcase-text">
                    <h2>Keep track of Bookings</h2>
                    <p class="lead mb-0">See past, current and future booking events to easily plan your week for your Client!</p>
                </div>
            </div>
            <div class="row no-gutters">
                <div class="col-lg-6 order-lg-2 text-white showcase-img" oncontextmenu="return false" ondragstart="return false"><img style="height: 100%; width: 100%; object-fit: cover;" src="{{asset('img/reports.jpg')}}"></div>
                <div class="col-lg-6 order-lg-1 my-auto showcase-text">
                    <h2>Run Calculations</h2>
                    <p class="lead mb-0">Run calculations to keep current information for your patient without any human-error in the calculations!</p>
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

                </div>
                <div class="col-lg-4">
                    <div class="testimonial-item mx-auto mb-5 mb-lg-0">
                        <h5>Currently no Testimonials</h5>

                    </div>
                    {{-- <div class="testimonial-item mx-auto mb-5 mb-lg-0">
                         <img class="img-fluid rounded-circle mb-3" src="img/testimonials-2.jpg" alt="">
                         <h5>Inge J.</h5>
                         <h6>(Student Dietitian)</h6>
                         <p class="font-weight-light mb-0">"Bootstrap is amazing. I've been using it to create lots of super nice landing pages."</p>
                     </div>--}}
                </div>
                <div class="col-lg-4">

                </div>
            </div>
        </div>
    </section>

    <!-- Pricing cards -->
    @include('inc/pricing')

    <!-- Call to Action -->
    <section class="call-to-action text-white text-center">
        <div class="overlay"><img style="height: 100%; width: 100%; object-fit: cover;" src="{{asset('img/footer.jpg')}}" oncontextmenu="return false" ondragstart="return false" /></div>
        <div class="container">
            <div class="row">
                <div class="col-xl-9 mx-auto">
                    <h2 class="mb-4" style="color:black;">Ready to start your Private Practise?<br />Sign up now!</h2>
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
@endsection
