<?php

namespace App\Livewire;

use App\Models\Subject;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class JoinSubjectForm extends Component
{
    public $subjects;
    public $subject_id;

    public function joinSubject()
    {
        $validated = $this->validate([
            'subject_id' => 'required'
        ]);

        $user = User::where('user_id', Auth::user()->user_id)->first();
        $user->subjects()->attach($validated['subject_id']);

        $this->dispatch('subject-updated');
        flash('Berhasil bergabung');
    }

    public function mount()
    {
        $subjects = Subject::with('users')->latest()->get()->filter(function ($subject) {
            return !$subject->users->contains('user_id', Auth::user()->user_id);
        });

        $this->subjects = $subjects;
    }

    public function render()
    {
        return view('livewire.join-subject-form');
    }
}
