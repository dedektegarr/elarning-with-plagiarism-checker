<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\Attributes\Validate;

class UploadAssignment extends Component
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

    public function uploadAssignment()
    {
        dd($this->file);
    }

    public function render()
    {
        return view('livewire.upload-assignment');
    }
}
