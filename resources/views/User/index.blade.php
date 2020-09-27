@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body container-fluid ">
                    <div class="row align-middle">
                        <div class="col-sm">
                            <h3 class="float-left">{{ __('Profile') }}</h3>
                        </div>
                        <div class="col-sm">
                            <div class="float-right">
                                <a href="{{ route('profile.edit', Auth::user()->id) }}" class="btn btn-purple btn-m inverted" style="text-decoration: none; color: white;">Edit</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body container-fluid mb-3">
                    <div class="row align-middle">
                        <div class="col-sm text-center">
                            <img class="img-circle img-bordered img-thumbnail inverted" src="{{ asset('img/logo.png') }}" oncontextmenu="return false" ondragstart="return false">
                        </div>
                        <div class="col-md">
                            <div class="">
                                <div class="text-lg text-bold">Full Name: </div> {{ Auth::user()->name }} <br />
                                <div class="text-lg text-bold">Email: </div> {{ Auth::user()->email }} <br />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection
