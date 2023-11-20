<div class="flex justify-center md:justify-between flex-wrap gap-[20px] md:gap-[24px] mt-[52px] md:mt-[40px] ">
    @foreach($group->staff as $staff)
        <div class='md:w-[30%] w-[358px]  p-6 border-gray-800 h-[240px] rounded-2xl bg-cover flex items-center justify-center relative'
            style="background-image: url({{asset('assets/images/global/educator-bg.png')}})">
           @role(['kindergarten'])
            <div class="absolute right-[20px] top-[0px] flex pt-[12px] justify-end align-center">
                <button data-modal-target="staff-update-modal-{{$staff->id}}" data-modal-toggle="staff-update-modal-{{$staff->id}}"
                        class="mr-[12px] cursor-pointer text-[##FFFFFF] p-[8px] bg-pencil-box flex items-center justify-center rounded-[8px]"
                >
                    <img src="{{asset('assets/images/global/pencil-white.svg')}}" alt="">
                </button>
                <form action="{{route('staff.delete', $staff->id)}}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button class="cursor-pointer text-[##FFFFFF] p-[8px] bg-pencil-box flex items-center justify-center rounded-[8px]">
                        <img src="{{asset('assets/images/global/trash.svg')}}" alt=""
                             class="cursor-pointer">
                    </button>
                </form>
            </div>
            @endrole
            <div class='flex items-center justify-center h-[80px] flex-wrap'>
                <img src="{{asset('assets/images/global/educator-avatar.png')}}" class="mt-[-20px]"/>
                <div class="text-center w-full mt-[24px]">
                    <h2 class='text-[20px] text-white font-semibold'>{{$staff->firstname . ' ' . $staff->lastname}}</h2>
                    <p class='text-[14px] text-gray-400 font-normal'>
                        {{__($staff?->user?->role?->title)}}
                    </p>
                </div>


            </div>
        </div>
        @include('components.kindergarten.groups.show.update-staff-modal', ['staff' => $staff])

    @endforeach
</div>


