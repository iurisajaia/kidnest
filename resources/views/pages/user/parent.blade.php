@extends('layouts.auth')
@section('user')
    @include('components.global.title.index', ['title' => __('profile')])
    {{--    <h1>{{$user?->name}} {{$user?->user_data['lastname'] ?? ''}}</h1>--}}
    <div class="flex justify-between gap-[24px] flex-wrap">
        <div class="md:w-5/12">
            @include('components.profile.parent.avatar-update')
            @include('components.profile.parent.password-update')
        </div>
        <div class="md:w-6/12">
            @include('components.profile.parent.user-update')
            @include('components.profile.parent.kids')

        </div>
{{--        <form action="{{ route('user.file.upload') }}" method="post" enctype="multipart/form-data">--}}
{{--            @csrf--}}
{{--            <input type="file" name="file" accept="image/*,video/*" required>--}}
{{--            <button type="submit">Upload</button>--}}
{{--        </form>--}}
    </div>
@endsection
