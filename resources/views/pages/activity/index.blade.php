@extends('layouts.auth')
@section('user')
    @role(['educator'])
        @include('components.activity.educator')
    @endrole
    @role(['parent'])
        @include('components.activity.parent')
    @endrole
    @role(['kindergarten'])
        @include('components.activity.kindergarten')
        @include('components.activity.educator')
    @endrole

@endsection
