<div class="w-full flex justify-end">
    <button data-modal-target="staff-modal" data-modal-toggle="staff-modal"
            class="flex gap-[8px] font-bold text-[14px] items-center  text-white focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg  px-[12px] py-[6px] text-center bg-black"
            type="button">
            <img src="{{asset('assets/images/global/plus.svg')}}" class="w-[20px] h-[20px]"/>
        {{__('add.personal')}}
    </button>
    @include('components.kindergarten.groups.show.new-staff-modal')
</div>
