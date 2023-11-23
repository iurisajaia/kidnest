<div class="w-full border border-gray-200 rounded-lg shadow mt-10">
    <form method="POST" action="{{route('user.password.update')}}"
          class="flex w-full h-auto flex-col items-center bg-[#fff] rounded-[16px] mt-[20px] p-6"
    >
        @csrf
        @method('PUT')
        <div class="w-full gap-[16px]">
            <div class="pb-4">
                @include('components.global.input.standard', [
                    'placeholder' => __('new.password'),
                    'place' => '************',
                    'name' => 'password',
                    'type' => 'password',
                    'icon' => 'assets/images/user/eye.svg'
                    ])
                @error('password')
                <span>{{$message}}</span>
                @enderror
            </div>
            <div class="pb-4">
                @include('components.global.input.standard', [
                    'placeholder' => __('confirm.password'),
                    'place' => '************',
                    'name' => 'password_confirmation',
                    'type' => 'password',
                    'icon' => 'assets/images/user/eye-closed.svg'
                    ])
                @error('password_confirmation')
                <span>{{$message}}</span>
                @enderror
            </div>
        </div>
        <div class="flex items-center justify-end w-full mt-[24px]">
            <button
                class="outline-0 font-bold rounded-lg border text-[#fff] d-flex align-center justify-center bg-black py-[6px] px-[12px]">
                {{__('update')}}
            </button>
        </div>
    </form>
</div>
