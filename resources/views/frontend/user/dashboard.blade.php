@extends('frontend.layouts.user')
@section('content')
    {{-- Recent Transactions --}}
    @include('frontend.user.include.__recent_transaction')
@endsection
