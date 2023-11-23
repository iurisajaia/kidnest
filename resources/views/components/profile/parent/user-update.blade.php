<div class="w-full border  border-gray-200 rounded-lg shadow">
    <form method="POST" action="{{route('user.update')}}"
          class="flex w-full h-auto flex-col items-center bg-[#fff] rounded-[16px] mt-[20px] p-6"
    >
        @csrf
        @method('PUT')
        <div class="flex w-full gap-[16px] flex-wrap sm:flex-nowrap">
            <div class="w-full sm:w-3/6">
                <div class="pb-4">
                    @include('components.global.input.standard', ['placeholder' => __('name'), 'name' => 'name', 'value' => $user?->name])
                    @error('name')
                    <span>{{$message}}</span>
                    @enderror
                </div>
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
                    @include('components.global.input.standard', ['placeholder' => __('lastname'), 'name' => 'user_data[lastname]', 'value' => $user?->user_data['lastname'] ?? ''])
                    @error('lastname')
                    <span>{{$message}}</span>
                    @enderror
                </div>
                <div class="pb-4">
                    @include('components.global.input.standard', ['placeholder' => __('kid_private_number'), 'name' => 'user_data[kid_private_number]', 'value' => $user?->user_data['kid_private_number'] ?? ''])
                    @error('kid_private_number')
                    <span>{{$message}}</span>
                    @enderror
                </div>
                <div class="pb-4">
                    @include('components.global.input.standard', ['placeholder' => __('email'), 'name' => 'email', 'value' => $user?->email])
                    @error('email')
                    <span>{{$message}}</span>
                    @enderror
                </div>
                <div class="pb-4 rounded-lg border-[1px] border-[#ECECEC] p-4">
                    @include('components.global.input.radio', ['label' => 'mother', 'name' => 'status', 'id' => 'mother', 'value' => $user?->status])
                    @include('components.global.input.radio', ['label' => 'father', 'name' => 'status', 'id' => 'father', 'value' => $user?->status])
                    @include('components.global.input.radio', ['label' => 'sister/brother', 'name' => 'status', 'id' => 'sister/brother', 'value' => $user?->status])
                    @include('components.global.input.radio', ['label' => 'grandparent', 'name' => 'status', 'id' => 'grandparent', 'value' => $user?->status])
                    @error('status')
                    <span class="text-red">{{ $message }}</span>
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
