@extends('layouts.main')

@section('content')
    <ul class="max-w-4xl mx-auto divide-y divide-gray-200 dark:divide-gray-700">
        @forelse ($topics as $topic)
            <li>
                <a href="{{ route('submission.show', $topic->topic_id) }}">
                    <div
                        class="flex items-center space-x-4 rtl:space-x-reverse hover:bg-gray-800 p-4 hover:shadow-lg rounded-md">
                        <div class="flex-shrink-0">
                            <div class="bg-blue-700 dark:bg-blue-700 rounded-full p-2 flex">
                                <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"
                                    viewBox="0 0 24 24">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M15 4h3a1 1 0 0 1 1 1v15a1 1 0 0 1-1 1H6a1 1 0 0 1-1-1V5a1 1 0 0 1 1-1h3m0 3h6m-3 5h3m-6 0h.01M12 16h3m-6 0h.01M10 3v4h4V3h-4Z" />
                                </svg>

                            </div>
                        </div>
                        <div class="flex-1 min-w-0">
                            <p class="uppercase text-base font-medium text-gray-900 truncate dark:text-white">
                                {{ $topic->name }} </p>
                            <div>
                                <p class="capitalize text-xs text-gray-500 truncate dark:text-gray-400">
                                    <span>{{ $topic->subject->name }}</span>
                                    <span>•</span>
                                    <span>{{ $topic->translated_date }}</span>
                                </p>
                            </div>
                        </div>
                        <div class="flex items-center text-2xl text-gray-900 dark:text-white gap-8">
                            @can('view-my-submissions')
                                @if ($topic->is_current_user_turned_in)
                                    <span
                                        class="inline-flex items-center bg-green-100 text-green-800 text-xs font-medium px-2.5 py-0.5 rounded-full dark:bg-green-900 dark:text-green-300">
                                        <span class="w-2 h-2 me-1 bg-green-500 rounded-full"></span>
                                        Turned In
                                    </span>
                                @else
                                    <span
                                        class="inline-flex items-center bg-red-100 text-red-800 text-xs font-medium px-2.5 py-0.5 rounded-full dark:bg-red-900 dark:text-red-300">
                                        <span class="w-2 h-2 me-1 bg-red-500 rounded-full"></span>
                                        Missing
                                    </span>
                                @endif
                            @endcan
                            @can('view-submissions')
                                <div class="group">
                                    <p class="font-medium group-hover:text-blue-500">{{ $topic->turned_in }}</p>
                                    <p class="text-xs text-gray-600 dark:text-gray-300 group-hover:text-blue-500">Turned In</p>
                                </div>
                                <div class="group">
                                    <p class="font-medium group-hover:text-blue-500">{{ $topic->assigned }}</p>
                                    <p class="text-xs text-gray-600 dark:text-gray-300 group-hover:text-blue-500">Assigned</p>
                                </div>
                            @endcan
                        </div>

                    </div>
                </a>
            </li>
        @empty
        @endforelse

    </ul>
@endsection
