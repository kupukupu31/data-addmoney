@extends('frontend.layouts.user')
@section('content')
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0">{{ Auth::user()->role }} Dashboard</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">M30 Investments</a></li>
                        <li class="breadcrumb-item active">Add Investment</li>
                    </ol>
                </div>

            </div>
        </div>
    </div>
    <!-- end page title -->
    @yield('deposit_content')
@endsection
