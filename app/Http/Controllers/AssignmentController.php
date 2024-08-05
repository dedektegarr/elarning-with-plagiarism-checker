<?php

namespace App\Http\Controllers;

use App\Models\Topic;
use Illuminate\Http\Request;

class AssignmentController extends Controller
{
    public function show(Topic $topic)
    {
        $users = $topic->subject->users->filter(function ($user) {
            return $user->role === 'student';
        });

        return view('pages.assignment.show', ['title' => 'Tugas: ' . $topic->name, 'students' => $users, 'topic' => $topic]);
    }
}
