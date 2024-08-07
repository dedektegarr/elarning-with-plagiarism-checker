<?php

namespace App\Livewire;

use Livewire\Component;

class SubmissionDetails extends Component
{
    public $submission;

    public function render()
    {
        return view('livewire.submission-details');
    }
}
