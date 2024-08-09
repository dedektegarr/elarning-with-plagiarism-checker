<?php

namespace App\Livewire;

use Livewire\Component;

class SimilarityResult extends Component
{
    public $similarityResults;
    public $results;

    public function mount()
    {
        $this->results = $this->similarityResults;
    }

    public function render()
    {
        return view('livewire.similarity-result');
    }
}
