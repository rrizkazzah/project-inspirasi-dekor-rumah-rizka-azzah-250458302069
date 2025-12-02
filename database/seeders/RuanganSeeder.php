<?php

namespace Database\Seeders;

use App\Models\Ruangan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RuanganSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $ruangan = [
            'Ruang Tamu',
            'Kamar Tidur',
            'Dapur',
            'Kamar Mandi',
            'Ruang Makan',
            'Ruang Keluarga',
            'Taman',
            'Balkon',
            'Garasi',
            'Ruang Kerja',
            'Kamar Anak',
            'Walk-in Closet',
        ];

        foreach ($ruangan as $name) {
            Ruangan::create(['name' => $name]);
        }
    }
}
