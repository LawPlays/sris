<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\StudentRegistration;

class DashboardController extends Controller
{
    public function index()
    {
        // Only show students that actually registered
        $total = StudentRegistration::count();
        $pending = StudentRegistration::where('status', 'pending')->count();
        $approved = StudentRegistration::where('status', 'approved')->count();

        return view('admin.dashboard', compact('total', 'pending', 'approved'));
    }
}
