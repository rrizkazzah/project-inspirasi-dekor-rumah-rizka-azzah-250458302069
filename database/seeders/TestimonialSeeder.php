<?php

namespace Database\Seeders;

use App\Models\Testimonial;
use Illuminate\Database\Seeder;

class TestimonialSeeder extends Seeder
{
    public function run(): void
    {
        $testimonials = [
            [
                'name' => 'Siti Nurhaliza',
                'content' => 'Homespire sangat membantu saya menemukan inspirasi untuk mendekorasi kamar tidur. Banyak ide kreatif dan mudah diterapkan!',
                'rating' => 5,
                'is_published' => true,
            ],
            [
                'name' => 'Budi Santoso',
                'content' => 'Platform yang sangat berguna untuk mencari referensi desain rumah. Saya suka fitur filter berdasarkan ruangan, jadi lebih mudah mencari yang sesuai kebutuhan.',
                'rating' => 5,
                'is_published' => true,
            ],
            [
                'name' => 'Dewi Lestari',
                'content' => 'Sebagai pemula di dunia dekorasi, Homespire memberikan banyak insight. Artikel dan tips DIY-nya sangat membantu!',
                'rating' => 4,
                'is_published' => true,
            ],
            [
                'name' => 'Ahmad Fauzi',
                'content' => 'Komunitas yang supportive dan konten berkualitas. Sudah upload beberapa karya saya dan dapat apresiasi yang baik dari pengguna lain.',
                'rating' => 5,
                'is_published' => true,
            ],
            [
                'name' => 'Rina Wijaya',
                'content' => 'Saya berhasil mengubah ruang tamu saya jadi lebih modern berkat inspirasi dari Homespire. Terima kasih!',
                'rating' => 5,
                'is_published' => true,
            ],
            [
                'name' => 'Eko Prasetyo',
                'content' => 'Website yang user-friendly dan fiturnya lengkap. Saya suka bisa menyimpan favorit untuk referensi nanti.',
                'rating' => 4,
                'is_published' => true,
            ],
        ];

        foreach ($testimonials as $testimonial) {
            Testimonial::create($testimonial);
        }
    }
}
