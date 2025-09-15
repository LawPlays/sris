@extends('layouts.app')

@section('content')
<div class="max-w-5xl mx-auto p-6">

    <!-- Form Title -->
    <div class="text-center mb-8">
        <h2 class="text-3xl font-bold">Basic Education Enrollment Form</h2>
    </div>

    <div class="bg-white p-6 shadow-sm rounded-lg">

        @if ($errors->any())
            <div class="mb-4 text-red-600">
                <ul class="list-disc list-inside">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('student.enrollment.store') }}" method="POST">
            @csrf

            <!-- School Info & Type -->
            <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 mb-6 items-center">
                <div>
                    <label class="block mb-1 font-semibold">School Year</label>
                    <input type="text" name="school_year" class="w-full border rounded p-2" placeholder="YYYY-YYYY">
                </div>
                <div class="flex items-center space-x-2 mt-6 sm:mt-0">
                    <input type="checkbox" name="with_lrn" value="1" id="with_lrn">
                    <label for="with_lrn" class="font-medium">With LRN</label>
                </div>
                <div class="flex items-center space-x-2 mt-6 sm:mt-0">
                    <input type="checkbox" name="returning_student" value="1" id="returning_student">
                    <label for="returning_student" class="font-medium">Returning (Balik-Aral)</label>
                </div>
            </div>

            <!-- Learner Name (centered for professional look) -->
            <h3 class="font-semibold text-lg mb-4 text-center">Learner's Full Name</h3>
            <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 mb-6 justify-items-center">
                <div class="w-full sm:w-80">
                    <input type="text" name="last_name" class="w-full border rounded p-2 text-center" placeholder="Last Name">
                </div>
                <div class="w-full sm:w-80">
                    <input type="text" name="first_name" class="w-full border rounded p-2 text-center" placeholder="First Name">
                </div>
                <div class="w-full sm:w-80">
                    <input type="text" name="middle_name" class="w-full border rounded p-2 text-center" placeholder="Middle Name">
                </div>
            </div>

            <!-- Other Learner Info -->
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-4 mb-4">
                <div>
                    <label class="block mb-1">LRN</label>
                    <input type="text" name="lrn" class="w-full border rounded p-2">
                </div>
                <div>
                    <label class="block mb-1">PSA Birth Certificate No.</label>
                    <input type="text" name="psa_no" class="w-full border rounded p-2">
                </div>
                <div>
                    <label class="block mb-1">Birthdate</label>
                    <input type="date" name="birthdate" class="w-full border rounded p-2">
                </div>
                <div>
                    <label class="block mb-1">Place of Birth</label>
                    <input type="text" name="place_of_birth" class="w-full border rounded p-2">
                </div>
            </div>

            <!-- Sex / IP / Contact Number -->
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-4 mb-4">
                <div>
                    <label class="block mb-1">Sex</label>
                    <select name="sex" class="w-full border rounded p-2">
                        <option value="">--Select--</option>
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                    </select>
                </div>
                <div>
                    <label class="block mb-1">Belonging to IP Community</label>
                    <select name="ip_community" class="w-full border rounded p-2">
                        <option value="">--Select--</option>
                        <option value="Yes">Yes</option>
                        <option value="No">No</option>
                    </select>
                </div>
                <div>
                    <label class="block mb-1">Contact Number</label>
                    <input type="text" name="contact_number" class="w-full border rounded p-2" placeholder="09XXXXXXXXX">
                </div>
            </div>

            <!-- 4Ps / PWD -->
            <div class="mb-4">
                <label class="inline-flex items-center mr-6">
                    <input type="checkbox" name="is_4ps_beneficiary" class="mr-2">
                    Family is a 4Ps Beneficiary
                </label>
                <label class="inline-flex items-center">
                    <input type="checkbox" name="is_pwd" class="mr-2">
                    Child is a Learner with Disability
                </label>
            </div>

            <!-- Disability Types -->
            <div class="mb-4 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-4">
                <div>
                    <label class="block font-semibold">Visual Impairment</label>
                    <label class="block"><input type="checkbox" name="disability_type[]" value="Blind"> Blind</label>
                    <label class="block"><input type="checkbox" name="disability_type[]" value="Low Vision"> Low Vision</label>
                </div>
                <div>
                    <label class="block font-semibold">Hearing / Speech / Language</label>
                    <label class="block"><input type="checkbox" name="disability_type[]" value="Hearing Impairment"> Hearing Impairment</label>
                    <label class="block"><input type="checkbox" name="disability_type[]" value="Speech/Language Disorder"> Speech/Language Disorder</label>
                </div>
                <div>
                    <label class="block font-semibold">Other Disabilities</label>
                    <label class="block"><input type="checkbox" name="disability_type[]" value="Learning Disability"> Learning Disability</label>
                    <label class="block"><input type="checkbox" name="disability_type[]" value="Autism Spectrum Disorder"> Autism Spectrum Disorder</label>
                    <label class="block"><input type="checkbox" name="disability_type[]" value="Intellectual Disability"> Intellectual Disability</label>
                    <label class="block"><input type="checkbox" name="disability_type[]" value="Emotional/Behavioral Disorder"> Emotional/Behavioral Disorder</label>
                    <label class="block"><input type="checkbox" name="disability_type[]" value="Special Health Condition"> Special Health Condition</label>
                    <label class="block"><input type="checkbox" name="disability_type[]" value="Cancer"> Cancer</label>
                </div>
            </div>

            <!-- Address -->
            <h3 class="font-semibold text-lg mb-4">Address</h3>
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 mb-4">
                <div>
                    <label class="block mb-1">Current Address</label>
                    <input type="text" name="current_address" class="w-full border rounded p-2" placeholder="House No., Street, Barangay">
                </div>
                <div>
                    <label class="block mb-1">City / Province</label>
                    <input type="text" name="province_city" class="w-full border rounded p-2">
                </div>
                <div>
                    <label class="block mb-1">Zip Code</label>
                    <input type="text" name="zip_code" class="w-full border rounded p-2">
                </div>
            </div>

            <div class="mb-6">
                <label class="block mb-1">Permanent Address</label>
                <input type="text" name="permanent_address" class="w-full border rounded p-2" placeholder="Same as Current Address?">
            </div>

            <!-- Parents / Guardian -->
            <h3 class="font-semibold text-lg mb-4">Parent/Guardian Information</h3>
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-4 mb-6">
                <div>
                    <label class="block mb-1">Father's Name</label>
                    <input type="text" name="father_name" class="w-full border rounded p-2">
                </div>
                <div>
                    <label class="block mb-1">Mother's Name</label>
                    <input type="text" name="mother_name" class="w-full border rounded p-2">
                </div>
                <div>
                    <label class="block mb-1">Guardian's Name</label>
                    <input type="text" name="guardian_name" class="w-full border rounded p-2">
                </div>
            </div>

            <!-- Submit -->
            <div class="text-center">
                <button type="submit" class="bg-blue-600 text-white px-6 py-2 rounded hover:bg-blue-700">
                    Submit Enrollment
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
