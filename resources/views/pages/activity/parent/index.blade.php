@extends('layouts.auth')
@section('user')
    @include('components.global.title.index', ['title' => __('daily.activity')])



    @if(isset($notifications) && count($notifications))
        <div id="notifications">
        </div>
        @foreach($notifications as $not)
            @include('components.activity.activityItem.activityItem')
        @endforeach
    @endif


@endsection
