<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Role;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        // ADMIN
        $admin = User::firstOrCreate(
            ['email' => 'admin@invoice.test'],
            [
                'name' => 'Administrator',
                'password' => Hash::make('password')
            ]
        );

        $adminRole = Role::where('name', 'admin')->first();
        $admin->roles()->syncWithoutDetaching([$adminRole->id]);

        // USER BIASA
        $user = User::firstOrCreate(
            ['email' => 'user@invoice.test'],
            [
                'name' => 'User Invoice',
                'password' => Hash::make('password')
            ]
        );

        $userRole = Role::where('name', 'user')->first();
        $user->roles()->syncWithoutDetaching([$userRole->id]);
    }
}