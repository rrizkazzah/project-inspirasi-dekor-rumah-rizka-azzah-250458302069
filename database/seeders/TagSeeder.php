<?php

namespace Database\Seeders;

use App\Models\Tag;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $tags = [
            'Modern',
            'Minimalis',
            'Industrial',
            'Skandinavia',
            'Bohemian',
            'Vintage',
            'Klasik',
            'Kontemporer',
            'Rustic',
            'Mid-Century',
            'Mediterania',
            'Tropical',
            'Japanese',
            'Eco-Friendly',
            'Luxury',
        ];

        foreach ($tags as $name) {
            Tag::create(['name' => $name]);
        }
    }
}
