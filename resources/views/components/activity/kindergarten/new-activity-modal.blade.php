<div id="new-activity-modal-{{$group->id}}" tabindex="-1" aria-hidden="true" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative w-full max-w-md max-h-full shadow bg-[#fff] rounded-lg">
        <!-- Modal content -->
        <div class="relative rounded-lg">
            <div class="px-6 py-6 lg:px-8">
                <h3 class="mb-4 text-xl font-medium">{{__('new.activity')}} - {{$group->title}}</h3>
                <form class="space-y-6" action="{{route('activity.store')}}" method="POST">
                    @csrf
                    <div id="activities">
                        <div class="new-activity-item">
                            @include('components.global.input.standard', ['placeholder' => __('activity'), 'name' => 'title'])
                            <div class="mt-[6px]">
                                @include('components.global.input.standard', ['placeholder' => __('description'), 'name' => 'description'])
                            </div>
                        </div>
                    </div>

                    <input type="hidden" name="group_id" value="{{$group->id}}">

                    <div class="flex justify-end">
                        <div data-modal-hide="new-activity-modal-{{$group->id}}">
                            @include('components.global.button.dark', ['label' => __('cancel'), 'width' => '90px', 'height' => '36px'])
                        </div>
                        @include('components.global.button.yellow', ['label' => __('save'), 'width' => '90px', 'height' => '36px', 'type' => 'submit'])
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

