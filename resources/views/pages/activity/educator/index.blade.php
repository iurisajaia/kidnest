@extends('layouts.auth')
@section('user')
    @if(isset($group))
        @include('components.activity.kindergarten.header', ['group' => $group])
        @include('components.activity.kindergarten.new-activity-modal')


        @if(isset($group->activities) && count($group->activities))
            @foreach($group->activities as $activity)
                @include('components.activity.dropdown.dropdown')
            @endforeach
        @endif
    @endif


@endsection
