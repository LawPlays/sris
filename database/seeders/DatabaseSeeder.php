<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Tawagin lahat ng custom seeders mo dito
        $this->call([
            AdminSeeder::class,
            DepartmentSeeder::class,
            StrandSeeder::class,
            StudentSeeder::class,
        ]);
    }
}
