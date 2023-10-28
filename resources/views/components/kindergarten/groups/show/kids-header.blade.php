<div class="w-full flex justify-end">
    <button data-modal-target="new-kid-modal" data-modal-toggle="new-kid-modal"
            class="flex gap-[8px] font-bold text-[14px] items-center  text-white focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg  px-[12px] py-[6px] text-center bg-black"
            type="button">
            <img class="w-[20px] h-[20px]" src="{{asset('assets/images/global/plus.svg')}}"/>
        {{__('new.kid')}}
    </button>
    @include('components.kindergarten.groups.show.new-kid-modal')
</div>
