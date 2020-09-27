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
                                <a href="{{ route('reports.display', $patient->id) }}" class="btn btn-purple btn-m ml-2 inverted" style="text-decoration: none; color: white;">Reports</a>
                                <a href="{{ route('patients.index') }}" class="btn btn-purple btn-m inverted" style="text-decoration: none; color: white;">Back</a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    @csrf
                    <h4>General Information</h4>
                        <div class="form-group">
                            <label>First Name</label>
                            <input type="text" class="form-control" name="FirstName" value="{{$patient->FirstName}}" readonly>
                        </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
