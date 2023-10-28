@if(isset($subTitle))
    <div class="flex items-center gap-[18px] mb-[20px]">
        <h1 class="text-[#444] text-[24px] font-bold">{{$title}}</h1>
        <h4 class="text-[#212B36] text-[14px] font-normal">{{$subTitle}}</h4>
    </div>
@else
    <h1 class="text-[#444] text-[24px]   font-bold">{{$title}}</h1>
@endif
