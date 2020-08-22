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
                            <h3 class="float-left">{{ __('Payments') }}</h3>
                        </div>
                        <div class="col-sm">
                            <div class="float-right">
                                <a href="{{ route('payments.create') }}" class="btn btn-primary btn-m ml-2" style="text-decoration: none; color: white;">Add Payment</a>
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
                                    <th>{{ 'Full Name' }}</th>
                                    <th>{{ 'Amount' }}</th>
                                    <th>{{ 'Sub Total' }}</th>
                                    <th>{{ 'Total' }}</th>
                                    <th>{{ 'Date' }}</th>
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

        fetch_payments_data();

        function fetch_payments_data(query = '')
        {
            $.ajax({
                url:"{{ route('payments.action') }}",
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
            fetch_payments_data(query);
        });
    });
</script>
@endsection

