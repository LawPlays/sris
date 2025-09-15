@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-sky-100 py-10">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <!-- Welcome Section -->
        <div class="mb-10">
            <h1 class="text-3xl font-bold text-gray-900 tracking-tight">
                Welcome back, {{ Auth::user()->name }} 🎓
            </h1>
            <p class="mt-2 text-gray-700">Here’s your personalized student dashboard overview.</p>
        </div>

        <!-- Dashboard Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            
            <!-- Enrollment Status -->
            <div class="bg-white shadow-lg rounded-2xl p-6 border border-gray-100 hover:shadow-xl transition duration-200">
                <div class="flex items-center mb-4">
                    <div class="p-3 bg-blue-100 text-blue-600 rounded-full">
                        <i class="fas fa-user-check"></i>
                    </div>
                    <h2 class="ml-3 text-xl font-semibold text-gray-800">Enrollment Status</h2>
                </div>
                @if(isset($student) && $student->isEnrolled())
                    <p class="text-green-600 font-medium">✅ You are currently enrolled this semester.</p>
                @else
                    <p class="text-red-600 font-medium">❌ You are not enrolled yet.</p>
                    <a href="{{ route('student.enrollment.create') }}"
                       class="mt-4 inline-block bg-blue-600 text-white px-5 py-2.5 rounded-lg shadow hover:bg-blue-700 transition">
                        Enroll Now
                    </a>
                @endif
            </div>

            <!-- Subjects -->
            <div class="bg-white shadow-lg rounded-2xl p-6 border border-gray-100 hover:shadow-xl transition duration-200">
                <div class="flex items-center mb-4">
                    <div class="p-3 bg-green-100 text-green-600 rounded-full">
                        <i class="fas fa-book"></i>
                    </div>
                    <h2 class="ml-3 text-xl font-semibold text-gray-800">My Subjects</h2>
                </div>
                @if(isset($subjects) && $subjects->count() > 0)
                    <ul class="list-disc pl-6 text-gray-700 space-y-1">
                        @foreach($subjects as $subject)
                            <li>{{ $subject->code }} - {{ $subject->name }}</li>
                        @endforeach
                    </ul>
                @else
                    <p class="text-gray-500">No subjects enrolled yet.</p>
                @endif
            </div>

            <!-- Announcements -->
            <div class="bg-white shadow-lg rounded-2xl p-6 border border-gray-100 hover:shadow-xl transition duration-200">
                <div class="flex items-center mb-4">
                    <div class="p-3 bg-yellow-100 text-yellow-600 rounded-full">
                        <i class="fas fa-bullhorn"></i>
                    </div>
                    <h2 class="ml-3 text-xl font-semibold text-gray-800">Announcements</h2>
                </div>
                @if(isset($announcements) && $announcements->count() > 0)
                    <div class="space-y-4">
                        @foreach($announcements as $announcement)
                            <div class="border-b pb-3">
                                <h3 class="font-semibold text-gray-800">{{ $announcement->title }}</h3>
                                <p class="text-sm text-gray-600">{{ $announcement->body }}</p>
                            </div>
                        @endforeach
                    </div>
                @else
                    <p class="text-gray-500">No announcements at the moment.</p>
                @endif
            </div>

        </div>
    </div>
</div>

<!-- FontAwesome for icons -->
<script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
@endsection
