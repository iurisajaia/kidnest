<div class="relative">
    <label for="{{$name ?? 'KidNest'}}" class="absolute font-normal bg-[#fff] text-[14px] md:text-[16px] text-gray-500 dark:text-gray-400 duration-500 transform -translate-y-4 scale-75  z-10 origin-[0]
    peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-1 peer-focus:scale-75 peer-focus:-translate-y-4 left-[15px]  md:left-[20px]">
        {{$placeholder ?? 'KidNest'}}
    </label>
    <input type="{{$type ?? 'text'}}" id="{{$name ?? 'KidNest'}}"  name="{{$name ?? 'KidNest'}}" value="{{$value ?? ''}}"
           {{isset($disabled) ? 'disabled' : ''}}
           {{isset($required) ? 'required' : ''}}
           class="block py-[17.5px] px-[15px] md:py-[19px] md:px-[20px] w-full text-sm text-gray-900 bg-transparent rounded-lg border-[1px] border-[#ECECEC] appearance-none  focus:outline-none focus:ring-0 focus:border-blue-600 peer"  />
{{--    placeholder="{{$placeholder}}"--}}
</div>
@error($name ?? 'KidNest')
<span class="text-red">{{ $message }}</span>
@enderror
