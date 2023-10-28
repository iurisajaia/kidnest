<form action="{{route('activity.send')}}" method="POST">
    @csrf
    <input type="hidden" name="activity_id" value="{{$activity['id']}}" />
    <input type="hidden" name="group_id" value="{{$staff?->group->id}}" />
    <input type="hidden" name="staff_id" value="{{$staff?->id}}" />

    <div class="mb-[20px]" id="activity-collapse-{{$activity['id']}}" data-accordion="collapse">
        <h2 id="activity-collapse-{{$activity['id']}}">
            <button type="button"
                    class="flex items-center justify-between w-full bg-[#F4F6F8]  rounded-[12px] py-[16px] px-[16px]  hover:bg-[#FFCC5C]"
                    data-accordion-target="#activity-collapse-body-{{$activity['id']}}"
                    aria-expanded="false"
                    aria-controls="activity-collapse-body-{{$activity['id']}}">
                <div class="flex align-center justify-between">
                    <input type="checkbox" data-activity-id="{{$activity['id']}}" class="w-[20px] h-[20px] mr-[24px] activity-checkbox">
                    <span class="text-[#444444] mr-[4px]">{{$activity['title']['ka'] ?? ''}}</span>
{{--                    <img class=" w-[18px] h-[18px] text-[]" src="{{ asset('assets/images/activity/arrow.svg') }}">--}}
                </div>
                @if(isset($activity['status']) && $activity['status'] === 'sent')
                    <h3 class="py-[6px] px-[9px] bg-[#D2ECD0] text-[#7BA778] font-[10px] rounded-lg">{{__('sent')}}</h3>
                @endif
            </button>

        </h2>
        <div id="activity-collapse-body-{{$activity['id']}}" class="hidden">
            @if(isset($staff) && count($staff?->group->kids))
                <div class="max-h-[532px] overflow-scroll">
                    @foreach($staff?->group->kids as $kid)
                        @include('components.activity.kidItem.kidItem', ['activity' => $activity])
                    @endforeach
                </div>
            @endif

            <div class="mt-[20px] flex justify-end">
                <button type="submit"
                        class="py-[19px] px-[142px] bg-[#FDEEC4] rounded-[12px] text-[16px] text-[#1C1A1B]" href="">
                    {{__('send')}}
                </button>
            </div>

        </div>
    </div>
</form>
