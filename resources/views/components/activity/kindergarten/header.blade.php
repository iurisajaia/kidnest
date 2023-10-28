<div class="flex justify-between mb-[70px] mt-[70px] flex-wrap">
    <h2 class="text-[#444] text-[24px] font-bold mb-4 sm:mb-0">{{$group->branch->title}} / {{$group->title}}</h2>
    <button data-modal-target="new-activity-modal-{{$group->id}}" data-modal-toggle="new-activity-modal-{{$group->id}}"
            data-modal-backdrop="static"
            class="flex font-bold items-center block text-white focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center bg-black"
            type="button">
        <img src="{{asset('assets/images/global/plus.svg')}}" class="mr-[15px]"/>
        {{__('new.activity')}}
    </button>
</div>
