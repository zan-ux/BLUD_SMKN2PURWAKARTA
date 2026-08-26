<?php
// database/seeders/HomeSectionSeeder.php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\HomeSection;

class HomeSectionSeeder extends Seeder
{
    public function run(): void
    {
        $sections = [
            [
                'key' => 'hero_image',
                'image' => null,
                'title' => 'Layanan Warga, Satu Langkah Lebih Dekat',
                'subtitle' => 'Menyediakan layanan publik yang profesional, transparan, dan inovatif.',
                'description' => null,
            ],
            [
                'key' => 'tentang_image',
                'image' => null,
                'title' => 'Membangun Kemandirian Melalui Inovasi Vokasi',
                'subtitle' => null,
                'description' => 'BLUD SMKN 2 Purwakarta hadir sebagai wujud nyata komitmen kami.',
            ],
            [
                'key' => 'lokasi_image',
                'image' => null,
                'title' => 'Kunjungi Kami',
                'subtitle' => null,
                'description' => null,
            ],
        ];

        foreach ($sections as $section) {
            HomeSection::create($section);
        }
    }
}