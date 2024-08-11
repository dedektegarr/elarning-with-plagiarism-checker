<?php

namespace App\Livewire;

use App\Helpers\PDFService;
use App\Models\Submission;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\Attributes\Validate;

class UploadSubmission extends Component
{
    use WithFileUploads;

    public $topic;

    #[Validate('required|mimes:pdf')]
    public $file;

    public function updated($property)
    {
        $this->validateOnly($property, [
            'file' => ['required', 'mimes:pdf']
        ]);
    }

    public function uploadSubmission(PDFService $pdfService)
    {
        $pathname = $this->file->getPathname();

        // Parsing Doc's Metadata
        $parseMetadata = $pdfService->parseMetadata($pathname);

        $metadata = [
            'title' => $parseMetadata['Title'] ?? null,
            'author' => $parseMetadata['Author'] ?? null,
            'pages' => $parseMetadata['Pages'] ?? null,
            'subject' => $parseMetadata['Subject'] ?? null,
            'creator' => $parseMetadata['Creator'] ?? null,
            'producer' => $parseMetadata['Producer'] ?? null,
            'creation_date' => $parseMetadata['CreationDate'] ?? null,
            'mod_date' => $parseMetadata['ModDate']
        ];

        // Preprocess document words
        $metadata['word_tokens'] = $pdfService->preprocessDocument($pathname);

        // Upload file and get pathname
        $uploadedFile = $pdfService->uploadPdf($this->file);

        // Store submission
        $submission = Submission::create([
            'topic_id' => $this->topic->topic_id,
            'user_id' => Auth::user()->user_id,
            'file' => $uploadedFile
        ]);

        // store metadata
        $submission->metadata()->create($metadata);

        flash('Tugas berhasil di upload', 'success');
        return redirect()->route('submission.index');
    }

    public function render()
    {
        return view('livewire.upload-submission');
    }
}
