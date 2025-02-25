<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use app\Models\Student;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       Student::create([
            'name' => 'John Doe',
            'email' => 'john.doe@example.com',
            'age' => 20,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

      Student::create([
            'name' => 'Jane Smith',
            'email' => 'jane.smith@example.com',
            'age' => 22,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

     Student::create([
            'name' => 'Alice Johnson',
            'email' => 'alice.johnson@example.com',
            'age' => 21,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
