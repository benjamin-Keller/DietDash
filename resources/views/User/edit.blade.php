@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header container-fluid">
                    <div class="row align-middle">
                        <div class="col-sm">
                            <h3 class="float-left">{{ __('Reports') }}</h3>
                        </div>
                        <div class="col-sm">
                            <div class="float-right">
                                <a href="{{ route('profile.index') }}" class="btn btn-purple btn-m inverted" style="text-decoration: none; color: white;">Back</a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    @include('inc.messages')
                    <h4>General Information</h4>
                    <form method="post" action="{{ route('profile.update')}} " autocomplete="off">
                        @csrf
                        <input type="hidden" name="_method" value="PATCH" />

                        <div class="form-group">
                            {{ __('Name:') }}
                            <input type="text" class="form-control" name="name" value="{{ Auth::user()->name }}" placeholder="Enter Full Name">
                        </div>
                        <div class="form-group">
                            {{ __('Email Address:') }}
                            <input type="text" class="form-control" name="email" value="{{ Auth::user()->email }}" placeholder="Enter Email">
                        </div>
                        <div class="form-group">
                            {{ __('Profile Picture:') }}
                            <input type="text" class="form-control" name="profile_picture" value="{{ Auth::user()->profile_picture }}" placeholder="Enter Profile Picture link">
                        </div>

                        <div class="form-group">
                            <button class="btn btn-purple inverted" type="submit">Safe info</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
