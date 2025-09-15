<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Reports & Summary</h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 grid grid-cols-1 md:grid-cols-4 gap-6">
            <div class="bg-white p-6 shadow rounded-lg text-center">
                <div class="text-sm text-gray-500">Total Registered Students</div>
                <div class="text-3xl font-bold text-blue-600">{{ $totalStudents }}</div>
            </div>

            <div class="bg-white p-6 shadow rounded-lg text-center">
                <div class="text-sm text-gray-500">Pending Registrations</div>
                <div class="text-3xl font-bold text-yellow-500">{{ $pending }}</div>
            </div>

            <div class="bg-white p-6 shadow rounded-lg text-center">
                <div class="text-sm text-gray-500">Approved Registrations</div>
                <div class="text-3xl font-bold text-green-600">{{ $approved }}</div>
            </div>

            <div class="bg-white p-6 shadow rounded-lg text-center">
                <div class="text-sm text-gray-500">Total Enrollments</div>
                <div class="text-3xl font-bold text-indigo-600">{{ $totalEnrollments }}</div>
            </div>
        </div>
    </div>
</x-app-layout>
