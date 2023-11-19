@extends('layouts.auth')
@section('user')
    @include('components.global.title.index', ['title' => __('profile')])
    {{--    <h1>{{$user?->name}} {{$user?->user_data['lastname'] ?? ''}}</h1>--}}
    <div class="flex justify-between gap-[24px] flex-wrap">

        @include('components.profile.avatar-update')
        @include('components.profile.password-update')
        @include('components.profile.user-update')
        @include('components.profile.kids')
{{--        <form action="{{ route('user.file.upload') }}" method="post" enctype="multipart/form-data">--}}
{{--            @csrf--}}
{{--            <input type="file" name="file" accept="image/*,video/*" required>--}}
{{--            <button type="submit">Upload</button>--}}
{{--        </form>--}}
    </div>
@endsection
