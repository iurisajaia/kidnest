<div class="w-full md:w-6/12 border border-gray-200 rounded-lg shadow px-4 py-4">
    <form class="space-y-6" action="{{route('staff.store')}}" method="POST">
        @csrf
        <label for="message" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">{{__('add.manager')}}</label>
        @include('components.global.input.standard', ['placeholder' => __('name'), 'name' => 'firstname'])
        @include('components.global.input.standard', ['placeholder' => __('lastname'), 'name' => 'lastname'])
        @include('components.global.input.standard', ['placeholder' => __('private.number'), 'name' => 'private_number'])
        @include('components.global.input.standard', ['placeholder' => __('email'), 'name' => 'email'])
        @include('components.global.input.standard', ['placeholder' => __('password'), 'name' => 'password'])
        <input type="hidden" name="staff_position_id" value={{5}}>
        <button
            class="outline-0 font-bold rounded-lg border text-[#fff] d-flex align-center justify-center bg-black py-[6px] px-[12px] mt-3">
            {{__('send')}}
        </button>
    </form>
</div>
