<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>KidNest</title>
    @stack('styles')

    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/fonts.css') }}">
    @stack('scripts')

</head>

<body>

@include('components.global.header.index')
<div class="flex">
    @include('components.global.sidebar.index')

    <div class="w-full">
        @if (Session::has('success'))
            <div
                class="p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400 absolute right-[20px] fade-out"
                role="alert">
                <span class="font-medium">{{ Session::get('success') }}</span>
            </div>
        @endif
        @if (Session::has('error'))
            <div
                class="p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400 absolute right-[20px] fade-out"
                role="alert">
                <span class="font-medium">{{ Session::get('error') }}</span>
            </div>
        @endif
        <div class="px-4 pt-4 sm:px-[88px] sm:py-[40px]">
            @yield('user')
        </div>
    </div>
</div>

<script src="{{ asset('js/flowbite.min.js') }}"></script>
<script src="{{ asset('js/bootstrap.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.8.1/datepicker.min.js"></script>

</body>

</html>
