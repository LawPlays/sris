<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\Enrollment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EnrollmentController extends Controller
{
    /**
     * Show the enrollment form
     */
    public function create()
    {
        return view('student.enrollment.create');
    }

    /**
     * Store submitted enrollment data
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'last_name'          => 'required|string|max:255',
            'first_name'         => 'required|string|max:255',
            'middle_name'        => 'nullable|string|max:255',
            'birthdate'          => 'nullable|date',
            'place_of_birth'     => 'nullable|string|max:255',
            'sex'                => 'nullable|in:Male,Female',
            'ip_community'       => 'nullable|string|max:255',
            'is_4ps_beneficiary' => 'nullable|boolean',
            'is_pwd'             => 'nullable|boolean',
            'disability_type'    => 'nullable|string|max:255',
            'current_address'    => 'required|string|max:500',
            'permanent_address'  => 'nullable|string|max:500',
            'father_name'        => 'nullable|string|max:255',
            'mother_name'        => 'nullable|string|max:255',
            'guardian_name'      => 'nullable|string|max:255',
            'student_id'         => 'nullable|exists:students,id',
        ]);

        // Attach logged-in user
        $validated['user_id'] = Auth::id();

        // Convert checkboxes to booleans
        $validated['is_4ps_beneficiary'] = $request->has('is_4ps_beneficiary');
        $validated['is_pwd']             = $request->has('is_pwd');

        // Save to DB
        Enrollment::create($validated);

        return redirect()
            ->route('student.dashboard')
            ->with('success', 'Enrollment form submitted successfully!');
    }

    /**
     * Show documents submitted by the logged-in student
     */
    public function documents()
    {
        $enrollments = Enrollment::where('user_id', Auth::id())->get();

        return view('student.documents', compact('enrollments'));
    }
}
