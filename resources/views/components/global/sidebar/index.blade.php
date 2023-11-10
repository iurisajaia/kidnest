<?php
$menu = [
    [
        'title' => __('profile'),
        'url' => '',
        'icon' => asset('assets/images/sidebar/user.svg'),
        'iconActive' => asset('assets/images/sidebar/active/user.svg'),
        'isActive' => in_array(Route::currentRouteName(), ['user.index','groups.teacher']),
        'children' => [
            [
                'title' => __('profile'),
                'url' => route('user.index'),
                'isActive' => Route::currentRouteName() === 'user.index'
            ],
            [
                'title' => __('group'),
                'url' => route('groups.getGroup'),
                'isActive' => Route::currentRouteName() === 'groups.getGroup'
            ]

        ],
        'canAccess' => ['parent','educator', 'manager'],
    ],
    [
        'title' => __('analytic'),
        'url' => route('dashboard.index'),
        'icon' => asset('assets/images/sidebar/analytics.svg'),
        'iconActive' => asset('assets/images/sidebar/active/analytics.svg'),
        'canAccess' => ['kindergarten'],
        'isActive' => Route::currentRouteName() === 'dashboard.index'
    ],
    [
        'title' => __('finance'),
        'url' => route('payment.index'),
        'icon' => asset('assets/images/sidebar/finance.svg'),
        'iconActive' => asset('assets/images/sidebar/finance.svg'),
        'canAccess' => ['kindergarten'],
        'isActive' => Route::currentRouteName() === 'payment.index' || Route::currentRouteName() === 'payment.invoice.create'
    ],
    [
        'title' => __('file'),
        'url' => '',
        'icon' => asset('assets/images/sidebar/file.svg'),
        'canAccess' => ['kindergarten','manager'],
        'isActive' => false
    ],
    [
        'title' => __('user'),
        'url' => '',
        'icon' => asset('assets/images/sidebar/user.svg'),
        'iconActive' => asset('assets/images/sidebar/active/user.svg'),
        'isActive' => in_array(Route::currentRouteName(), ['user.index','branches.index', 'activity.index']),
        'children' => [
            [
                'title' => __('profile'),
                'url' => route('user.index'),
                'isActive' => Route::currentRouteName() === 'user.index'
            ],
            [
                'title' => __('branches'),
                'url' => route('branches.index'),
                'isActive' => Route::currentRouteName() === 'branches.index'
            ],
            [
                'title' => __('activities'),
                'url' => route('activity.index'),
                'isActive' => Route::currentRouteName() === 'activity.index'
            ],
            [
                'title' => __('kids'),
                'url' => route('kids.index'),
                'isActive' => Route::currentRouteName() === 'kids.index'
            ],


        ],
        'canAccess' => ['kindergarten','manager'],
    ],
//    [
//        'title' => __('invoice'),
//        'url' => route('invoices.index'),
//        'icon' => asset('assets/images/sidebar/invoice.svg'),
//        'iconActive' => asset('assets/images/sidebar/active/invoice.svg'),
//        'canAccess' => ['kindergarten', 'manager'],
//        'isActive' => Route::currentRouteName() === 'invoices.index',
//    ],
    [
        'title' => __('blog'),
        'url' => '',
        'icon' => asset('assets/images/sidebar/blog.svg'),
        'canAccess' => ['kindergarten','parent','educator', 'manager'],
        'isActive' => false
    ],
    [
        'title' => __('chat'),
        'url' => '',
        'icon' => asset('assets/images/sidebar/chat.svg'),
        'canAccess' => ['kindergarten','parent', 'educator','manager'],
        'isActive' => false
    ],
    [
        'title' => __('calendar'),
        'url' => '',
        'icon' => asset('assets/images/sidebar/calendar.svg'),
        'canAccess' => ['kindergarten','parent', 'educator','manager'],
        'isActive' => false
    ],
    [
        'title' => __('payment'),
        'url' => route('payment.index'),
        'icon' => asset('assets/images/sidebar/calendar.svg'),
        'iconActive' => asset('assets/images/sidebar/calendar.svg'),
        'canAccess' => ['parent'],
        'isActive' => Route::currentRouteName() === 'payment.index'
    ],
    [
        'title' => __('daily.activity'),
        'url' => route('activity.index'),
        'icon' => asset('assets/images/sidebar/activity.svg'),
        'iconActive' => asset('assets/images/sidebar/activity.svg'),
        'canAccess' => ['parent','educator'],
        'isActive' => Route::currentRouteName() === 'activity.index'
    ],
//    [
//        'title' => __('daily.summaries'),
//        'url' => route('summary.index'),
//        'icon' => asset('assets/images/sidebar/activity.svg'),
//        'iconActive' => asset('assets/images/sidebar/activity.svg'),
//        'canAccess' => ['parent'],
//        'isActive' => Route::currentRouteName() === 'summary.index'
//    ],
    [
        'title' => __('eating.schedule'),
        'url' => '',
        'icon' => asset('assets/images/sidebar/food.svg'),
        'canAccess' => ['parent'],
        'isActive' => false
    ],
    [
        'title' => __('attendance'),
        'url' => route('attendance.index'),
        'icon' => asset('assets/images/sidebar/attendance.svg'),
        'iconActive' => asset('assets/images/sidebar/active/attendance.svg'),
        'canAccess' => ['kindergarten', 'educator'],
        'isActive' => Route::currentRouteName() === 'attendance.index'
    ],


];
?>

