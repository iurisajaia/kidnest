@extends('layouts.auth')
@section('user')
        @include('components.global.title.index', ['title' => __('groups'), 'subTitle' => $branch?->title])
        <div class="flex items-center">
            <a href="{{ route('branches.index') }}" class="flex items-center">
                <img src="{{asset('assets/images/global/back.svg')}}" class="mr-[10px]"/>
                <span class="text-[12px] text-[#919EAB] font-normal">{{__('back')}}</span>
            </a>
{{--            @include('components.global.back.index')--}}
            @include('components.kindergarten.groups.header')
        </div>

        @if(isset($groups))
            <div class="flex gap-[20px] md:gap-[24px]  flex-wrap justify-center md:justify-start mt-[25px] md:mt-[30px]">
                @foreach($groups as $group)
                    @include('components.kindergarten.groups.group-item', ['group' => $group])
                    @include('components.kindergarten.groups.update-group-modal', ['group' => $group])
                @endforeach
            </div>
        @endif

@endsection
