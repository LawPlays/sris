<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Student;

class StudentSeeder extends Seeder
{
    public function run(): void
    {
        Student::insert([
            [
                'first_name' => 'Juan',
                'last_name'  => 'Dela Cruz',
                'birthdate'  => '2007-05-14',
                'gender'     => 'Male',
                'contact_number' => '09123456789',
                'address'    => 'Davao City',
                'strand_id'  => 1,
                'status'     => 'pending',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'first_name' => 'Maria',
                'last_name'  => 'Santos',
                'birthdate'  => '2006-03-22',
                'gender'     => 'Female',
                'contact_number' => '09987654321',
                'address'    => 'Tagum City',
                'strand_id'  => 2,
                'status'     => 'approved',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'first_name' => 'Jose',
                'last_name'  => 'Reyes',
                'birthdate'  => '2007-07-11',
                'gender'     => 'Male',
                'contact_number' => '09223334444',
                'address'    => 'Panabo City',
                'strand_id'  => 3,
                'status'     => 'rejected',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
