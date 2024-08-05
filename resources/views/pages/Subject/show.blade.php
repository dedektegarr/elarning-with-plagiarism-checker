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
                    id="assignment-tab" data-tabs-target="#assignment" type="button" role="tab"
                    aria-controls="assignment" aria-selected="false">Tugas</button>
            </li>
            <li class="me-2" role="presentation">
                <button
                    class="inline-block p-4 border-b-2 rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300"
                    id="student-tab" data-tabs-target="#student" type="button" role="tab" aria-controls="student"
                    aria-selected="false">Mahasiswa</button>
            </li>
        </ul>
    </div>

    <div id="default-tab-content">
        <div class="hidden p-4 rounded-lg bg-gray-50 dark:bg-gray-800" id="topic" role="tabpanel"
            aria-labelledby="topic-tab">
            <p class="text-sm text-gray-500 dark:text-gray-400">This is some placeholder content the <strong
                    class="font-medium text-gray-800 dark:text-white">Profile tab's associated content</strong>.
                Clicking
                another tab will toggle the visibility of this one for the next. The tab JavaScript swaps classes to
                control
                the content visibility and styling.</p>
        </div>
        <div class="hidden p-4 rounded-lg bg-gray-50 dark:bg-gray-800" id="assignment" role="tabpanel"
            aria-labelledby="assignment-tab">
            <p class="text-sm text-gray-500 dark:text-gray-400">This is some placeholder content the <strong
                    class="font-medium text-gray-800 dark:text-white">Dashboard tab's associated content</strong>.
                Clicking
                another tab will toggle the visibility of this one for the next. The tab JavaScript swaps classes to
                control
                the content visibility and styling.</p>
        </div>
        <div class="hidden p-4 rounded-lg bg-gray-50 dark:bg-gray-800" id="student" role="tabpanel"
            aria-labelledby="student-tab">
            <h1>Hello</h1>
        </div>
    </div>
@endsection
