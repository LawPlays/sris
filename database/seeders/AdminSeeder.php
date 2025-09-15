<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    public function run(): void
    {
        User::updateOrCreate(
            ['email' => 'laurencemalanum56@gmail.com'],
            [
                'name' => 'Laurence Malanum',
                'password' => Hash::make('Aura.Law56'),
                'role' => 'admin',
            ]
        );
    }
}
