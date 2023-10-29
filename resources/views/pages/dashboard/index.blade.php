@extends('layouts.auth')
@section('user')
    @include('components.global.title.index', ['title' => 'ანალიტიკა'])

    <div class="grid grid-cols-1 gap-4 mt-4 md:grid-cols-2 md:gap-6 xl:grid-cols-4 2xl:gap-7.5">
        <!-- Card Item Start -->
        <div class="rounded-sm border border-stroke bg-white py-6 px-7.5 shadow-default dark:border-strokedark dark:bg-boxdark">
            <div class="flex h-11.5 w-11.5 items-center justify-center rounded-full bg-meta-2 dark:bg-meta-4">
                <img src="{{asset('assets/images/dashboard/branch.png')}}" />
            </div>

            <div class="mt-4 text-center">
                    <h4 class="text-title-md font-bold text-black">
                        {{$branches}}
                    </h4>
                    <span class="text-sm font-medium">{{__('branches')}}</span>
            </div>
        </div>
        <!-- Card Item End -->

        <!-- Card Item Start -->
        <div class="rounded-sm border border-stroke bg-white py-6 px-7.5 shadow-default dark:border-strokedark dark:bg-boxdark">
            <div class="flex h-11.5 w-11.5 items-center justify-center rounded-full bg-meta-2 dark:bg-meta-4">
                <img src="{{asset('assets/images/dashboard/group.png')}}" />
            </div>

            <div class="mt-4 text-center">
                <h4 class="text-title-md font-bold text-black">
                    {{$groups}}
                </h4>
                <span class="text-sm font-medium">{{__('groups')}}</span>
            </div>
        </div>
        <!-- Card Item End -->

        <!-- Card Item Start -->
        <div class="rounded-sm border border-stroke bg-white py-6 px-7.5 shadow-default dark:border-strokedark dark:bg-boxdark">
            <div class="flex h-11.5 w-11.5 items-center justify-center rounded-full bg-meta-2 dark:bg-meta-4">
                <img src="{{asset('assets/images/dashboard/kids.png')}}" />
            </div>

            <div class="mt-4 text-center">
                    <h4 class="text-title-md font-bold text-black">
                        {{$kids}}
                    </h4>
                    <span class="text-sm font-medium">{{__('kids')}}</span>
            </div>
        </div>
        <!-- Card Item End -->

        <!-- Card Item Start -->
        <div class="rounded-sm border border-stroke bg-white py-6 px-7.5 shadow-default dark:border-strokedark dark:bg-boxdark">
            <div class="flex h-11.5 w-11.5 items-center justify-center rounded-full bg-meta-2 dark:bg-meta-4">
                <img src="{{asset('assets/images/dashboard/staff.png')}}" />
            </div>

            <div class="mt-4  text-center">
                    <h4 class="text-title-md text-center font-bold text-black">
                        {{$staff}}
                    </h4>
                    <span class="text-sm text-center font-medium">{{__('staff')}}</span>
            </div>
        </div>
        <!-- Card Item End -->

        <!-- Card Item Start -->
        <div class="rounded-sm border border-stroke bg-white py-6 px-7.5 shadow-default dark:border-strokedark dark:bg-boxdark">
            <div class="flex h-11.5 w-11.5 items-center justify-center rounded-full bg-meta-2 dark:bg-meta-4">
                <img src="{{asset('assets/images/dashboard/parents.png')}}" />
            </div>

            <div class="mt-4  text-center">
                <h4 class="text-title-md text-center font-bold text-black">
                    {{$parents}}
                </h4>
                <span class="text-sm text-center font-medium">{{__('parents')}}</span>
            </div>
        </div>
        <!-- Card Item End -->
    </div>


@endsection
