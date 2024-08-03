@extends('layouts.main')

@section('authentication')
    <div class="w-full max-w-sm mx-auto dark:bg-gray-800 bg-white p-6 rounded-xl shadow-lg">
        <h2 class="text-gray-900 dark:text-white text-xl sm:text-2xl font-bold mb-8 text-center">Register</h2>

        <livewire:register-form />
    </div>
@endsection
