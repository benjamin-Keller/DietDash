@extends('layouts.app')

@section('header')

@endsection

@section('scripts')
    $(document).ready(function(){ $('#payments').DataTable(); });
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header container-fluid">
                    <div class="row align-middle">
                        <div class="col-sm">
                            <h3 class="float-left">{{ __('Payments') }}</h3>
                        </div>
                        <div class="col-sm">
                            <div class="float-right">
                                <a href="{{ route('payments.create') }}" class="btn btn-primary btn-m ml-2" style="text-decoration: none; color: white;">Add Payment</a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card-body container-fluid">
                    @include('inc.messages')

                    <!-- Patient table -->
                    <div class="row">
                        <div class="col-md-12">
                            <table class="table table-bordered table-striped" id="payments">
                                <thead>
                                <tr>
                                    <th>{{ 'Full Name' }}</th>
                                    <th>{{ 'Amount' }}</th>
                                    <th>{{ 'Sub Total' }}</th>
                                    <th>{{ 'Total' }}</th>
                                    <th>{{ 'Date' }}</th>
                                    <th>{{ 'Edit' }}</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @foreach($payments as $row)
                                        <tr>
                                            <td>{{$row->patient_name}}</td>
                                            <td>{{$row->amount}}</td>
                                            <td>{{$row->sub_total}}</td>
                                            <td>{{$row->total}}</td>
                                            <td>{{$row->date}}</td>
                                            <td><a alt="Report" href="{{url('/payments/'.$row->id.'/export')}}" style="color: #00b248;"><i class="fas fa-file-pdf"></i></a></td>
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

