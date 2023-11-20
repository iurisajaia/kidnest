@extends('layouts.auth')
@section('user')
    @include('components.global.title.index', ['title' => $group->title, 'subTitle' => \App\Enums\AgeEnum::ages[$group->age->id]])
    <div class="flex items-center">
        <a href="{{ route('branches.show', $group->branch_id) }}" class="flex items-center">
            <img src="{{asset('assets/images/global/back.svg')}}" class="mr-[10px]"/>
            <span class="text-[12px] text-[#919EAB] font-normal">{{__('back')}}</span>
        </a>
        @include('components.kindergarten.groups.show.header')
    </div>
    @if(isset($group?->staff))
        @include('components.kindergarten.groups.show.staff-item')
    @endif


    <div class="mt-[60px] flex">
        @include('components.global.title.index', ['title' => __('kids')])
        @include('components.kindergarten.groups.show.kids-header')
    </div>

    @if(isset($group?->kids))
        <div class="flex justify-center  md:justify-between flex-wrap  gap-[20px] md:gap-[24px] mt-[22px] md:mt-[40px] flex-c">
            @foreach($group?->kids as $kid)
                @include('components.kindergarten.groups.show.kids-item', ['kid' => $kid])
            @endforeach
        </div>
    @endif

@endsection
