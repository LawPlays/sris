@extends('layouts.admin')

@section('content')
    <h2 class="font-semibold text-xl text-gray-800 leading-tight mb-6">
        {{ __('Admin Dashboard') }}
    </h2>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        <div class="bg-white p-6 rounded-lg shadow">
            <div class="text-sm text-gray-500">Total Students</div>
            <div class="text-3xl font-semibold">{{ $total }}</div>
        </div>
        <div class="bg-white p-6 rounded-lg shadow">
            <div class="text-sm text-gray-500">Pending</div>
            <div class="text-3xl font-semibold">{{ $pending }}</div>
        </div>
        <div class="bg-white p-6 rounded-lg shadow">
            <div class="text-sm text-gray-500">Approved</div>
            <div class="text-3xl font-semibold">{{ $approved }}</div>
        </div>
    </div>
@endsection
