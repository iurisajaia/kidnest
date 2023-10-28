<div class="w-full md:w-6/12 border border-gray-200 rounded-lg shadow">
    <div class="w-full p-5">
        <label>{{__('registration.address')}}</label>
        <input
            class="border-blue-500 border-solid border rounded py-2 px-4 mt-3 mb-4 w-full"
            type="text"
            placeholder="Enter some text"
            id="copyMe"
            value="{{$user->profileUrl()}}"
        />
        <button
            class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 border border-blue-700 rounded w-full mb-3"
            id="copyBtn"
        >
            {{__('copy')}}
        </button>
        <p class="text-green-700"></p>

    </div>
</div>
