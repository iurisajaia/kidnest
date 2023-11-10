
    <div class="flex justify-between items-center ">
        <div>
            <h1 class="text-[24px] font-bold text-[#212B36] mb-[8px]">სია</h1>
            @include('components.global.breadcrumbs.index')
        </div>
        <div>
            <a class="bg-[#212B36] text-[#FFFFFF] px-[12px] py-[6px] flex gap-[8px] rounded-[8px]" href="{{route('payment.invoice.create')}}">
                <img class=" w-[20px] text-[14px] font-bold" src="{{ asset('assets/images/invoice/plus.svg') }}">
                ახალი ინვოისი
            </a>
        </div>
    </div>
