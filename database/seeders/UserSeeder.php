<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Role;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Get roles
        $adminRole = Role::where('name', 'admin')->first();
        $guruRole = Role::where('name', 'guru')->first();
        $muridRole = Role::where('name', 'murid')->first();

        // Create sample users
        $users = [
            [
                'name' => 'Super Admin',
                'email' => 'admin@ailearning.com',
                'password' => Hash::make('password'),
                'role_id' => $adminRole->id,
            ],
            [
                'name' => 'Guru User',
                'email' => 'guru@ailearning.com',
                'password' => Hash::make('password'),
                'role_id' => $guruRole->id,
            ],
            [
                'name' => 'Murid User',
                'email' => 'murid@ailearning.com',
                'password' => Hash::make('password'),
                'role_id' => $muridRole->id,
            ],
        ];

        foreach ($users as $user) {
            User::create($user);
        }
    }
}