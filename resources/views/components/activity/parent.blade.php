@include('components.global.title.index', ['title' => __('daily.activity')])



@if(isset($notifications) && count($notifications))
    <div id="notifications">
    </div>
    @foreach($notifications as $not)
        @include('components.activity.activityItem.activityItem')
    @endforeach
@endif
{{--@php--}}
{{--    $imagePath = asset('assets/images/activity/clock.svg');--}}
{{--    $locale = Lang::locale();--}}
{{--@endphp--}}
{{--<script src="https://js.pusher.com/8.2.0/pusher.min.js"></script>--}}
{{--<script>--}}

{{--    // Enable pusher logging - don't include this in production--}}
{{--    // Pusher.logToConsole = true;--}}

{{--    var pusher = new Pusher('b76fc3a04da71e6ce5e6', {--}}
{{--        cluster: 'eu'--}}
{{--    });--}}

{{--    var channel = pusher.subscribe('activities');--}}
{{--    channel.bind('activity-{{auth()->user()->id}}', function (res) {--}}
{{--        const data = res?.activity;--}}
{{--        console.log(data)--}}
{{--        const notifications = document.getElementById('notifications');--}}

{{--        const newNotification = document.createElement('div');--}}
{{--        newNotification.innerHTML += `<div class="px-[24px] py-[20px] rounded-[16px] shadow-md w-full m-auto mb-[15px]">--}}
{{--    <div class="flex gap-[5px]">--}}
{{--        <h3 class="text-[14px] text-[#444] font-semibold">${data?.activity?.title[{{$locale}}]}</h3>--}}
{{--        <p class="text-[14px] text-[#8B8B8B] font-normal">(${data?.staff?.position?.title} | ${data?.staff?.firstname} ${data?.staff?.lastname})</p>--}}
{{--    </div>--}}
{{--    <p class="text-[14px] text-[#8B8B8B] font-normal mt-[5px] mb-[23px]">${data?.activity?.description}</p>--}}
{{--    <div class="flex items-center gap-[5px] justify-end">--}}
{{--        <img class=" w-[14px] h-[14px]" src="{{ $imagePath }}">--}}
{{--        <p class="text-[12px] text-[#8B8B8B] font-normal">${data?.created_at}</p>--}}
{{--    </div>--}}
{{--</div>`--}}

{{--        notifications.appendChild(newNotification);--}}
{{--    });--}}
{{--</script>--}}
