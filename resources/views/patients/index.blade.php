@extends('layouts.app')

@section('header')

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
                                <a href="{{ route('patients.create') }}" class="btn btn-primary btn-m ml-2" style="text-decoration: none; color: white;">Add Patient</a>
                                <a href="{{ route('patients.deleted') }}" class="btn btn-danger btn-m " style="text-decoration: none; color: white;"><i class="far fa-trash-alt"></i></a>
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
                            <table class="table table-bordered table-striped">
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

                                </tbody>
                            </table>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function(){

        fetch_customer_data();

        function fetch_customer_data(query = '')
        {
            $.ajax({
                url:"{{ route('patients.action') }}",
                method:'GET',
                data:{query:query},
                dataType:'json',
                success:function(data)
                {
                    $('tbody').html(data.table_data);
                }
            })
        }

        $(document).on('keyup', '#search', function(){
            var query = $(this).val();
            fetch_customer_data(query);
        });
    });
</script>
@endsection

