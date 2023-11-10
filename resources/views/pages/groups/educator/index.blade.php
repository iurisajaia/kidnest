@extends('layouts.auth')
@section('user')
    @if(isset($group))
        <div class="mt-[60px] flex">
            @include('components.global.title.index', ['title' => $group->title . '/' . $group->branch->title])
        </div>


        @if(isset($group?->staff))
        <div class="mt-[60px] flex">
            @include('components.global.title.index', ['title' => __('staff')])
        </div>
            @include('components.kindergarten.groups.show.staff-item')
        @endif


        <div class="mt-[60px] flex">
            @include('components.global.title.index', ['title' => __('kids')])
        </div>
        @if(isset($group?->kids))
            <div class="flex justify-center  md:justify-between flex-wrap  gap-[20px] md:gap-[24px] mt-[22px] md:mt-[40px] flex-c">
                @foreach($group?->kids as $kid)
                    @include('components.kindergarten.groups.show.kids-item', ['kid' => $kid, 'group' => $group])
                @endforeach
            </div>
        @endif
    @endif
@endsection
