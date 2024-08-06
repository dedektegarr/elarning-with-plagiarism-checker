<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;

use App\Models\User;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        $this->registerPolicies();

        // Subject
        Gate::define('create-subject', function (User $user) {
            return $user->role === 'teacher';
        });
        Gate::define('edit-subject', function (User $user) {
            return $user->role === 'teacher';
        });
        Gate::define('delete-subject', function (User $user) {
            return $user->role === 'teacher';
        });

        // Topics
        Gate::define('create-topic', function (User $user) {
            return $user->role === 'teacher';
        });
        Gate::define('delete-topic', function (User $user) {
            return $user->role === 'teacher';
        });

        // Submission
        Gate::define('upload-submission', function (User $user) {
            return $user->role === 'student';
        });
        Gate::define('view-submissions', function (User $user) {
            return $user->role === 'teacher';
        });
    }
}
