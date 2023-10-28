<div id="staff-modal" tabindex="-1" aria-hidden="true"
     class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative w-full max-w-md max-h-full shadow bg-[#fff] rounded-lg">
        <!-- Modal content -->
        <div class="relative rounded-lg">
            <div class="px-6 py-6 lg:px-8">
                <h3 class="mb-4 text-xl font-medium">{{__('add.personal')}}</h3>
                <form class="space-y-6" action="{{route('staff.store')}}" method="POST">
                    @csrf
                    @include('components.global.input.standard', ['placeholder' => __('name'), 'name' => 'firstname'])
                    @include('components.global.input.standard', ['placeholder' => __('lastname'), 'name' => 'lastname'])
                    @include('components.global.input.standard', ['placeholder' => __('private.number'), 'name' => 'private_number'])
                    @include('components.global.input.standard', ['placeholder' => __('email'), 'name' => 'email'])
                    @include('components.global.input.standard', ['placeholder' => __('password'), 'name' => 'password'])
                    <select name="user_role_id" id="user_role_id"
                            class="bg-gray-50 border border-gray-300 text-black-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  dark:text-black dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        <option selected>{{__('position')}}</option>
                        @foreach($positions as $position)
                            <option value="{{$position['id']}}">{{__($position['key'])}}</option>
                        @endforeach
                    </select>

                    <input type="hidden" name="group_id" value="{{$group->id}}">

                    <div class="flex justify-end">
                        <div data-modal-hide="staff-modal">
                            @include('components.global.button.dark', ['label' => __('cancel'), 'width' => '90px', 'height' => '36px'])
                        </div>
                        @include('components.global.button.yellow', ['label' => __('save'), 'width' => '90px', 'height' => '36px', 'type' => 'submit'])
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
