<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Craft;

class CraftSeeder extends Seeder
{
    public function run(): void
    {
        $crafts = [
            [
                'name' => 'Tas Anyaman Bambu',
                'artisan' => 'Pengrajin Nusantara',
                'category' => 'Aksesoris',
                'material' => 'Bambu',
                'description' => 'Tas anyaman bambu buatan tangan dengan desain unik dan ramah lingkungan.',
                'price' => 150000,
                'image' => 'tas-anyaman.jpg',
            ],
            [
                'name' => 'Vas Gerabah Tradisional',
                'artisan' => 'Karya Tanah Liat',
                'category' => 'Dekorasi',
                'material' => 'Tanah liat',
                'description' => 'Vas gerabah dengan sentuhan tradisional yang cocok untuk dekorasi rumah.',
                'price' => 85000,
                'image' => 'vas-gerabah.jpg',
            ],
            [
                'name' => 'Hiasan Ukir Kayu',
                'artisan' => 'Seni Ukir Lokal',
                'category' => 'Dekorasi',
                'material' => 'Kayu',
                'description' => 'Hiasan kayu dengan ukiran artistik yang dibuat oleh pengrajin lokal.',
                'price' => 120000,
                'image' => 'ukir-kayu.jpg',
            ],
            [
                'name' => 'Dompet Tenun',
                'artisan' => 'Tenun Kreatif',
                'category' => 'Aksesoris',
                'material' => 'Kain tenun',
                'description' => 'Dompet kain tenun dengan motif khas Indonesia yang menarik.',
                'price' => 65000,
                'image' => 'dompet-tenun.jpg',
            ],
            [
                'name' => 'Lampu Hias Rotan',
                'artisan' => 'Rotan Indah',
                'category' => 'Dekorasi',
                'material' => 'Rotan',
                'description' => 'Lampu hias rotan yang memberikan suasana hangat dan alami.',
                'price' => 200000,
                'image' => 'lampu-rotan.jpg',
            ],
        ];

        foreach ($crafts as $craft) {
            Craft::create($craft);
        }
    }
}