<aside id="sidebar" class="hidden sm:block sm:w-64 h-screen"
       aria-label="Sidebar">
    <div class="h-full px-3 py-4 overflow-y-auto sidebar-item">
        <ul class="space-y-2 font-medium">
            @foreach($menu as $m)
                @role($m['canAccess'])
                    @if(isset($m['children']))
                        <li>
                            <button type="button"
                                    class="flex items-center w-full p-2 text-base  transition duration-75 rounded-lg group hover:bg-gray-100 text-black dark:text-white {{$m['isActive'] ? 'bg-[#FFF7E8] dark:text-[#FFCC5C]' : ''}}"
                                    aria-controls="{{$m['title']}}" data-collapse-toggle="{{$m['title']}}">
                                <img src="{{$m['isActive'] ? $m['iconActive'] : $m['icon']}}" alt="{{$m['title']}}">
                                <span class="flex-1 ml-3 text-up text-left whitespace-nowrap font-noto font-medium {{$m['isActive'] ? 'text-[#FFCC5C]' : 'text-black'}}">{{$m['title']}}</span>
                                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                     viewBox="0 0 10 6">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                          d="m1 1 4 4 4-4"/>
                                </svg>
                            </button>
                            <ul id="{{$m['title']}}" class="hidden py-2 space-y-2">
                                @foreach($m['children'] as $child)
                                    <li class="list-disc {{$child['isActive'] ? 'marker:text-[#FFCC5C] marker:text-[20px] ml-[23px]' : 'ml-[20px]'}}">
                                        <a href="{{$child['url']}}"
                                           class="flex items-center w-full p-2 text-up text-gray-900 transition duration-75 rounded-lg pl-11 group font-noto {{$child['isActive'] ? 'font-semibold' : 'font-medium'}}">
                                            {{$child['title']}}
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        </li>
                    @else
                        <li>
                            <a href="{{$m['url']}}"
                               class="flex items-center p-2 text-black rounded-lg hover:bg-gray-100 group text-up {{$m['isActive'] ? 'bg-[#FFF7E8] dark:text-[#FFCC5C]' : 'dark:text-white'}}">
                                <img src="{{$m['isActive'] ? $m['iconActive'] : $m['icon']}}" alt="{{$m['title']}}">
                                <span class="ml-3 text-black font-noto font-medium">{{$m['title']}}</span>
                            </a>
                        </li>
                    @endif
                @endrole
            @endforeach
        </ul>
        @auth
            <div class="block sm:hidden mt-[22px]">
                <form method="POST" action="{{route('logout')}}">
                    @csrf
                    <button class="py-2.5 px-5 mr-2 mb-2 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-full border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">
                        {{__('logout')}}
                    </button>
                </form>
            </div>
        @endauth
    </div>
</aside>

