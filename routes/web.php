<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController as AdminDashboard;
use App\Http\Controllers\Admin\StudentController as AdminStudentController;
use App\Http\Controllers\Admin\EnrollmentController as AdminEnrollmentController;
use App\Http\Controllers\Admin\ReportController as AdminReportController;
use App\Http\Controllers\Student\DashboardController as StudentDashboard;
use App\Http\Controllers\Student\EnrollmentController as StudentEnrollmentController;
use App\Http\Controllers\StudentRegistrationController;
use App\Http\Controllers\ProfileController;

// ---------------- Profile routes ----------------
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// ---------------- Root route ----------------
Route::get('/', function () {
    if (auth()->check()) {
        if (auth()->user()->role === 'admin') {
            return redirect()->route('admin.dashboard');
        }
        return redirect()->route('student.dashboard');
    }
    return redirect()->route('login');
});

// ---------------- Unified /dashboard route ----------------
Route::get('/dashboard', function () {
    if (!auth()->check()) {
        return redirect()->route('login');
    }

    if (auth()->user()->role === 'admin') {
        return redirect()->route('admin.dashboard');
    }

    return redirect()->route('student.dashboard');
})->middleware(['auth'])->name('dashboard');

// ---------------- Student routes ----------------
Route::middleware(['auth'])
    ->prefix('student')
    ->name('student.')
    ->group(function () {
        // Dashboard
        Route::get('/dashboard', [StudentDashboard::class, 'index'])->name('dashboard');

        // Enrollment form routes
        Route::get('/enrollment', [StudentEnrollmentController::class, 'create'])->name('enrollment.create');
        Route::post('/enrollment', [StudentEnrollmentController::class, 'store'])->name('enrollment.store');

        // Documents page (points to controller)
        Route::get('/documents', [StudentEnrollmentController::class, 'documents'])->name('documents');
    });

// ---------------- Admin routes ----------------
Route::middleware(['auth'])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {
        // Dashboard
        Route::get('/dashboard', [AdminDashboard::class, 'index'])->name('dashboard');

        // Students list
        Route::get('/students', [AdminStudentController::class, 'index'])->name('students.index');

        // Enrollments list
        Route::get('/enrollments', [AdminEnrollmentController::class, 'index'])->name('enrollments.index');

        // Reports
        Route::get('/reports', [AdminReportController::class, 'dashboard'])->name('reports.dashboard');
    });

// ---------------- Public Student Registration ----------------
Route::prefix('register')->group(function () {
    Route::get('/student', [StudentRegistrationController::class, 'create'])->name('registration.create');
    Route::post('/student', [StudentRegistrationController::class, 'store'])->name('registration.store');
    Route::get('/thanks', [StudentRegistrationController::class, 'thanks'])->name('registration.thanks');
});

require __DIR__.'/auth.php';
