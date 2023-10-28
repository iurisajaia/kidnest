@if(isset($group))
    @include('components.activity.kindergarten.header', ['group' => $group])
    @include('components.activity.kindergarten.new-activity-modal')


    @if(isset($activities) && count($activities))
        @foreach($activities as $activity)
            @include('components.activity.dropdown.dropdown')
        @endforeach
    @endif
@endif
