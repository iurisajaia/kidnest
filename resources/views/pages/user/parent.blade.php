@extends('layouts.auth')
@section('user')
    @include('components.global.title.index', ['title' => __('profile')])
    {{--    <h1>{{$user?->name}} {{$user?->user_data['lastname'] ?? ''}}</h1>--}}
    <div class="flex justify-between gap-[24px] flex-wrap">

        @include('components.profile.avatar-update')
        @include('components.profile.password-update')
        @include('components.profile.user-update')
        @include('components.profile.kids')
    </div>
@endsection
