<div class='w-[358px] md:w-[344px] py-[16px] px-[20px] border-gray-800 rounded-2xl shadow '>
    <div class='flex items-center justify-between h-[80px]'>
        <div class='flex items-center justify-center rounded-full w-[48px] h-[48px] bg-[#DFE3E8] mr-[16px]'>
            <h2 class='text-[14px] text-[#637381] font-semibold '>
                {{ $loop->index + 1}}
            </h2>
        </div>
        <div class='w-1/2 mr-[24px]'>
            <h2 class='text-[14px] font-semibold text-[#212B36]'>{{$branch->title}}</h2>

            <p class='text-xs text-gray-400 font-normal flex mt-[4px]'>
                <img src="{{asset('assets/images/global/rocket-launch.svg')}}" class="mr-[4px] w-[16px] h-[16px]"/>
                {{$branch->kids_count}} {{__('kid')}}
            </p>
        </div>
        <div>
            <a href="{{route('branches.show', $branch->id)}}" class="border border-[#919EAB] px-[8px] py-[4px] rounded-[8px] hover:bg-black hover:text-[#fff] font-bold transition-300">
                {{__('sign.in')}}
            </a>
            <div class="flex pt-[9px] justify-end align-center">
                <button data-modal-target="branch-modal-{{$branch->id}}" data-modal-toggle="branch-modal-{{$branch->id}}">
                    <img src="{{asset('assets/images/global/pencil.svg')}}" alt="" class="mr-[12px] cursor-pointer">
                </button>
                <form action="{{route('branches.delete', $branch->id)}}" method="POST" class="mt-[4px]">
                    @csrf
                    @method('DELETE')
                    <button>
                        <img src="{{asset('assets/images/global/trash.svg')}}" alt="" class="cursor-pointer">
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
