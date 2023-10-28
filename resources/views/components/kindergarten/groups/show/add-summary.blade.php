<div id="add-summary-{{$kid->id}}" tabindex="-1" aria-hidden="true" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative w-full max-w-md max-h-full shadow bg-[#fff] rounded-lg">
        <!-- Modal content -->
        <div class="relative rounded-lg">
            <div class="px-6 py-6 lg:px-8">
                <h3 class="mb-4 text-xl font-medium">{{__('add.summary')}} - {{$kid->first_name}}</h3>
                <form class="space-y-6" action="{{route('kids.summary', $kid->id)}}" method="POST">
                    @csrf

                    @if($kid->summaryForToday())
                        <input type="hidden" name="summary_id" value="{{$kid->summaryForToday()->id}}">
                    @endif
                    <label for="message" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                        {{__('add.comment.about.kid')}}
                    </label>
                    <textarea
                        id="message"
                        name="text"
                        rows="4"
                        class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="{{__('add.comment.about.kid')}}">{{$kid->summaryForToday()?->text ?? ''}}</textarea>

                    <div class="flex justify-end">
                        <div data-modal-hide="add-summary-{{$kid->id}}">
                            @include('components.global.button.dark', ['label' => __('cancel'), 'width' => '90px', 'height' => '36px'])
                        </div>
                        @include('components.global.button.yellow', ['label' => __('save'), 'width' => '90px', 'height' => '36px', 'type' => 'submit'])
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
