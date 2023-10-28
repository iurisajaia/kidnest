<div class="shadow-md rounded-[16px]">
    <div class="">
        <div class="mb-4 border-b-[2px] border-[#919eab14]">
            <ul class="px-[20px] flex gap-[30px] flex-wrap -mb-px text-sm font-medium text-center" id="myTab" data-tabs-toggle="#myTabContent" role="tablist">
                <li class="mr-2 text-[#637381]" role="presentation">
                    <a class="py-[12px] px-[0px] inline-flex gap-[8px] cursor-pointer p-4 border-b-2 border-transparent rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300" id="settings-tab" data-tabs-target="#settings" type="a" role="tab" aria-controls="settings" aria-selected="false"> ყველა <img class=" w-[28px]" src="{{ asset('assets/images/invoice/num.svg') }}"> </a>
                </li>
                <li class="mr-2" role="presentation">
                    <a class="py-[12px] px-[0px] inline-flex gap-[8px] cursor-pointer p-4 border-b-2 border-transparent rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300" id="dashboard-tab" data-tabs-target="#dashboard" type="a" role="tab" aria-controls="dashboard" aria-selected="false">გადახდილი <img class=" w-[28px]" src="{{ asset('assets/images/invoice/num.svg') }}">
                    </a>
                </li>
                <li class="mr-2 text-[#637381]" role="presentation">
                    <a class="py-[12px] px-[0px] inline-flex gap-[8px] cursor-pointer p-4 border-b-2 border-transparent rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300" id="settings-tab" data-tabs-target="#settings" type="a" role="tab" aria-controls="settings" aria-selected="false">პროცესშია <img class=" w-[28px]" src="{{ asset('assets/images/invoice/num.svg') }}"></a>
                </li>
                <li class="mr-2 text-[#637381]" role="presentation">
                    <a class="py-[12px] px-[0px] inline-flex gap-[8px] cursor-pointer p-4 border-b-2 border-transparent rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300" id="contacts-tab" data-tabs-target="#contacts" type="a" role="tab" aria-controls="contacts" aria-selected="false">გადაცილებული <img class=" w-[28px]" src="{{ asset('assets/images/invoice/num.svg') }}"></a>
                </li>
                <li class="mr-2 text-[#637381]" role="presentation">
                    <a class="py-[12px] px-[0px] inline-flex gap-[8px] cursor-pointer p-4 border-b-2 border-transparent rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300" id="contacts-tab" data-tabs-target="#contacts" type="a" role="tab" aria-controls="contacts" aria-selected="false">დრაფტი <img class=" w-[28px]" src="{{ asset('assets/images/invoice/num.svg') }}"></a>
                </li>
            </ul>
        </div>
    </div>
    <div class="py-[20px] px-[20px] flex gap-[16px]">
        <label for="default" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"></label>
        <select id="default" class="rounded-[8px] text-[#212B36] font-normal text-[14px] w-[180px] px-[14px] py-[16px] border-[#919eab33]">
            <option selected>სერვისები</option>
            <option value="US">სწავლის საფასურის გადახდა</option>
            <option value="CA">ცეკვის საფასურის გადახდა</option>
            <option value="FR">ტანვარჯიშის საფასურის გადახდა</option>
            <option value="DE">ცურვის საფასურის გადახდა</option>
        </select>
        
        <div date-rangepicker class="flex items-center gap-[20px]">
            <div class="relative">
                <div class="absolute inset-y-0 right-[8px] flex items-center pl-3 pointer-events-none">
                    <img class=" w-[24px] h-[24px] ml-[10px]" src="{{ asset('assets/images/invoice/calendar.svg') }}"> 
                </div>
                <input name="start" type="text" class="rounded-[8px]  font-normal text-[14px] w-[180px] px-[14px] py-[16px] border-[#919eab33] dark:placeholder-[#919EAB] " placeholder="დაწყების თარიღი">
                </div>
                <div class="relative">
                <div class="absolute inset-y-0 right-[8px] flex items-center pl-3 pointer-events-none">
                    <img class=" w-[24px] h-[24px]" src="{{ asset('assets/images/invoice/calendar.svg') }}"> 
                </div>
                <input name="end" type="text" class="rounded-[8px]  font-normal text-[14px] w-[180px] px-[14px] py-[16px] border-[#919eab33] dark:placeholder-[#919EAB]" placeholder="დასრ. თარიღი">
            </div>
        </div>
        
        <form class=" w-[100%]">   
            <label for="default-search" class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">Search</label>
            <div class="relative">
                <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                    <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
                    </svg>
                </div>
                <input type="search" id="default-search" class="rounded-[8px] block w-full p-4 pl-8 font-normal text-[14px] border-[#919eab33]  dark:placeholder-[#919EAB] " placeholder="მოძებნე კლიენტი ან ინვოისის ნომერი..." required>
            </div>
        </form>
    
      
    </div>
    <div class="px-[20px] py-[16px]">
        <p class="text-[14px] text-[#212B36] ">8 results found</p>
    </div>
    @include('components.invoice.index.invoiceTable.table.table')
    @include('components.invoice.index.invoiceTable.table.pagination.pagination')
</div>
