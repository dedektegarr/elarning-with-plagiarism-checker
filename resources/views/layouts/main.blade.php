<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="dark">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ config('app.name') }}</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gray-50 dark:bg-gray-800">
    @include('layouts.partials.navbar')
    @include('layouts.partials.sidebar')
    <div class="p-4 sm:ml-64 mt-16 sm:mt-14">
        @include('layouts.partials.breadcrumb')
        <h1 class="text-xl font-semibold text-gray-900 sm:text-2xl dark:text-white">Dashboard</h1>
    </div>



    </div>
</body>

</html>
