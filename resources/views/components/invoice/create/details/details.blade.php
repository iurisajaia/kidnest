<div class="py-[24px] px-[24px] mb-[64px] ">
    <h2 class="mb-[24px] text-[18px] text-[#919EAB] font-bold">დეტალები:</h2>
    <div>
        <div class="flex gap-[16px] justify-between">
            <input type="text" id="default-input" class="w-full w-[259px] rounded-[8px] text-[#212B36] font-normal text-[14px] px-[14px] py-[8px] border-[#919eab33]" placeholder="გადასახადი">
            <input type="text" id="default-input" class="w-full w-[259px] rounded-[8px] text-[#212B36] font-normal text-[14px] px-[14px] py-[8px] border-[#919eab33]" placeholder="ყოველთვიური გადასახადი">
            <select id="default" class="rounded-[8px] text-[#212B36] font-normal text-[14px] w-[160px] px-[14px] py-[8px] border-[#919eab33]">
                <option selected>სერვისები</option>
                <option value="US">სწავლის საფასურის გადახდა</option>
                <option value="CA">ცეკვის საფასურის გადახდა</option>
                <option value="FR">ტანვარჯიშის საფასურის გადახდა</option>
                <option value="DE">ცურვის საფასურის გადახდა</option>
            </select>
            <input type="text" id="default-input" class="w-full w-[166px] rounded-[8px] text-[#212B36] font-normal text-[14px] px-[14px] py-[8px] border-[#919eab33]" placeholder="GB12th9184679194861">
            <input type="text" id="default-input" class="w-full w-[96px] rounded-[8px] text-[#212B36] font-normal text-[14px] px-[14px] py-[8px] border-[#919eab33]" placeholder="$219.99">
        </div>
    </div>
    <div class="flex gap-[8px] items-center justify-end mt-[16px] pb-[24px] border-b-[1px] border-dashed border-[#e6ebe7]">
        <img class=" w-[18px] h-[18px]" src="{{ asset('assets/images/invoice/bin.svg') }}">
        <p class="text-[#FF6B6B;] text-[13px] font-bold">წაშლა</p>
    </div>
    <div class="flex justify-end pt-[24px]">
         <input type="text" id="default-input" class=" w-[110px]  rounded-[8px] text-[#212B36] font-normal text-[14px] px-[14px] py-[8px] border-[#919eab33]" placeholder="ფასდაკლება">
    </div>
    <div class="flex justify-end mt-[24px]">
        <div class="w-[300px]">
            <div class="flex  justify-between">
                <p class="text-[#637381] text-[14px] font-normal">ჯამი</p>
                <p class="text-[#637381] text-[14px] font-semibold">$339.98</p>
            </div>
            <div class="flex  justify-between mb-[12px] mt-[12px]">
                <p class="text-[#637381] text-[14px] font-normal">ფასდაკლება</p>
                <p class="text-[#FF6B6B]">-$10</p>
            </div>
            <div class="flex  justify-between">
                <p class="text-[#637381] text-[14px] font-semibold">ჯამი</p>
                <p class="text-[#637381] text-[14px] font-semibold">$349.98</p>
            </div>
        </div>
    </div>
</div>
<div  class="flex gap-[16px] justify-end mb-[100px]" >
    <a class="py-[11px] rounded-[8px] px-[16px] text-[#212B36] text-[15px] font-bold border-[1px] border-[#919eab33]" href="">დრაფტად შენახვა</a>
    <a class="bg-[#212B36] py-[11px] rounded-[8px] px-[16px] text-[#FFFFFF] text-[15px] font-bold border-[1px] border-[#919eab33]" href="">შექმნა & გაგზავნა</a>
</div>