<?php

namespace App\Livewire;

use App\Models\Topic;
use Livewire\Component;

class TopicForm extends Component
{
    public $name;
    public $subjectId;

    public function addTopic()
    {
        $validated = $this->validate([
            'name' => 'required'
        ]);

        Topic::create([
            'subject_id' => $this->subjectId,
            'name' => $validated['name']
        ]);

        flash('Topik berhasil dibuat', 'success');
        $this->dispatch('topics-updated');
        $this->reset(['name']);
    }

    public function render()
    {
        return view('livewire.topic-form');
    }
}
