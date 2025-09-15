<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\Enrollment;
use App\Models\Student;
use App\Models\Subject;
use App\Models\Announcement;

class DashboardController extends Controller
{
    public function index()
    {
        // Kunin yung naka-login na user
        $student = Student::where('user_id', Auth::id())->first();

        // Kung may record na student, kunin subjects nya, else empty collection
        $subjects = $student && method_exists($student, 'subjects')
            ? $student->subjects
            : collect();

        // Kunin latest 5 announcements
        $announcements = Announcement::latest()->take(5)->get();

        // I-pass lahat sa view
        return view('student.dashboard', compact(
            'student',
            'subjects',
            'announcements'
        ));
    }
}
