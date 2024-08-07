@extends('layouts.main')

@section('content')
    @can('upload-submission')
        @if ($isCurrentUserTurnedIn)
            <div>
                <div class="p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-300"
                    role="alert">
                    Anda sudah mengumpulkan tugas pada topik ini!
                </div>
            </div>
        @else
            <div>
                <div class="p-4 mb-4 text-sm text-yellow-800 rounded-lg bg-yellow-50 dark:bg-gray-800 dark:text-yellow-300"
                    role="alert">
                    Anda belum mengumpulkan tugas pada topik ini!
                </div>

                <livewire:upload-submission :topic="$topic" />
            </div>
        @endif
    @endcan

    @can('view-submissions')
        <ul class="max-w-lg mx-auto divide-y divide-gray-200 dark:divide-gray-700">
            @forelse ($students as $student)
                <li class="">
                    <a href="{{ route('submission.student', [$topic->topic_id, $student->username]) }}">
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

                            @if ($student->isTurnedIn)
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
                        </div>
                    </a>
                </li>
            @empty
                <div class="p-4 rounded-lg bg-gray-50 dark:bg-gray-800">
                    <p class="text-sm text-gray-500 dark:text-gray-400 text-center">Tidak ada tugas</p>
                </div>
            @endforelse
        </ul>
    @endcan
@endsection
