<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap"
        rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
</head>

<body class="relative font-roboto">
    <div class="flex flex-col min-h-screen w-full">
        <!-- header-->
        <div class="h-20 fixed w-full z-10">
            @include('navigation-menu')
        </div>

        <!--main -->
        <div class="flex mt-20 flex-col min-h-full flex-grow bg-gray-100">
            {{ $slot }}
        </div>
        <!--footer-->
        <div class="py-16 font-roboto border-t">
            @include('layouts.footer')
        </div>
    </div>
    @livewireScripts

</body>

</html>
