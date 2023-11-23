@extends('layouts.auth')
@section('user')
        @include('components.global.title.index', ['title' => __('profile')])

        <div class="flex justify-between gap-[24px] flex-wrap">

            <div class="flex items-center justify-end w-full mt-[24px] mb-[24px]">
                <button
                    class="outline-0 font-bold rounded-lg border text-[#fff] flex items-center justify-center bg-black py-[6px] px-[12px]">
                    <img class="w-[20px] h-[20px] mr-[10px]" src="{{asset('assets/images/global/plus.svg')}}"/>
                    {{__('add.manager')}}
                </button>
            </div>

            @include('components.profile.kindergarten.avatar-update')
            @include('components.profile.kindergarten.password-update')
            <div class="flex justify-between gap-[24px] w-full">
                @include('components.profile.kindergarten.send-message')
                <div class="w-full md:w-6/12">
                    @include('components.profile.kindergarten.registration-url')
                    @include('components.profile.kindergarten.user-update')
                </div>
            </div>


{{--            @include('components.profile.add-manager')--}}
        </div>
@endsection
