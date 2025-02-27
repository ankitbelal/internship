<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Student;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void  
    {
        Student::create([
        'name' => 'Alice Johnson',
        'email' => 'alice.johnson@example.com',
        'phone' => '1122334455',
        'address' => '789 Maple St, Sometown, USA',
        'created_at' => now(),
        'updated_at' => now()
        ]);

        Student::create([
        'name' => 'Bob Brown',
        'email' => 'bob.brown@example.com',
        'phone' => '2233445566',
        'address' => '101 Pine St, Anycity, USA',
        'created_at' => now(),
        'updated_at' => now()
        ]);

        Student::create([
        'name' => 'Charlie Davis',
        'email' => 'charlie.davis@example.com',
        'phone' => '3344556677',
        'address' => '202 Oak St, Newtown, USA',
        'created_at' => now(),
        'updated_at' => now()
        ]);

        Student::create([
        'name' => 'Diana Evans',
        'email' => 'diana.evans@example.com',
        'phone' => '4455667788',
        'address' => '303 Birch St, Oldtown, USA',
        'created_at' => now(),
        'updated_at' => now()
        ]);

        Student::create([
        'name' => 'Ethan Foster',
        'email' => 'ethan.foster@example.com',
        'phone' => '5566778899',
        'address' => '404 Cedar St, Smalltown, USA',
        'created_at' => now(),
        'updated_at' => now()
        ]);

        Student::create([
        'name' => 'Fiona Green',
        'email' => 'fiona.green@example.com',
        'phone' => '6677889900',
        'address' => '505 Spruce St, Bigcity, USA',
        'created_at' => now(),
        'updated_at' => now()
        ]);

        Student::create([
        'name' => 'George Harris',
        'email' => 'george.harris@example.com',
        'phone' => '7788990011',
        'address' => '606 Willow St, Uptown, USA',
        'created_at' => now(),
        'updated_at' => now()
        ]);

        Student::create([
        'name' => 'Hannah Irving',
        'email' => 'hannah.irving@example.com',
        'phone' => '8899001122',
        'address' => '707 Ash St, Downtown, USA',
        'created_at' => now(),
        'updated_at' => now()
        ]);
    }
}
