<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="dark">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ $title }} | {{ config('app.name') }}</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
</head>

<body class="bg-gray-50 dark:bg-gray-900">
    @if (auth()->check())
        @include('layouts.partials.navbar')
        @include('layouts.partials.sidebar')

        <div class="p-4 sm:ml-64 mt-16 sm:mt-14">
            @include('layouts.partials.breadcrumb')

            <h1 class="capitalize text-xl font-semibold text-gray-900 sm:text-2xl dark:text-white">{{ $title }}
            </h1>

            <main class="mt-6">
                @yield('content')
            </main>
        </div>
    @else
        <main class="min-h-screen flex justify-center items-center w-full">
            @yield('authentication')
        </main>
    @endif

    </div>

    @livewireScripts
</body>

</html>
