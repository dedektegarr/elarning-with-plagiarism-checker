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
        return view('pages.subject.show', ['title' => $subject->name, 'subject' => $subject]);
    }
}
