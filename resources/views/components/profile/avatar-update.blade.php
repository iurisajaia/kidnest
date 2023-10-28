<div class="w-full md:w-5/12 border border-gray-200 rounded-lg shadow flex items-center justify-center">
    <div class="flex items-center cursor-pointer justify-center w-[144px] h-[144px] relative rounded-full border-2 border-brand-100">
        <label for="file">
            <div>
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
</div>
