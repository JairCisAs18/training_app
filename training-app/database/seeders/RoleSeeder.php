<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $adminRole = Role::create(['name' => 'Administrator']);
        $rhRole = Role::create(['name' => 'RH']);
        $traineeRole = Role::create(['name' => 'Trainee']);
        $adminUser = User::where('employee_id', '242501')->first();
        $rhUser = User::where('employee_id', '242502')->first();
        $traineeUser = User::where('employee_id', '242503')->first();
        $adminUser ->assignRole($adminRole);
        $rhUser -> assignRole($rhRole);
        $traineeUser ->assignrole($traineeRole);
    }
}
