@extends('layouts.main')

@section('content')
    <div class="mb-4 border-b border-gray-200 dark:border-gray-700">
        <ul class="flex flex-wrap -mb-px text-sm font-medium text-center" id="default-tab"
            data-tabs-toggle="#default-tab-content" role="tablist">
            <li class="me-2" role="presentation">
                <button class="inline-block p-4 border-b-2 rounded-t-lg" id="topic-tab" data-tabs-target="#topic"
                    type="button" role="tab" aria-controls="topic" aria-selected="false">Topik</button>
            </li>
            <li class="me-2" role="presentation">
                <button
                    class="inline-block p-4 border-b-2 rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300"
                    id="student-tab" data-tabs-target="#student" type="button" role="tab" aria-controls="student"
                    aria-selected="false">Mahasiswa
                    <span
                        class="inline-flex items-center justify-center w-2 h-2 p-2 ms-1 text-xs font-medium text-blue-800 bg-blue-100 rounded-full dark:bg-blue-900
                         dark:text-blue-300">{{ $student_count }}</span></button>
            </li>
        </ul>
    </div>

    <div id="default-tab-content">
        <div class="hidden" id="topic" role="tabpanel" aria-labelledby="topic-tab">
            <x-modal title="Buat Topik" id="add-topic-modal">
                <livewire:topic-form :subjectId="$subject->subject_id" />
            </x-modal>

            @can('create-topic')
                <button type="button" data-modal-target="add-topic-modal" data-modal-toggle="add-topic-modal"
                    class="text-white mb-6 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-3 py-2.5 text-center inline-flex items-center me-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                    <svg class="w-4 h-4 me-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24"
                        height="24" fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M5 12h14m-7 7V5" />
                    </svg>

                    Buat topik
                </button>
            @endcan

            <livewire:topic-lists :subjectId="$subject->subject_id" />
        </div>
        <div class="hidden" id="student" role="tabpanel" aria-labelledby="student-tab">
            <livewire:student-table :subject="$subject" />
        </div>
    </div>
@endsection
