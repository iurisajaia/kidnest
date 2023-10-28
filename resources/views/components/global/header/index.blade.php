<header class="top-0 w-full flex items-center py-[15px] px-3 md:px-14 justify-start justify-between">
    @auth
        <button class="block md:hidden" id="burger">
            <img src="{{asset('assets/images/global/burger.png')}}" alt="KidNest"/>
        </button>
    @endauth
    <a class="flex  items-center space-x-2" href="/">
        <img src="{{asset('assets/images/global/logo.svg')}}" alt="KidNest"/>
    </a>
    <div class="flex items-center">
        @include('components.global.header.language')
        @auth
            <button class="block sm:hidden"></button>

            <div class="flex hidden sm:block">
                {{--            @include('components.global.header.notification')--}}
                <form method="POST" action="{{route('logout')}}">
                    @csrf
                    <button class="py-2.5 px-5 mr-2 mb-2 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-full border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">
                        {{__('logout')}}
                    </button>
                </form>
            </div>
        @endauth
    </div>
</header>
