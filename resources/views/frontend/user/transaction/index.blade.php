@extends('frontend.layouts.user')
@section('content')
    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">{{ Auth::user()->role }} Dashboard</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">M30 Investments</a></li>
                                <li class="breadcrumb-item active">Dashboard</li>
                            </ol>
                        </div>

                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">

                            <h4 class="card-title">All Transactions</h4>
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
