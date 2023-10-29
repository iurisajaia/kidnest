@extends('layouts.auth')
@section('user')
        @include('components.global.title.index', ['title' => __('profile')])

        <div class="flex justify-between gap-[24px] flex-wrap">

            @include('components.profile.avatar-update')
            @include('components.profile.password-update')
            @include('components.profile.user-update')
            @include('components.profile.registration-url')
            @include('components.profile.send-message')
            @include('components.profile.add-manager')
        </div>
@endsection