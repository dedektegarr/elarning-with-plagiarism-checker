<?php

namespace App\Http\Controllers;

use App\Models\Subject;

class SubjectController extends Controller
{
    public function index()
    {
        return view('pages.subject.index', ['title' => 'Kelas Saya']);
    }

    public function show(Subject $subject)
    {
        $studentCount = $subject->users->filter(function ($user) {
            return $user->role === 'student';
        })->count();

        return view('pages.subject.show', ['title' => $subject->name, 'subject' => $subject, 'student_count' => $studentCount]);
    }
}
