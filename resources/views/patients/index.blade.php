@extends('layouts.admin')

@section('scripts')
    $(document).ready(function(){ $('#patients').DataTable({"lengthMenu": [ 5, 10, 25, 50, 75, 100 ]}); });

@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header container-fluid">
                    <div class="row align-middle">
                        <div class="col-sm">
                            <h3 class="float-left">{{ __('Patients') }}</h3>
                        </div>
                        <div class="col-sm">
                            <div class="float-right">
                                <a href="{{ route('patients.create') }}" class="btn btn-purple btn-m ml-2" style="text-decoration: none; color: white;">Add Patient</a>
                                <a href="{{ route('patients.deleted') }}" class="btn btn-danger btn-m " style="text-decoration: none; color: white;"><i class="far fa-trash-alt"></i></a>
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
                                table-responsive-lg " id="patients">
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
                                        <td><a alt="Edit" href="{{url('/patients/edit/'.$row->id)}}"><i class="far fa-edit"></i></a>
                                            <a alt="Report" href="{{url('/reports/'.$row->id)}}" style="color: #00b248;"><i class="fas fa-book"></i></a>
                                            <a alt="Delete" href="{{url('/patients/delete/'.$row->id)}}" style="color: #ff1744;"><i class="far fa-trash-alt"></i></a></td>
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

@section('sidebar')
    <h5>Help</h5>
    <hr />
    <h6>Adding</h6>
    <p>To add a Patient, go to the Patients page and click the Add button. After filling in the required information, click the Submit button.
        <br />The Patient is now added and will be shown on the Patients page and on the Dashboard.</p>
    <h6>Editing</h6>
    <p>To edit a Patient, go to the Patients page (or from the Dashboard) click the blue button in the same row as the Patient you want to edit. There you will be able to change the information you need, click Submit once you are done.
        <br />The Patient is now edited and the new information will now be shown on the Patients page and on the Dashboard.</p>
    <h6>Deleting</h6>
    <p>To delete a Patient, go to the Patients page (or from the Dashboard) click the red button (trash can) in the same row as the Patient you want to delete.
        <br />The Patient is now deleted, you can undelete a patient by clicking on the red button next to the Add patient button, then clicking on the red restore button in the same row as the Patient you want to restore.</p>
    <br />
@endsection

