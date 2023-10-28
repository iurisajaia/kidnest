@if(isset($user->kids) && count($user->kids))
    @foreach($user->kids as $kid)
        <div class="w-full md:w-6/12 border border-gray-200 rounded-lg shadow">
            <h3 class="pl-6 pt-4">{{__('kid')}}</h3>
            <form method="POST" action="{{route('kids.update', $kid->id)}}"
                  class="flex w-full h-auto flex-col items-center bg-[#fff] rounded-[16px] mt-[20px] p-6"
            >
                @csrf
                @method('PUT')
                <div class="flex w-full gap-[16px] flex-wrap sm:flex-nowrap">
                    <div class="w-full sm:w-3/6">
                        <div class="pb-4">
                            @include('components.global.input.standard', ['placeholder' => __('name'), 'name' => 'first_name', 'value' => $kid?->first_name])
                            @error('first_name')
                            <span>{{$message}}</span>
                            @enderror
                        </div>
                        <div class="pb-4">
                            @include('components.global.input.standard', ['placeholder' => __('private.number'), 'name' => 'private_number', 'value' => $kid?->private_number])
                            @error('private_number')
                            <span>{{$message}}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="w-full sm:w-3/6">
                        <div class="pb-4">
                            @include('components.global.input.standard', ['placeholder' => __('lastname'), 'name' => 'last_name', 'value' => $kid?->last_name])
                            @error('last_name')
                            <span>{{$message}}</span>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="p-4 mb-4 text-sm text-blue-800 w-full rounded-lg bg-blue-50 dark:bg-gray-800 dark:text-blue-400" role="alert">
                    <span class="font-medium">{{__('kindergarten')}} - </span> {{$kid?->kinderGarten?->name ?? 'არ არის არჩეული'}}
                </div>
                <div class="p-4 mb-4 text-sm w-full text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400" role="alert">
                    <span class="font-medium">{{__('branch')}} -</span> {{$kid?->branch?->title ?? 'არ არის არჩეული'}}
                </div>
                <div class="p-4 mb-4 text-sm w-full text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400" role="alert">
                    <span class="font-medium">{{__('group')}} -</span> {{$kid?->group?->title ?? 'არ არის არჩეული'}}
                </div>
                <div class="flex items-center justify-end w-full mt-[24px]">
                    <button
                        class="outline-0 font-bold rounded-lg border text-[#fff] d-flex align-center justify-center bg-black py-[6px] px-[12px]">
                        {{__('save')}}
                    </button>
                </div>

            </form>
        </div>
    @endforeach
@endif
