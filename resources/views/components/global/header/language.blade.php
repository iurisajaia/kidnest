
<button id="lngDrop" data-dropdown-toggle="languageDropDown" class="text-white mr-[22px] focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm text-center inline-flex items-center" type="button">
  <img src="{{asset('assets/images/flag/'.Lang::locale().'.svg')}}" />
</button>
<!-- Dropdown menu -->
<div id="languageDropDown" class="z-10 hidden divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700">
    <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="lngDrop">
        @foreach($available_locales as $locale_name => $available_locale)
            @if($available_locale !== Lang::locale())
                <li>
                    <a href="{{route('language', $available_locale)}}" class="px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white flex">
                        <img src="{{asset('assets/images/flag/'.$available_locale.'.svg')}}" />
                        <h3 class="ml-[12px] text-[12px] font-medium">{{__($available_locale)}}</h3>
                    </a>
                </li>
            @endif
        @endforeach

    </ul>
</div>
