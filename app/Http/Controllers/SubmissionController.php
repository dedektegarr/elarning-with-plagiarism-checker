<?php

namespace App\Http\Controllers;

use App\Models\Topic;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SubmissionController extends Controller
{
    public function show(Topic $topic)
    {
        $users = User::all()->filter(function ($user) {
            return $user->role === 'student';
        })->map(function ($user) use ($topic) {
            $user['isTurnedIn'] = $user->submissions
                ->filter(function ($submission) use ($topic) {
                    return $submission->topic_id === $topic->topic_id;
                })
                ->count() > 0;

            return $user;
        });

        $isCurrentUserTurnedIn = Auth::user()->submissions->filter(function ($submission) use ($topic) {
            return $submission->topic_id === $topic->topic_id;
        })->count() > 0;

        return view('pages.submission.show', ['title' => 'Tugas: ' . $topic->name, 'students' => $users, 'topic' => $topic, 'isCurrentUserTurnedIn' => $isCurrentUserTurnedIn]);
    }
}
