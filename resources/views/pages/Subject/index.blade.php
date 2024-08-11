@extends('layouts.main')

@section('content')
    <div class="flex items-center">
        @can('create-subject')
            <x-modal title="Buat Kelas" id="add-subject-modal" size="max-w-md">
                <livewire:subject-form />
            </x-modal>

            <button type="button" data-modal-target="add-subject-modal" data-modal-toggle="add-subject-modal" size="max-w-md"
                class="text-white mb-6 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-3 py-2.5 text-center inline-flex items-center me-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                <svg class="w-4 h-4 me-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                    fill="none" viewBox="0 0 24 24">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M5 12h14m-7 7V5" />
                </svg>

                Buat kelas
            </button>
        @endcan

        <x-modal title="Gabung Kelas" id="join-subject-modal" size="max-w-md">
            <livewire:join-subject-form />
        </x-modal>

        <button type="button" data-modal-target="join-subject-modal" data-modal-toggle="join-subject-modal"
            class="mb-6 px-3 py-2.5 text-center inline-flex items-center me-2 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">
            <svg class="w-4 h-4 me-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                fill="none" viewBox="0 0 24 24">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M5 12h14m-7 7V5" />
            </svg>

            Gabung kelas
        </button>

    </div>


    <livewire:subject-table />
@endsection
