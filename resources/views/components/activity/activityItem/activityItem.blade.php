<div class="px-[24px] py-[20px] rounded-[16px] shadow-md w-full m-auto mb-[15px]">
    <div class="flex gap-[5px]">
        <h3 class="text-[14px] text-[#444] font-semibold">{{$not?->activity?->title}}</h3>
        <p class="text-[14px] text-[#8B8B8B] font-normal">({{$not?->staff?->position?->title}} | {{$not?->staff?->firstname}} {{$not?->staff?->lastname}})</p>
    </div>
    <p class="text-[14px] text-[#8B8B8B] font-normal mt-[5px] mb-[23px]">{{$not?->activity?->description}}</p>
    <div class="flex items-center gap-[5px] justify-end">
        <img class=" w-[14px] h-[14px]" src="{{ asset('assets/images/activity/clock.svg') }}">
        <p class="text-[12px] text-[#8B8B8B] font-normal">{{$not->created_at}}</p>
    </div>
</div>
