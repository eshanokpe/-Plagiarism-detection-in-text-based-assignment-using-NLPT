<?php

namespace App\Providers;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Lecturer;
use App\Models\Submission;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        
        View::composer('*', function ($view) {
            $admin = Auth::user();

            $userCount = $lecturerCount = $submissionCount = 0;
            $users = collect();
            $lectures = collect();

            if (
                Schema::hasTable('users') &&
                Schema::hasTable('lecturers') &&
                Schema::hasTable('submissions')
            ) {
                $userCount = User::count();
                $lecturerCount = Lecturer::count();
                $submissionCount = Submission::count();
                $users = User::latest()->paginate(10);
                $lectures = Lecturer::latest()->paginate(10);
                $submissions = Submission::latest()->paginate(10);
            }

            $view->with(compact(
                'admin',
                'userCount',
                'lecturerCount',
                'submissionCount',
                'users',
                'lectures',
                'submissions'
            ));
        });
    }
}