<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Carbon\Carbon;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Jair Adalberto Cisneros Astello',
            'employee_id' => '242501',
            'email' => 'j_cisneros@mitsumi.mx',
            'phone_number' => '4442137811',
            'department' => 'IT',
            'birthdate' => '2001-06-18',
            'job_anniversary' => '2024-03-04',
            'password' => bcrypt('holamundo')
        ]);
        User::create([
            'name' => 'Juan Alberto Ramírez Acosta',
            'employee_id' => '242502',
            'email' => 'j_acosta@mitsumi.mx',
            'phone_number' => '4442457811',
            'department' => 'Recursos Humanos',
            'birthdate' => '1998-03-12',
            'job_anniversary' => '2020-01-16',
            'password' => bcrypt('holamundo')
        ]);
        User::create([
            'name' => 'María Hernández García',
            'employee_id' => '242503',
            'email' => 'm_hernandez@mitsumi.mx',
            'phone_number' => '4445637551',
            'department' => 'Compras',
            'birthdate' => '2000-05-25',
            'job_anniversary' => '2022-06-04',
            'password' => bcrypt('holamundo')
        ]);
    }
}
