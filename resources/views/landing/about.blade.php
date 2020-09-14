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
