<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('My Documents') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                @if($enrollments->isEmpty())
                    <p class="text-gray-500">You have not submitted any enrollment form yet.</p>
                @else
                    <table class="w-full border">
                        <thead>
                            <tr class="bg-gray-100">
                                <th class="p-2 border">Last Name</th>
                                <th class="p-2 border">First Name</th>
                                <th class="p-2 border">Submitted At</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($enrollments as $enrollment)
                                <tr>
                                    <td class="p-2 border">{{ $enrollment->last_name }}</td>
                                    <td class="p-2 border">{{ $enrollment->first_name }}</td>
                                    <td class="p-2 border">{{ $enrollment->created_at->format('Y-m-d') }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @endif
            </div>
        </div>
    </div>
</x-app-layout>
