@extends('layouts.app')

@section('scripts')
    $(document).ready(function(){ $('#patients').DataTable(); });
@endsection


@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header container-fluid">
                    <div class="row align-middle">
                        <div class="col-sm">
                            <h3 class="float-left">{{ __('Deleted Patients') }}</h3>
                        </div>
                        <div class="col-sm">
                            <div class="float-right">
                                <a href="{{ route('patients.index') }}" class="btn btn-primary btn-m ml-2" style="text-decoration: none; color: white;"><i class="fas fa-arrow-left"></i></a>
                            </div>
                            <div class="float-right">
                                <input class="form-control" type="text" id="search" placeholder="Search">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card-body container-fluid">
                    @include('inc.messages')

                    <!-- Patient table -->
                        <div class="row">
                            <div class="col-md-12">
                                <table class="table table-bordered table-striped
                                    table-responsive-sm
                                    table-responsive-md
                                    table-responsive-lg" id="patients">
                                    <thead>
                                    <tr>
                                        <th>{{ 'First Name' }}</th>
                                        <th>{{ 'Last Name' }}</th>
                                        <th>{{ 'Gender' }}</th>
                                        <th>{{ 'ID Number' }}</th>
                                        <th>{{ 'Phone Number' }}</th>
                                        <th>{{ 'Email Address' }}</th>
                                        <th>{{ 'Edit' }}</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($patients as $row)
                                        <tr>
                                            <td>{{$row->FirstName}}</td>
                                            <td>{{$row->LastName}}</td>
                                            <td>{{$row->Gender}}</td>
                                            <td>{{$row->IdNumber}}</td>
                                            <td>{{$row->PhoneNumber}}</td>
                                            <td>{{$row->Email}}</td>
                                            <td><a alt="Delete" href="{{ url('/patients/restore/'.$row->id) }}" style="color: #ff1744;"><i class="fas fa-trash-restore"></i></a></td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>

                            </div>
                        </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

