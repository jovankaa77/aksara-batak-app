<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    public function run(): void
    {
        if (app()->environment('local')) {
            User::updateOrCreate(
                ['email' => 'admin@gmail.com'],
                [
                    'name' => 'scss',
                    'password' => Hash::make('12345678'),
                    'role' => 'admin',
                ]
            );
        }
    }
}
