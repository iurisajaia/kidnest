@extends('layouts.auth')
@section('user')
    @include('components.global.title.index', ['title' => __('profile')])

    <h1>{{$user?->name}} {{$user?->user_data['lastname'] ?? ''}}</h1>
@endsection
