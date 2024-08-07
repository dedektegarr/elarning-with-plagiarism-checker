<?php

namespace App\Http\Controllers;

use App\Models\Submission;
use App\Models\Topic;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SubmissionController extends Controller
{
    public function index()
    {
        $topics = Auth::user()->subjects->flatMap(function ($subject) {
            return $subject->topics;
        });

        $topics = $topics->map(function ($topic) {
            $topic['translated_date'] = Carbon::parse($topic->created_at)->translatedFormat('j F Y');
            $topic['turned_in'] = User::where('role', 'student')->get()->filter(function ($user) use ($topic) {
                $turnedInUser = $user->submissions->filter(function ($submission) use ($topic) {
                    return $submission->topic_id === $topic->topic_id;
                });

                return $turnedInUser->count() > 0;
            })->count();
            $topic['assigned'] = $topic->subject->users->filter(function ($user) {
                return $user->role === 'student';
            })->count();

            // $topic['is_current_user_turned_in'] = $topic->submission?->user_id === Auth::user()->user_id;
            $topic['is_current_user_turned_in'] = Auth::user()->submissions->filter(function ($submission) use ($topic) {
                return $submission->topic_id === $topic->topic_id;
            })->count() > 0;

            return $topic;
        });

        return view('pages.submission.index', ['title' => 'Tugas Mahasiswa', 'topics' => $topics]);
    }

    public function show(Topic $topic)
    {
        $users = $topic->subject->users->filter(function ($user) {
            return $user->role === 'student';
        })->map(function ($user) use ($topic) {
            $user['isTurnedIn'] = $user->submissions
                ->filter(function ($submission) use ($topic) {
                    return $submission->topic_id === $topic->topic_id;
                })
                ->count() > 0;

            $user['submission_id'] = $user->submissions->filter(function ($submission) use ($user, $topic) {
                return ($submission->user_id === $user->user_id) && ($submission->topic_id === $topic->topic_id);
            })->map(fn ($submission) => $submission->submission_id)[0];

            return $user;
        });

        $isCurrentUserTurnedIn = Auth::user()->submissions->filter(function ($submission) use ($topic) {
            return $submission->topic_id === $topic->topic_id;
        })->count() > 0;

        return view('pages.submission.show', ['title' => 'Tugas: ' . $topic->name, 'students' => $users, 'topic' => $topic, 'isCurrentUserTurnedIn' => $isCurrentUserTurnedIn]);
    }

    public function studentSubmission(Submission $submission, $username)
    {
        $user = User::where('username', $username)->first();
        $submission->metadata->creation_date = Carbon::parse($submission->metadata->creation_date)->translatedFormat('j F Y');
        $submission->metadata->mod_date = Carbon::parse($submission->metadata->mod_date)->translatedFormat('j F Y');

        return view('pages.submission.details', ['title' => 'Tugas ' . $submission->topic->name . ': ' . $user->name, 'submission' => $submission]);
    }
}
