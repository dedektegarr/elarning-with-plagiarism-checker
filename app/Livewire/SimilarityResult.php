<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\On;

class SimilarityResult extends Component
{
    public $similarityResults;
    public $topic;
    public $results;

    #[On('result-updated')]
    public function mount()
    {
        $this->results = $this->similarityResults;
    }

    public function render()
    {
        return view('livewire.similarity-result');
    }
}
