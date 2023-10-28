@include('components.global.title.index', ['title' => __('activities')])

<div class="mt-11">
    @if(isset($groups) && count($groups))
        @foreach($groups as $group)
            @include('components.activity.kindergarten.header', ['group' => $group])
            @include('components.activity.kindergarten.new-activity-modal')
            @if(isset($group->activities) && count($group->activities))
                <div class="flex flex-wrap  justify-center md:justify-start gap-3">
                    @foreach($group->activities as $act)
                        @include('components.activity.kindergarten.activity-item')
                        @include('components.activity.kindergarten.update-activity-modal')
                    @endforeach
                </div>
            @endif
        @endforeach
    @endif
</div>

