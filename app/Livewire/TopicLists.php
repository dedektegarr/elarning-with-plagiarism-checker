<?php

namespace App\Livewire;

use App\Models\Subject;
use App\Models\Topic;
use Livewire\Component;
use Livewire\Attributes\On;

class TopicLists extends Component
{
    public $subjectId;
    public $topics;

    public function deleteTopic($id)
    {
        Topic::where('topic_id', $id)->delete();

        $this->dispatch('topics-updated');
        flash('Topik berhasil dihapus');
    }

    #[On('topics-updated')]
    public function mount()
    {
        $subject = Subject::where('subject_id', $this->subjectId)->first();

        $this->topics = $subject->topics->sortByDesc('created_at');
    }

    public function render()
    {
        return view('livewire.topic-lists');
    }
}
