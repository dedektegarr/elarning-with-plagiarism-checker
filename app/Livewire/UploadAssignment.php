<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;

class UploadAssignment extends Component
{
    use WithFileUploads;

    public $topic;
    public $file;

    public function uploadAssignment()
    {
        dd($this->file);
    }

    public function render()
    {
        return view('livewire.upload-assignment');
    }
}
