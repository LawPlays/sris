@extends('layouts.admin')

@section('content')
    <h2 class="font-semibold text-xl text-gray-800 leading-tight mb-6">Registered Students</h2>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white p-6 shadow rounded-lg overflow-x-auto">
                <table class="min-w-full border text-sm">
                    <thead class="bg-gray-100">
                        <tr>
                            <th class="px-4 py-2 border">ID</th>
                            <th class="px-4 py-2 border">Name</th>
                            <th class="px-4 py-2 border">Email</th>
                            <th class="px-4 py-2 border">Status</th>
                            <th class="px-4 py-2 border">Registered At</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($students as $student)
                        <tr class="text-center">
                            <td class="px-4 py-2 border">{{ $student->id }}</td>
                            <td class="px-4 py-2 border">
                                {{ ($student->first_name ?? $student->name ?? '') . ' ' . ($student->last_name ?? '') }}
                            </td>
                            <td class="px-4 py-2 border">{{ $student->email ?? '—' }}</td>
                            <td class="px-4 py-2 border">{{ ucfirst($student->status ?? 'pending') }}</td>
                            <td class="px-4 py-2 border">{{ $student->created_at->format('M d, Y') }}</td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="5" class="px-4 py-4 border text-gray-500">No students found.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
