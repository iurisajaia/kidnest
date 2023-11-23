<div class="w-full border border-gray-200 rounded-lg shadow flex items-center justify-center flex-col h-[393px]">
    <div class="flex items-center cursor-pointer justify-center w-[144px] h-[144px] relative rounded-full border-2 border-brand-100 relative">
        <div class="absolute flex flex-col items-center">
            <img src="{{asset('assets/images/user/camera.svg')}}" alt="" class="w-[32px] h-[32px]"/>
            <h3 class="text-center text-[12px] text-[#fff]">{{__('upload.photo')}}</h3>
        </div>
        <label for="file">
            <div class="flex items-center justify-center w-[160px] h-[160px] rounded-full border border-dashed border-[#919eab] border-opacity-20">
                @if (empty($user->getFirstMediaUrl('avatar', 'thumb')))
                    <img class="w-[144px] h-[144px] cursor-pointer rounded-full" src="{{asset('assets/images/global/avatar.svg')}}" alt="" />
                @else
                    <img class="w-[144px] h-[144px] object-cover cursor-pointer rounded-full" src="{{$user->getFirstMediaUrl('avatar', 'thumb')}}" alt="" />
                @endif
            </div>
        </label>

        <form action="{{route('user.update.image')}}" method="POST" enctype="multipart/form-data" id="avatarForm">
            @method('PUT')
            @csrf
            <input id="file"
                   class="absolute w-full h-full"
                   ref="file"
                   type="file"
                   name="avatar"
                   accept="image/*" style=" visibility: hidden;"/>
        </form>
    </div>
    <button class="mt-[24px] rounded-[8px] px-[6px] py-[12px] bg-[#f3c1c0] text-[#EE8886] text-[14px]">{{__('delete.profile')}}</button>
</div>
