<?php

namespace App\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\Attributes\On;
use Livewire\WithPagination;

class SubjectTable extends Component
{
    use WithPagination;

    #[On('subject-created')]
    public function render()
    {
        $user = User::where('user_id', Auth::user()->user_id)->first();
        $userSubjects = $user->subjects->map(function ($subject) {
            $subject->teachers = $subject->users->filter(function ($user) {
                return $user->role === 'teacher';
            });

            $subject->student_count = $subject->users->count() - $subject->teachers->count();

            return $subject;
        })->sortByDesc('created_at');

        return view('livewire.subject-table', ['subjects' => $userSubjects]);
    }
}
