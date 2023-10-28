<form
    class="bg-[#F8F8F8] rounded-[40px] py-[65px] px-[16px] w-full md:w-[508px]  md:p-[50px] md:py-[97px] md:px-[51px]"
    method="POST" action="{{ route('register') }}">
    @csrf
    <div class="flex items-center mt-[15px] md:mt-[20px]">
        <a href="{{ url()->previous() }}">
            <img class="w-[20px] h-[20px]" src="{{ asset('assets/images/global/arrow-left.svg') }}" alt="welcome"/>
        </a>
        <h2 class="text-[#444] text-[24px] ml-[20px] font-bold  md:text-[24px]">{{__('sign.up')}}</h2>
    </div>
    <div class="mt-[17px] md:mt-[30px]">
        @include('components.global.input.standard', ['placeholder' => __('name'), 'name' => 'name'])
    </div>
    <div class="mt-[16px] md:mt-[10px]">
        @include('components.global.input.standard', ['placeholder' => __('lastname'), 'name' => 'lastname'])
    </div>
    <div class="mt-[16px] md:mt-[10px]">
        @include('components.global.input.standard', [
            'placeholder' => __('phone.number'),
            'name' => 'phone_number',
        ])
    </div>
    <div class="mt-[16px] md:mt-[10px]">
        @include('components.global.input.standard', [
            'placeholder' => __('kid.private.number'),
            'name' => 'kid_private_number',
        ])
    </div>
    <div class="mt-3 rounded-lg border-[1px] border-[#ECECEC] p-4">
        @foreach(\App\Enums\UserStatusEnum::getValues() as $status)
            @include('components.global.input.radio', [
                'label' => $status,
                'name' => 'status',
                'id' => $status,
            ])
        @endforeach
    </div>
    <div class="mt-3">
        @include('components.global.input.standard', [
            'type' => 'email',
            'placeholder' => __('email'),
            'name' => 'email',
        ])
    </div>
    <div class="mt-[16px] md:mt-[10px]">
        @include('components.global.input.standard', [
            'type' => 'password',
            'placeholder' => __('password'),
            'name' => 'password',
        ])
    </div>
    <div class="mt-[16px] md:mt-[10px]">
        @include('components.global.input.standard', [
            'type' => 'password',
            'placeholder' => __('confirm.password'),
            'name' => 'password_confirmation',
        ])
    </div>
    <div class="mt-[20px]">
        @include('components.global.input.checkbox', [
            'value' => __('confirm.terms'),
            'name' => 'remember-me',
        ])
    </div>

    <input type="hidden" name="kindergarten_id" value="{{$id}}">

    <div class="flex flex-col-reverse">
        <div class="mt-[20px]  ">
            <span class="text-lightgrey ">
                {{__('already.have.account')}}
                <div class="block md:inline-block">
                    <span>{{__('go')}}</span>
                    <a href="{{ route('login') }}" class="text-yellowDark ml-1">
                        {{__('login')}}
                    </a>
                </div>
            </span>
        </div>
        <div class="mt-[31px] md:mt-[40px]">
            @include('components.global.button.standard', ['type' => 'submit', 'label' => __('sign.up')])
        </div>
    </div>

</form>
@push('styles')
    <style>
        .app-container {
            height: 100%;
        }
    </style>
@endpush
