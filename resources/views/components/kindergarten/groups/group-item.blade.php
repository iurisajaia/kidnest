<div class='w-[358px] md:w-[344px] py-[16px] px-[20px] border-gray-800 rounded-2xl shadow '>
    <div class='flex items-center justify-between h-[80px] gap-[8px] relative'>
        <div class='flex items-center justify-center rounded-full w-[48px] h-[48px] bg-[#DFE3E8] mr-[16px]'>
            <h2 class='text-[14px] text-[#637381] font-semibold '>{{$loop->index + 1}}</h2>
        </div>
        <div class='w-1/2 mr-[24px]'>
            <h2 class='text-[14px] font-semibold text-[#212B36]'>{{$group->title}}</h2>

            <p class='text-xs text-gray-400 font-normal flex mt-[4px]'>{{__('before.age', ['age' => $group?->age?->age])}}</p>
        </div>
        <div class="absolute right-[-10px] md:top-[-20px] flex md:pt-[12px] justify-end align-center">

            <button id="groupDropdown-{{$group->id}}" data-dropdown-toggle="groupDropdownButton-{{$group->id}}" class="inline-flex items-center p-2 text-sm font-medium text-center text-gray-900 rounded-lg hover:bg-gray-100 focus:ring-4 focus:outline-none dark:text-white focus:ring-gray-50 dark:bg-gray-800 dark:hover:bg-gray-700 dark:focus:ring-gray-600" type="button">
                <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 4 15">
                    <path d="M3.5 1.5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0Zm0 6.041a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0Zm0 5.959a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0Z"/>
                </svg>
            </button>

            <!-- Dropdown menu -->
            <div id="groupDropdownButton-{{$group->id}}" class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700 dark:divide-gray-600">
                <div class="py-1">
                    <div class="flex pt-[9px] justify-end align-center">
                        <button data-modal-target="update-group-modal-{{$group->id}}" data-modal-toggle="update-group-modal-{{$group->id}}" class="flex w-full align-center px-4 py-2 text-center text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">
                            <img src="{{asset('assets/images/global/pencil.svg')}}" alt="" class="mr-[12px] w-[22px] cursor-pointer">
                            {{__('edit')}}
                        </button>
                    </div>
                </div>
                <div class="py-1">
                    <a href="{{route('attendance.index', ['groupId' => $group->id,])}}" class="flex w-full align-center px-4 py-2 text-center text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">
                        <img src="{{asset('assets/images/sidebar/attendance.svg')}}" alt="" class="mr-[12px] w-[22px] cursor-pointer">
                        {{__('attendance')}}
                    </a>
                </div>
                <div class="py-1">
                    <form action="{{route('groups.delete', $group->id)}}" method="POST" class="mt-[4px]">
                        @csrf
                        @method('DELETE')
                        <button class="flex w-full align-center px-4 py-2 text-center text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">
                            <img src="{{asset('assets/images/global/trash.svg')}}" alt="" class="mr-[12px] cursor-pointer w-[22px]">
                            {{__('delete')}}
                        </button>
                    </form>
                </div>
            </div>
        </div>
        <div class="mt-4">
            <a href="{{route('groups.index', $group->id)}}" class="border border-[#919EAB] px-[8px] py-[4px] rounded-[8px] hover:bg-black hover:text-[#fff] font-bold transition-300">
                {{__('sign.in')}}
            </a>

        </div>
    </div>
</div>
