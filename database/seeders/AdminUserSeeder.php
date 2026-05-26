<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::updateOrCreate(
            ['email' => 'admin@cardy.com'],
            [
                'name' => 'Administrador',
                'role_id' => 1,
                'password' => Hash::make('secret123'),
                'email_verified_at' => now(),
                'created_at' => now(),
                'updated_at' => now(),
            ]
        );
    }
}
