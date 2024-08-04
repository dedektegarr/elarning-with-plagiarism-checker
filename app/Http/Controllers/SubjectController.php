<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SubjectController extends Controller
{
    public function index()
    {
        return view('pages.subject.index', ['title' => 'Kelas Saya']);
    }
}
