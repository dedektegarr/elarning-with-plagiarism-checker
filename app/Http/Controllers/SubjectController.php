<?php

namespace App\Http\Controllers;

class SubjectController extends Controller
{
    public function index()
    {
        return view('pages.subject.index', ['title' => 'Kelas Saya']);
    }
}
