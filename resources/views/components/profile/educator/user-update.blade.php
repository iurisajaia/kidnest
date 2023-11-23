<div class="w-full border border-gray-200 rounded-lg shadow mt-10">
    <form method="POST" action="{{route('user.update')}}"
          class="flex w-full h-auto flex-col items-center bg-[#fff] rounded-[16px] mt-[20px] p-6"
    >
        @csrf
        @method('PUT')
        <div class="flex w-full gap-[16px] flex-wrap sm:flex-nowrap">
            <div class="w-full sm:w-3/6">
                <div class="pb-4">
                    @include('components.global.input.standard', ['placeholder' => __('phone.number'), 'name' => 'user_data[phone_number]', 'value' => $user?->user_data['phone_number'] ?? ''])
                    @error('phone_number')
                    <span>{{$message}}</span>
                    @enderror
                </div>
                <div class="pb-4">
                    @include('components.global.input.standard', ['placeholder' => __('address'), 'name' => 'user_data[address]', 'value' => $user?->user_data['address'] ?? ''])
                    @error('address')
                    <span>{{$message}}</span>
                    @enderror
                </div>
            </div>
            <div class="w-full sm:w-3/6">
                <div class="pb-4">
                    @include('components.global.input.standard', ['placeholder' => __('email'), 'name' => 'email', 'value' => $user?->email])
                    @error('email')
                    <span>{{$message}}</span>
                    @enderror
                </div>
            </div>
        </div>
        <div class="flex items-center justify-end w-full mt-[24px]">
            <button
                class="outline-0 font-bold rounded-lg border text-[#fff] d-flex align-center justify-center bg-black py-[6px] px-[12px]">
                {{__('save')}}
            </button>
        </div>

    </form>
</div>
