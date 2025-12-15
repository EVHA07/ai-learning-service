<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $roles = [
            [
                'name' => 'admin',
                'display_name' => 'Administrator',
                'description' => 'Full access to all features',
            ],
            [
                'name' => 'guru',
                'display_name' => 'Guru',
                'description' => 'Can manage courses and view students',
            ],
            [
                'name' => 'murid',
                'display_name' => 'Murid',
                'description' => 'Can enroll in courses and view own progress',
            ],
        ];

        foreach ($roles as $role) {
            Role::create($role);
        }
    }
}
