<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\StudentRegistration;
use App\Models\Enrollment;

class ReportController extends Controller
{
    public function dashboard()
    {
        $totalStudents = StudentRegistration::count();
        $pending = StudentRegistration::where('status', 'pending')->count();
        $approved = StudentRegistration::where('status', 'approved')->count();
        $totalEnrollments = Enrollment::count();

        return view('admin.reports.dashboard', compact(
            'totalStudents','pending','approved','totalEnrollments'
        ));
    }
}
