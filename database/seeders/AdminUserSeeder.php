<?php
// database/seeders/AdminUserSeeder.php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    public function run(): void
    {
        // Cek apakah admin sudah ada
        $adminExists = User::where('email', 'admin@blud.com')->exists();

        if (!$adminExists) {
            User::create([
                'name' => 'Admin Utama',
                'email' => 'admin@blud.com',
                'password' => Hash::make('password123'),
                'role' => 'admin',
                'is_active' => true,
            ]);
            
            $this->command->info('Admin user berhasil dibuat!');
            $this->command->info('Email: admin@blud.com');
            $this->command->info('Password: password123');
        } else {
            $this->command->info('Admin user sudah ada, tidak perlu dibuat ulang.');
        }
    }
}