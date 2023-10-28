@extends('layouts.auth')
@section('user')
        @role(['educator'])
            @if(isset($group))
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
            @endif
        @endrole
        @role(['parent'])
            @if(isset($group))
                @include('components.global.title.index', ['title' => $group->title])
            @else
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                    <strong class="font-bold">შეცდომაა!</strong>
                    <span class="block sm:inline"> სავარაუდოდ ბაღს თქვენი ბავშვი ჯერ არ დაუმატებია</span>
                  </span>
                </div>
            @endif
        @endrole



@endsection
