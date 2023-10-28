<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>KidNest</title>
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    @stack('styles')
</head>
<body>

{{--@env('production')--}}
{{--    <!-- Google tag (gtag.js) -->--}}
{{--    <script async src="https://www.googletagmanager.com/gtag/js?id=G-D3M34YB4Q4"></script>--}}
{{--    <script>--}}
{{--        window.dataLayer = window.dataLayer || [];--}}
{{--        function gtag(){dataLayer.push(arguments);}--}}
{{--        gtag('js', new Date());--}}

{{--        gtag('config', 'G-D3M34YB4Q4');--}}
{{--    </script>--}}
{{--@endenv--}}

<div class="app-container" style="background-image: url({{asset('assets/images/global/background.svg')}})">
        @include('components.global.header.index')
        @yield('content')
</div>

<script src="{{ asset('js/flowbite.min.js') }}"></script>

</body>
</html>
