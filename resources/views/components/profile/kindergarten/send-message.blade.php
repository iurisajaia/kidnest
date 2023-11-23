<div class="w-full md:w-5/12 border border-gray-200 rounded-lg shadow px-4 py-4">
    <form method="POST" action="{{route('user.send.message')}}">
        @csrf
        <label for="message" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">{{__('your.message')}}</label>
        <textarea id="message" rows="4" name="text" class="block mt-2 p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 h-[450px] resize-none" placeholder="{{__('message.placeholder')}}"></textarea>
        <div class="text-right">
            <button
                class="outline-0 font-bold rounded-lg border text-[#fff] d-flex align-center justify-center bg-black py-[6px] px-[12px] mt-3">
                {{__('send')}}
            </button>
        </div>
    </form>
</div>
