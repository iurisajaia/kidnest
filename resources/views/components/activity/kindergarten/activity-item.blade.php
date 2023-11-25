<a href="#"
   class="block lg:w-[33%] md:w-[48%] sm:w-[100%] mb-[12px] relative p-6 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 dark:hover:bg-gray-200">
    <h5 class="mb-2 text-xl font-bold tracking-tight text-black-900">{{$act->title ?? ''}}</h5>
    <p class="font-normal text-black-700 dark:text-black-400">{{$act->description ?? ''}}</p>
    <div class="flex pt-[12px] justify-end align-center absolute right-[10px] top-[5px]">
        <button data-modal-target="update-activity-modal-{{$act->id}}" data-modal-toggle="update-activity-modal-{{$act->id}}">
            <img src="{{asset('assets/images/global/pencil.svg')}}" alt="" class="mr-[12px] cursor-pointer">
        </button>
        <form action="{{route('activity.delete', $act->id)}}" method="POST" class="mt-[4px]">
            @csrf
            @method('DELETE')
            <button>
                <img src="{{asset('assets/images/global/trash.svg')}}" alt="" class="cursor-pointer">
            </button>
        </form>
    </div>
    @include('components.activity.kindergarten.update-activity-modal')

</a>
