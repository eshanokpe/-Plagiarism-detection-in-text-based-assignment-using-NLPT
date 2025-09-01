<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AssignmentController;
use App\Http\Controllers\SubmissionController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\AdminLoginController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\LecturerLoginController;
use App\Http\Controllers\LecturerController;
use App\Http\Controllers\Auth\PasswordController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// Default login page (for students)
Route::get('/', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('login');
 
// Laravel's built-in auth routes for students
Auth::routes();

// Student Routes (requires user to be authenticated as a student)
Route::middleware(['auth'])->group(function () {
    Route::post('/password/update', [PasswordController::class, 'updatePassword'])->name('password.update');

    Route::get('/home', [HomeController::class, 'index'])->name('dashboard');
    Route::get('/assignments', [AssignmentController::class, 'index'])->name('assignments.index');
    Route::post('/assignments/store', [AssignmentController::class, 'store'])->name('assignments.store');
    
    Route::get('/assignments', [AssignmentController::class, 'index'])
    ->name('assignments.index');

    // POST route for saving/checking plagiarism (store)
    Route::post('/assignments/store', [AssignmentController::class, 'store'])
        ->name('assignments.store');

    Route::get('/assignments/{id}', [AssignmentController::class, 'index'])
    ->name('assignments.show');
    
    Route::get('/assignments/view', [AssignmentController::class, 'view'])->name('assignments.view');
    Route::get('/assignments/show/{id}', [AssignmentController::class, 'show'])->name('assignments.show');
    Route::get('/assignments/{id}/result', [AssignmentController::class, 'result'])->name('assignments.result');
    Route::post('/text-check', [AssignmentController::class, 'checkText'])->name('text.check');
    Route::post('/submission-store', [SubmissionController::class, 'store'])->name('submission.store');
    Route::get('/profile', [HomeController::class, 'profile'])->name('profile');
    Route::post('student/logout', [LoginController::class, 'logout'])->name('student.logout');
});

// Lecturer authentication routes
Route::prefix('lecturer')->group(function () {
    // Guest lecturer (not logged in)
    // Route::middleware(['lecturer.guest'])->group(function () {
        Route::get('/login', [LecturerLoginController::class, 'showLoginForm'])->name('lecturer.login');
        Route::post('/login', [LecturerLoginController::class, 'login'])->name('lecturer.login.submit');
    // });

    // Authenticated lecturer
    Route::middleware(['lecturer.auth'])->group(function () {
        Route::get('/dashboard', [LecturerController::class, 'dashboard'])->name('lecturer.dashboard');
        Route::get('/users', [LecturerController::class, 'users'])->name('lecturer.users.index');
        Route::get('/assignments', [LecturerController::class, 'assignments'])->name('lecturer.assignments.index');

        Route::get('/submissions/show/{id}', [LecturerController::class, 'show'])->name('lecturer.submissions.show');
        Route::get('/delete/{id}', [LecturerController::class, 'deleteSubmit'])->name('lecturer.submissions.delete');
    });

    // Logout route (doesn't require middleware)
    Route::post('/logout', [LecturerLoginController::class, 'logout'])->name('lecturer.logout');
});
  
Route::prefix('admin')->group(function () {
    // Guest admin (not logged in)

    Route::get('/login', [AdminLoginController::class, 'showLoginForm'])->name('admin.login');
    Route::post('/login', [AdminLoginController::class, 'login'])->name('admin.login.submit');
   
    // Authenticated admin 
    Route::middleware(['admin.auth'])->group(function () {
        Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard.index');
        Route::get('/users', [AdminController::class, 'users'])->name('admin.users.index');
        Route::post('/users/store', [AdminController::class, 'usersStore'])->name('admin.user.store');

        Route::get('/lectures', [AdminController::class, 'lectures'])->name('admin.lectures.index');
        Route::post('/store', [AdminController::class, 'lecturesStore'])->name('admin.lecturer.store');

        Route::get('/assignments', [AdminController::class, 'assignments'])->name('admin.assignments.index');

        Route::get('/submissions/show/{id}', [AdminController::class, 'showSubmission'])->name('admin.submissions.show');
        Route::get('/delete/{id}', [AdminController::class, 'deleteSubmit'])->name('admin.submissions.delete');
    });

    // Logout route (doesn't require middleware)
    Route::post('/logout', [AdminLoginController::class, 'logout'])->name('admin.logout');
});
