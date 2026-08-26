<?php
// database/seeders/InitialDataSeeder.php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Profile;
use App\Models\Organigram;
use App\Models\Service;
use App\Models\Facility;
use App\Models\News;
use Illuminate\Support\Facades\Hash;

class InitialDataSeeder extends Seeder
{
    public function run(): void
    {
        // 1. Buat Admin User
        $admin = User::firstOrCreate(
            ['email' => 'admin@blud.com'],
            [
                'name' => 'Admin Utama',
                'password' => Hash::make('password123'),
                'role' => 'admin',
                'is_active' => true,
            ]
        );

        // 2. Buat Profile
        $profile = Profile::firstOrCreate(
            ['user_id' => $admin->id],
            [
                'institution_name' => 'BLUD SMKN 2 Purwakarta',
                'institution_type' => 'Sekolah Menengah Kejuruan',
                'address' => 'Jl. Jendral A. Yani No. 98',
                'city' => 'Purwakarta',
                'province' => 'Jawa Barat',
                'postal_code' => '41111',
                'phone' => '(0264) 200157',
                'email' => 'info@smkn2purwakarta.sch.id',
                'website' => 'www.smkn2purwakarta.sch.id',
                'established_year' => 1995,
                'legal_basis' => 'Perda No. 5 Tahun 2020',
                'vision' => 'Menjadi pusat keunggulan pendidikan vokasi yang mandiri, inovatif, dan berdaya saing global.',
                'mission' => 'Menyelenggarakan pembelajaran berbasis proyek yang relevan dengan kebutuhan industri.',
                'description' => 'SMKN 2 Purwakarta berdiri sejak tahun 1995 dan telah menjadi BLUD sejak tahun 2020.',
            ]
        );

        // 3. Buat Organigram
        $kepala = Organigram::firstOrCreate(
            ['profile_id' => $profile->id, 'position' => 'Kepala Sekolah'],
            [
                'name' => 'Budi Santoso',
                'department' => 'Direktur Utama',
                'description' => 'NIP: 19700101 199503 1 001',
                'order_number' => 1,
            ]
        );

        Organigram::firstOrCreate(
            ['profile_id' => $profile->id, 'position' => 'Wakil Direktur Akademik'],
            [
                'name' => 'Dra. Siti Aminah, M.Pd.',
                'department' => 'Akademik',
                'parent_id' => $kepala->id,
                'description' => 'NIP: 19750202 200003 2 002',
                'order_number' => 2,
            ]
        );

        Organigram::firstOrCreate(
            ['profile_id' => $profile->id, 'position' => 'Wakil Direktur Keuangan'],
            [
                'name' => 'Andi Wijaya, S.E.',
                'department' => 'Keuangan',
                'parent_id' => $kepala->id,
                'description' => 'NIP: 19800303 200501 1 003',
                'order_number' => 3,
            ]
        );

        // 4. Buat Layanan Contoh
        Service::firstOrCreate(
            ['name' => 'Jasa Pembuatan Website'],
            [
                'profile_id' => $profile->id,
                'category' => 'Jasa Produksi',
                'description' => 'Pembuatan website dan desain website profesional untuk kebutuhan bisnis dan instansi.',
                'price' => 1500000,
                'duration' => '7 Hari',
                'is_online' => true,
                'status' => 'active',
            ]
        );

        Service::firstOrCreate(
            ['name' => 'Sewa Aula Pertemuan'],
            [
                'profile_id' => $profile->id,
                'category' => 'Penyewaan',
                'description' => 'Fasilitas gedung pertemuan kapasitas 500 orang untuk berbagai acara.',
                'price' => 500000,
                'duration' => 'Per Hari',
                'is_online' => false,
                'status' => 'active',
            ]
        );

        // 5. Buat Fasilitas Contoh
        Facility::firstOrCreate(
            ['name' => 'Lapangan Sekolah'],
            [
                'profile_id' => $profile->id,
                'category' => 'Olahraga',
                'description' => 'Fasilitas olahraga standar nasional yang dapat disewa untuk berbagai turnamen dan acara.',
                'location' => 'Kampus Utama, Sektor Timur',
                'capacity' => '500 Orang',
                'status' => 'available',
            ]
        );

        Facility::firstOrCreate(
            ['name' => 'Laboratorium Komputer Terpadu'],
            [
                'profile_id' => $profile->id,
                'category' => 'Laboratorium',
                'description' => 'Ruang praktikum dengan 30 unit PC spesifikasi tinggi untuk kebutuhan desain grafis dan programming.',
                'location' => 'Gedung B, Lantai 2',
                'capacity' => '30 Orang',
                'status' => 'available',
            ]
        );

        // 6. Buat Berita Contoh
        News::firstOrCreate(
            ['title' => 'Pendaftaran Program Pelatihan Vokasi Batch 4'],
            [
                'profile_id' => $profile->id,
                'content' => '<p>Segera daftarkan diri Anda untuk mengikuti program pelatihan vokasi batch 4 di BLUD SMKN 2 Purwakarta. Program ini dirancang untuk meningkatkan keterampilan dan daya saing tenaga kerja.</p>',
                'category' => 'Pengumuman',
                'status' => 'published',
                'published_at' => now(),
                'created_by' => $admin->id,
            ]
        );

        News::firstOrCreate(
            ['title' => 'Perubahan Jadwal Layanan Publik Selama Bulan Ramadan'],
            [
                'profile_id' => $profile->id,
                'content' => '<p>Informasi mengenai penyesuaian jam operasional layanan publik selama bulan Ramadan. Mohon perhatikan jadwal yang telah diperbarui.</p>',
                'category' => 'Informasi',
                'status' => 'published',
                'published_at' => now(),
                'created_by' => $admin->id,
            ]
        );

        $this->command->info('Data awal berhasil dibuat!');
    }
}