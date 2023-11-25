@include('components.global.title.index', ['title' => __('activities')])

<div class="mt-11">
    @if(isset($groups) && count($groups))
        @foreach($groups as $group)
            @include('components.activity.kindergarten.header', ['group' => $group])
            @include('components.activity.kindergarten.new-activity-modal', ['group' => $group])
            @if(isset($group->activities) && count($group->activities))
                <div class="flex flex-wrap justify-between">
                    @foreach($group->activities as $act)
                        @include('components.activity.kindergarten.activity-item')
                    @endforeach
                </div>
            @endif
        @endforeach
    @endif
</div>

