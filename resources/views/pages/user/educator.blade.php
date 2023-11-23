@extends('layouts.auth')
@section('user')
    @include('components.global.title.index', ['title' => __('profile')])
    <div class="flex justify-between gap-[24px] flex-wrap mt-5">
        <div class="md:w-5/12">
            @include('components.profile.educator.avatar-update')
        </div>
        <div class="md:w-6/12">
            @include('components.profile.educator.password-update')
            @include('components.profile.educator.user-update')
        </div>
    </div>
@endsection
