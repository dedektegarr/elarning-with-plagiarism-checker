<?php

namespace App\Http\Controllers;

use App\Models\User;

class SubjectController extends Controller
{
    public function index()
    {
        $user = User::where('user_id', auth()->user()->user_id)->first();
        $userSubjects = $user->subjects->map(function ($subject) {
            $subject->teachers = $subject->users->filter(function ($user) {
                return $user->role === 'teacher';
            });

            $subject->student_count = $subject->users->count() - $subject->teachers->count();

            return $subject;
        });

        return view('pages.subject.index', ['title' => 'Kelas Saya', 'subjects' => $userSubjects]);
    }
}
