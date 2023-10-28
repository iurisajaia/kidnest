<div id="branch-modal-{{$branch->id}}" tabindex="-1" aria-hidden="true" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative w-full max-w-md max-h-full shadow bg-[#fff] rounded-lg">
        <!-- Modal content -->
        <div class="relative rounded-lg">
            <div class="px-6 py-6 lg:px-8">
                <h3 class="mb-4 text-xl font-medium">{{__('update.branch')}}</h3>
                <form class="space-y-6" action="{{route('branches.update', $branch->id)}}" method="POST">
                    @csrf
                    @method('PUT')

                    @include('components.global.input.standard', ['placeholder' => __('title'), 'name' => 'title', 'value' => $branch->title])
                    @include('components.global.input.standard', ['placeholder' => __('kids.count'), 'name' => 'kids_count', 'value' => $branch->kids_count])
                    <div class="flex justify-end">
                        <div data-modal-hide="branch-modal-{{$branch->id}}">
                            @include('components.global.button.dark', ['label' => __('cancel'), 'width' => '90px', 'height' => '36px'])
                        </div>
                        <div>
                            @include('components.global.button.yellow', ['label' => __('save'), 'width' => '90px', 'height' => '36px', 'type' => 'submit'])
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
