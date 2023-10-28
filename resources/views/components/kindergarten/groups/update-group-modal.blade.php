<div id="update-group-modal-{{$group->id}}" tabindex="-1" aria-hidden="true" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative w-full max-w-md max-h-full shadow bg-[#fff] rounded-lg">
        <!-- Modal content -->
        <div class="relative rounded-lg">
            <div class="px-6 py-6 lg:px-8">
                <h3 class="mb-4 text-xl font-medium">{{__('update.group')}}</h3>
                <form class="space-y-6" action="{{route('groups.update', $group->id)}}" method="POST">
                    @csrf
                    @method('PUT')
                    @include('components.global.input.standard', ['placeholder' => __('group.title'), 'name' => 'title', 'value' => $group->title])
                    <select id="age" name="age" class="bg-gray-50 border border-gray-300 text-black-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  dark:text-black dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        <option>{{__('age.category')}}</option>
                        <option {{$group->age === '0-1' ? 'selected' : ''}} value="0-1">0-1</option>
                        <option {{$group->age === '0-2' ? 'selected' : ''}} value="0-2">0-2</option>
                        <option {{$group->age === '1-2' ? 'selected' : ''}} value="1-2">1-2</option>
                        <option {{$group->age === '2-3' ? 'selected' : ''}} value="2-3">2-3</option>
                        <option {{$group->age === '3-4' ? 'selected' : ''}} value="3-4">3-4</option>
                        <option {{$group->age === '4-5' ? 'selected' : ''}} value="4-5">4-5</option>
                        <option {{$group->age === '5-6' ? 'selected' : ''}} value="5-6">5-6</option>
                    </select>
                    <input type="hidden" name="branch_id" value="{{$branchId}}">
                    <div class="flex justify-end">
                        <div data-modal-hide="update-group-modal-{{$group->id}}">
                            @include('components.global.button.dark', ['label' => __('cancel'), 'width' => '90px', 'height' => '36px'])
                        </div>
                        @include('components.global.button.yellow', ['label' => __('save'), 'width' => '90px', 'height' => '36px', 'type' => 'submit'])
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
