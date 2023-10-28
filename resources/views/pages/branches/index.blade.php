@extends('layouts.auth')
@section('user')
        @include('components.global.title.index', ['title' => __('branches')])
        @include('components.kindergarten.branches.header')
        @if(isset($branches))
            <div class="flex gap-[20px] md:gap-[24px]  flex-wrap justify-center md:justify-start mt-[25px] md:mt-[30px]">
                @foreach($branches as $branch)
                    @include('components.kindergarten.branches.item', ['branch' => $branch])
                    @include('components.kindergarten.branches.update-branch-modal', ['branch' => $branch])

                @endforeach
            </div>
        @endif

@endsection
