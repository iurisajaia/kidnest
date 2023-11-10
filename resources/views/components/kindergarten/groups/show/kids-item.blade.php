<div
    class='md:w-[30%] w-[344px] {{isset($showData) ? 'h-auto' : 'h-[103px] md:h-[214px]'}} rounded-2xl shadow flex items-center md:justify-center flex-wrap relative'>

    @role(['kindergarten', 'educator'])
    <div class="absolute right-[20px] md:top-[0px] flex md:pt-[12px] justify-end align-center">

        <button id="kidsDropDownButton-{{$kid->id}}" data-dropdown-toggle="kidsDropDownDots-{{$kid->id}}" class="inline-flex items-center p-2 text-sm font-medium text-center text-gray-900 bg-white rounded-lg hover:bg-gray-100 focus:ring-4 focus:outline-none dark:text-white focus:ring-gray-50 dark:bg-gray-800 dark:hover:bg-gray-700 dark:focus:ring-gray-600" type="button">
            <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 4 15">
                <path d="M3.5 1.5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0Zm0 6.041a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0Zm0 5.959a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0Z"/>
            </svg>
        </button>

        <!-- Dropdown menu -->
        <div id="kidsDropDownDots-{{$kid->id}}" class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700 dark:divide-gray-600">
            <div class="py-1">
                <button data-modal-target="update-kid-{{$kid->id}}"
                        data-modal-toggle="update-kid-{{$kid->id}}"
                        class="block px-4 py-2 w-full text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">
                    {{__('edit')}}
                </button>
            </div>
            <div class="py-1">
                <a href="{{route('attendance.index', ['groupId' => $group->id, 'kidId' => $kid->id])}}" class="block px-4 py-2 text-center text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">
                    {{__('attendance')}}
                </a>
            </div>
            @if($kid->parent)
                <div class="py-1">
                    <a href="{{route('user.parent', $kid->parent?->id)}}" class="block px-4 py-2 text-center text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">
                        {{__('profile')}}
                    </a>
                </div>
            @endif
            <div class="py-1">
                <button data-modal-target="add-summary-{{$kid->id}}"
                        data-modal-toggle="add-summary-{{$kid->id}}"
                        class="block px-4 py-2 w-full text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">
                    {{__('summary')}}
                </button>
            </div>
            <div class="py-1">
                <form action="{{route('kids.delete', $kid->id)}}" method="POST" class="mt-[4px]">
                    @csrf
                    @method('DELETE')
                    <button class="block px-4 py-2 w-full text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">
                        {{__('delete')}}
                    </button>
                </form>
            </div>
        </div>




    </div>
    @endrole
    <img src="{{asset('assets/images/global/kid-avatar-1.png')}}" alt="{{$kid->first_name}}"/>
    <div class='md:w-full md:text-center ml-[10px]'>
        <h2 class='text-[12px] md:text-[16px] font-semibold text-[#212B36]'>{{$kid->first_name}} {{$kid->last_name}}</h2>
        @if(count($kid->parents))
            @foreach($kid->parents as $parent)
                <p class='text-xs text-gray-400 font-normal'>{{$parent->name ?? ''}}</p>
            @endforeach
        @endif
        @if(isset($showData))
            <div class="w-[80%] m-auto">
                <div class="p-4 mb-4 mt-4 text-sm text-blue-800 w-full rounded-lg bg-blue-50 dark:bg-gray-800 dark:text-blue-400" role="alert">
                    <span class="font-medium">{{__('kindergarten')}} - </span> {{$kid?->kindergarten?->name ?? 'არ არის არჩეული'}}
                </div>
                <div class="p-4 mb-4 text-sm w-full text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400" role="alert">
                    <span class="font-medium">{{__('branch')}} -</span> {{$kid?->branch?->title ?? 'არ არის არჩეული'}}
                </div>
                <div class="p-4 mb-4 text-sm w-full text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400" role="alert">
                    <span class="font-medium">{{__('group')}} -</span> {{$kid?->group?->title ?? 'არ არის არჩეული'}}
                </div>
            </div>
        @endif
    </div>
</div>
@include('components.kindergarten.groups.show.update-kid', ['kid' => $kid])
@include('components.kindergarten.groups.show.add-summary', ['kid' => $kid])
