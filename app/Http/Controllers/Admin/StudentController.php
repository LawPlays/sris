<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

use App\Models\Enrollment;

class StudentController extends Controller
{
    public function index()
    {
        // kunin lahat ng users na student role
        $students = User::where('role', 'student')->latest()->get();
        $enrollment = Enrollment::where('user_id', auth()->id())->first();
        return view('admin.students.index', compact('students'));
    }
}
