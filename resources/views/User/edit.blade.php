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
                    @csrf
                    <h4>General Information</h4>
                    <form method="post" action="{{action('ProfilesController@update', Auth::user()->id)}}" autocomplete="off">
                        @csrf
                        <input type="hidden" name="_method" value="PATCH" />

                        <div class="form-group">
                            {{ __('Name:') }}
                            <input type="text" class="form-control" name="Name" value="{{ Auth::user()->name }}" placeholder="Enter Name">
                        </div>
                        <div class="form-group">
                            {{ __('Email Address:') }}
                            <input type="text" class="form-control" name="Email" value="{{ Auth::user()->email }}" placeholder="Enter Email">
                        </div>

                        <div class="form-group">
                            <input type="submit" class="btn btn-purple inverted" value="Edit">
                        </div>

                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
