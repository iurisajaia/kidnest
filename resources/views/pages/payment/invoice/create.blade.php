@extends('layouts.auth')
@section('user')

    @include('components.global.breadcrumbs.index')
    <div class="mt-[68px] mb-[24px] flex">
        <form action="{{ route('payment.invoice.store') }}" method="POST" class="flex-grow">
            @csrf
            <button>Create</button>
        </form>
        @include('components.invoice.create.fromto.from')
        @include('components.invoice.create.fromto.to')
    </div>
    @include('components.invoice.create.date.date')
    @include('components.invoice.create.details.details')

@endsection
