<div id="new-kid-modal" tabindex="-1" aria-hidden="true"
     class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative w-full max-w-md max-h-full shadow bg-[#fff] rounded-lg">
        <!-- Modal content -->
        <div class="relative rounded-lg">
            <div class="px-6 py-6 lg:px-8">
                <h3 class="mb-4 text-xl font-medium">{{__('new.kid')}}</h3>
                <form class="space-y-6" action="{{route('kids.store')}}" method="POST">
                    @csrf
                    @include('components.global.input.standard', ['placeholder' => __('name'), 'name' => 'first_name'])
                    @include('components.global.input.standard', ['placeholder' => __('lastname'), 'name' => 'last_name'])
                    @include('components.global.input.standard', ['placeholder' => __('private.number'), 'name' => 'private_number'])
{{--                    <div class="relative max-w-sm">--}}
{{--                        <div class="absolute inset-y-0 left-0 flex items-center pl-3.5 pointer-events-none">--}}
{{--                            <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">--}}
{{--                                <path d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z"/>--}}
{{--                            </svg>--}}
{{--                        </div>--}}
{{--                    <input datepicker type="text" placeholder="{{__('registration.date')}}" name="registration_date"--}}
{{--                           class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">--}}
{{--                    </div>--}}

                    <input type="hidden" name="group_id" value="{{$group->id}}">
                    <input type="hidden" name="branch_id" value="{{$group->branch_id}}">

                    <div class="flex justify-end">
                        <div data-modal-hide="authentication-modal">
                            @include('components.global.button.dark', ['label' => __('cancel'), 'width' => '90px', 'height' => '36px'])
                        </div>
                        @include('components.global.button.yellow', ['label' => __('save'), 'width' => '90px', 'height' => '36px', 'type' => 'submit'])
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@push('styles')
    <link rel="stylesheet" href="{{ asset('css/flowbite.min.css') }}">
@endpush
