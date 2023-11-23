<div class="w-full border border-gray-200 rounded-lg shadow mb-[12px]">
    <div class="w-full p-5">
        <label>{{__('registration.address')}}</label>
        <input
            class="border-blue-500 border-solid border rounded py-2 px-4 mt-3 mb-4 w-full"
            type="text"
            placeholder="Enter some text"
            id="copyMe"
            value="{{$user->profileUrl()}}"
        />
        <div class="flex items-center justify-end w-full mt-[24px]">
            <button
                id="copyBtn"
                class="outline-0 font-bold rounded-lg border text-[#fff] d-flex align-center justify-center bg-black py-[6px] px-[12px]">
                {{__('copy')}}
            </button>
        </div>
    </div>
</div>
