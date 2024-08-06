@extends('layouts.main')

@section('content')
    <!-- Modal -->
    @can('create-subject')
        <x-modal title="Buat Kelas" id="add-subject-modal">
            <livewire:subject-form />
        </x-modal>

        <button type="button" data-modal-target="add-subject-modal" data-modal-toggle="add-subject-modal"
            class="text-white mb-6 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-3 py-2.5 text-center inline-flex items-center me-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
            <svg class="w-4 h-4 me-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                fill="none" viewBox="0 0 24 24">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M5 12h14m-7 7V5" />
            </svg>

            Buat kelas
        </button>
    @endcan

    <livewire:subject-table />
@endsection
