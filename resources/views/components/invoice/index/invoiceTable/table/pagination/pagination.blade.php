<div class="flex items-center justify-end gap-[20px] px-[16px] py-[10px]">
        <p class="text-[14px] text-[#212B36] font-normal ">Rows per page:</p> 
        <button id="dropdownDefaultButton" data-dropdown-toggle="dropdown" class="text-black rounded-lg text-sm  text-center inline-flex items-center " type="button">5<svg class="w-2.5 h-2.5 ml-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
          </svg></button>
        <!-- Dropdown menu -->
        <div id="dropdown" class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700">
            <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownDefaultButton">
              <li>
                <a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">1</a>
              </li>
              <li>
                <a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">2</a>
              </li>
              <li>
                <a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">3</a>
              </li>
              <li>
                <a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">4 </a>
              </li>
            </ul>
        </div>
        <nav class="inline-flex items-center p-1 rounded  space-x-2">
            <p class="text-gray-500">Page 1 of 10</p>
            <a  href="#">
                <img class=" w-[20px] h-[20px] rounded" src="{{ asset('assets/images/invoice/arrowleft.svg') }}"> 
            </a>
            <a  href="#">
                <img class=" w-[20px] h-[20px] rounded" src="{{ asset('assets/images/invoice/arrowright.svg') }}"> 
            </a>
        </nav>
</div>