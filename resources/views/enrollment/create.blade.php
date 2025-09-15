<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl">Enrollment Form</h2>
    </x-slot>

    <form method="POST" action="{{ route('student.enrollment.store') }}" class="space-y-4">
        @csrf

        <div class="grid grid-cols-3 gap-4">
            <div>
                <label>Last Name</label>
                <input type="text" name="last_name" class="w-full border p-2" required>
            </div>
            <div>
                <label>First Name</label>
                <input type="text" name="first_name" class="w-full border p-2" required>
            </div>
            <div>
                <label>Middle Name</label>
                <input type="text" name="middle_name" class="w-full border p-2">
            </div>
        </div>

        <div class="grid grid-cols-2 gap-4">
            <div>
                <label>Birthdate</label>
                <input type="date" name="birthdate" class="w-full border p-2" required>
            </div>
            <div>
                <label>Place of Birth</label>
                <input type="text" name="place_of_birth" class="w-full border p-2" required>
            </div>
        </div>

        <div>
            <label>Sex</label>
            <select name="sex" class="w-full border p-2" required>
                <option value="">Select</option>
                <option value="Male">Male</option>
                <option value="Female">Female</option>
            </select>
        </div>
        <div>
            <label>IP Community</label>
            <input type="text" name="ip_community" class="w-full border p-2">
        </div>

        <div class="flex gap-4">
            <label><input type="checkbox" name="is_4ps_beneficiary"> 4Ps Beneficiary</label>
            <label><input type="checkbox" name="is_pwd"> PWD</label>
        </div>

        <div>
            <label>If PWD, specify disability</label>
            <input type="text" name="disability_type" class="w-full border p-2">
        </div>

        <div>
            <label>Current Address</label>
            <input type="text" name="current_address" class="w-full border p-2">
        </div>

        <div>
            <label>Permanent Address</label>
            <input type="text" name="permanent_address" class="w-full border p-2">
        </div>

        <div class="grid grid-cols-3 gap-4">
            <div>
                <label>Father's Name</label>
                <input type="text" name="father_name" class="w-full border p-2">
            </div>
            <div>
                <label>Mother's Name</label>
                <input type="text" name="mother_name" class="w-full border p-2">
            </div>
            <div>
                <label>Guardian's Name</label>
                <input type="text" name="guardian_name" class="w-full border p-2">
            </div>
        </div>

        <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded">Submit</button>
    </form>
</x-app-layout>
