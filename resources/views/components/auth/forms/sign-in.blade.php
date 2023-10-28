<form
    class="bg-[#F8F8F8] w-full mt-[-50px] md:mt-0 rounded-[40px] py-[65px] px-[16px] md:w-[508px]  md:p-[50px] md:py-[97px] md:px-[51px]"
    method="POST" action="{{ route('login') }}">
    @csrf
    <h2 class="text-textColor font-bold text-2xl m-0 md:text-[30px]">{{__('sign.in')}}</h2>
    <div class="mt-[34px] md:mt-[30px]">
        @include('components.global.input.standard', ['type' => 'email', 'placeholder' => __('email'), 'name' => 'email'])
        @error('email')
            <span class="text-red">{{ $message }}</span>
        @enderror
    </div>
    <div class="mt-[16px] md:mt-[10px]">
        @include('components.global.input.standard', ['type' => 'password', 'placeholder' => __('password'), 'name' => 'password'])
        @error('password')
            <span class="text-red">{{ $message }}</span>
        @enderror
    </div>
    <div class="flex items-center justify-between mt-[20px] mb-[31px] md:mb-[40px]">
        @include('components.global.input.checkbox', ['value' => __('remember.me'), 'name' => 'remember-me'])
        <a class="text-[#999] text-[12px] md:text-[14px] " href="/auth/forgot-password" class="text-lightgrey">
            {{__('forgot.password')}}
        </a>
    </div>
    <div class="md:flex gap-[40px] md:flex-col-reverse">
        <div>
            @include('components.global.button.standard', ['type' => 'submit', 'label' => __('sign.in')])
         </div>
    </div>

</form>
