<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Enrollment Records</h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if(session('success'))
                <div class="mb-4 p-3 bg-green-100 text-green-800 rounded">{{ session('success') }}</div>
            @endif

            <div class="bg-white p-6 shadow rounded-lg overflow-x-auto">
                {{-- DEBUG: uncomment to inspect data if needed --}}
                {{-- <pre>{{ print_r($enrollments->toArray(), true) }}</pre> --}}

                <table class="min-w-full border text-sm">
                    <thead class="bg-gray-100">
                        <tr>
                            <th class="px-4 py-2 border">ID</th>
                            <th class="px-4 py-2 border">Student</th>
                            <th class="px-4 py-2 border">Birthdate</th>
                            <th class="px-4 py-2 border">Sex</th>
                            <th class="px-4 py-2 border">Status</th>
                            <th class="px-4 py-2 border">Submitted At</th>
                            <th class="px-4 py-2 border">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($enrollments as $enrollment)
                            <tr class="text-center">
                                <td class="px-4 py-2 border">{{ $enrollment->id }}</td>
                                <td class="px-4 py-2 border">
                                    {{ ($enrollment->first_name ?? $enrollment->name ?? '') . ' ' . ($enrollment->last_name ?? '') }}
                                </td>
                                <td class="px-4 py-2 border">{{ $enrollment->birthdate }}</td>
                                <td class="px-4 py-2 border">{{ $enrollment->sex }}</td>
                                <td class="px-4 py-2 border">
                                    <span class="px-2 py-1 rounded text-white {{ ($enrollment->status ?? 'pending') === 'approved' ? 'bg-green-500' : (($enrollment->status ?? 'pending') === 'rejected' ? 'bg-red-500' : 'bg-yellow-500') }}">
                                        {{ ucfirst($enrollment->status ?? 'pending') }}
                                    </span>
                                </td>
                                <td class="px-4 py-2 border">{{ $enrollment->created_at->format('M d, Y') }}</td>
                                <td class="px-4 py-2 border">
                                    <form method="POST" action="{{ route('admin.enrollments.approve', $enrollment) }}" style="display:inline">
                                        @csrf
                                        <button class="px-3 py-1 bg-green-600 text-white rounded hover:bg-green-700" type="submit">Approve</button>
                                    </form>

                                    <form method="POST" action="{{ route('admin.enrollments.reject', $enrollment) }}" style="display:inline" class="ms-2">
                                        @csrf
                                        <button class="px-3 py-1 bg-red-600 text-white rounded hover:bg-red-700" type="submit">Reject</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="px-4 py-4 border text-gray-500">No enrollments found.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>
