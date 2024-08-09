@extends('layouts.main')

@section('content')
    <livewire:submission-details :submission="$submission" />

    @if ($submission->similarityResults->count())
        <section id="test">
            <livewire:similarity-result :similarityResults="$submission->similarityResults" />
        </section>
    @endif
@endsection
