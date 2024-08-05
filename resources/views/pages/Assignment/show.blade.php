@extends('layouts.main')

@section('content')
    <ul class="max-w-lg mx-auto divide-y divide-gray-200 dark:divide-gray-700">
        @foreach ($students as $student)
            <li class="">
                <a href="">
                    <div class="flex items-center space-x-4 rtl:space-x-reverse hover:bg-gray-800 p-4 rounded-md">
                        <div class="flex-shrink-0">
                            <img class="w-8 h-8 rounded-full" src="{{ asset('/static/default-pfp.jpg') }}"
                                alt="{{ $student->name }}">
                        </div>
                        <div class="flex-1 min-w-0">
                            <p class="capitalize text-sm font-medium text-gray-900 truncate dark:text-white">

                                {{ $student->name }}

                            </p>
                            <p class="uppercase text-sm text-gray-500 truncate dark:text-gray-400">
                                {{ $student->username }}
                            </p>
                        </div>
                        <div class="inline-flex items-center text-sm font-medium text-gray-900 dark:text-green-600">
                            Turned in
                        </div>
                    </div>
                </a>
            </li>
        @endforeach
    </ul>
@endsection
