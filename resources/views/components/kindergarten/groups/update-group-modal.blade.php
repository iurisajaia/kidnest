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
                    <select id="age" name="age_id" class="bg-gray-50 border border-gray-300 text-black-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  dark:text-black dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        <option>{{__('age.category')}}</option>
                        @foreach($ages as $age)
                            <option {{$group->age?->age === $age->age ? 'selected' : ''}} value="{{$age->id}}">{{$age->age}}</option>
                        @endforeach
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
