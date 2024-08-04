<?php

namespace App\Livewire;

use App\Models\Subject;
use Livewire\Component;
use Livewire\Attributes\On;
use Illuminate\Support\Facades\Auth;

class SubjectForm extends Component
{
    public $name;
    public $code;

    public function addSubject()
    {
        $validated = $this->validate([
            'name' => 'required',
            'code' => 'required|alpha_dash:ascii|unique:subjects'
        ]);

        $subject = Subject::create($validated);

        $subject->users()->attach(Auth::user()->user_id);

        $this->dispatch('subject-updated');
        flash('Kelas berhasil dibuat', 'success');

        $this->reset(['name', 'code']);
    }

    public function render()
    {
        return view('livewire.subject-form');
    }
}
