<div class="py-[16px] px-[16px] flex items-center">
    <input id="default-checkbox-{{$kid->id}}" type="checkbox" data-activity-id="{{$activity['id']}}" name="parent_id[]" value="{{$kid->parent->id}}" class="parent-input w-[20px] h-[20px] mr-[24px] ">
    <label for="default-checkbox-{{$kid->id}}" class=" text-sm font-medium text-gray-900 dark:text-gray-300"></label>
    <img class=" w-[40px] h-[40px]" src="{{ asset('assets/images/global/avatar.svg') }}">
    <div class="px-[16px]">
        <h3 class="text-[#444444] text-[14px] font-medium">{{$kid->first_name}} {{$kid->last_name}}</h3>
        <span class="text-[#999] text-[14px] font-normal">{{$kid->parent->name}} {{$kid->parent?->user_data['lastname'] ?? ''}}</span>
    </div>
</div>
