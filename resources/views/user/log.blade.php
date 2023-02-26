@extends('frontend.layouts.user')
@section('content')
    <!-- end page title -->




    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                    <h4 class="card-title">All Investments Log</h4>
                    <!--description here -->
                    <p class="card-title-desc">
                    </p>

                    <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap"
                        style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>DESCRIPTION</th>
                                <th>TRANSACTIONS ID</th>
                                <th>TYPE</th>
                                <th>AMOUNT</th>
                                <th>STATUS</th> 
                                <th>METHOD</th>
                            </tr>
                        </thead>


                        <tbody>
                            @foreach($transactdata as $trans)
                            <tr>
                                <td>{{ $trans->id }}</td>
                                <td>Deposit With {{ $trans->method }}</td>
                                <td>TRX{{ \Carbon\Carbon::parse($trans->created_at)->format('time') }}{{ $trans->id }}</td>
                                <td>{{ \Carbon\Carbon::parse($trans->created_at)->format('d/m/Y') }}</td>
                                <td>{{ $trans->invest_amount }}</td>
                                <td>{{ $trans->type }}</td>
                                <td>{{ $trans->method }}</td>
                            </tr>
                            @endforeach
                                                       </tbody>
                    </table>
                </div>
            </div>
        </div> <!-- end col -->
    </div> <!-- end row -->

    </div>

    </div>
@endsection
