@extends('layouts.auth')
@section('user')
        @include('components.invoice.index.header.header')
        @include('components.invoice.index.stat.stat')
        @include('components.invoice.index.invoiceTable.invoiceTable')
    {{-- <img src="{{ asset('assets/images/global/avatar.svg') }}" /> --}}
@endsection
