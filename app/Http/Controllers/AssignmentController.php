<?php

namespace App\Http\Controllers;

use App\Models\Topic;
use Illuminate\Http\Request;

class AssignmentController extends Controller
{
    public function show(Topic $topic)
    {
        return view('pages.assignment.show', ['title' => 'Tugas: ' . $topic->name]);
    }
}
