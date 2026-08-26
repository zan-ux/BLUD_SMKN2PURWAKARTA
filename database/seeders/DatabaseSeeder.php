<?php
// database/seeders/DatabaseSeeder.php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Profile;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Create Admin User
        $user = User::create([
            'name' => 'Admin BLUD',
            'email' => 'admin@blud.com',
            'password' => Hash::make('password'),
            'role' => 'admin',
            'is_active' => true,
        ]);

        // Create Profile
        Profile::create([
            'user_id' => $user->id,
            'institution_name' => 'BLUD RSUD Kota Contoh',
            'institution_type' => 'Rumah Sakit Umum Daerah',
            'address' => 'Jl. Kesehatan No. 123',
            'city' => 'Jakarta',
            'province' => 'DKI Jakarta',
            'postal_code' => '12345',
            'phone' => '(021) 1234567',
            'email' => 'info@rsudcontoh.co.id',
            'website' => 'www.rsudcontoh.co.id',
            'established_year' => 2000,
            'legal_basis' => 'Perda No. 5 Tahun 2020',
            'vision' => 'Menjadi rumah sakit unggulan yang memberikan pelayanan kesehatan terbaik',
            'mission' => 'Memberikan pelayanan kesehatan yang berkualitas dan terjangkau bagi masyarakat',
            'description' => 'RSUD Kota Contoh adalah rumah sakit umum daerah yang menyediakan berbagai layanan kesehatan',
        ]);
    }
}