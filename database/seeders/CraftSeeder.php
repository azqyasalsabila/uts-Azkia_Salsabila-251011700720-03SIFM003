<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Craft;

class CraftSeeder extends Seeder
{
    public function run(): void
    {
        Craft::insert([
            [
                'name' => 'Tas Anyaman Bambu',
                'artisan' => 'Pengrajin Nusantara',
                'category' => 'Aksesoris',
                'material' => 'Bambu',
                'description' => 'Tas anyaman bambu buatan tangan dengan desain unik dan ramah lingkungan.',
                'price' => 150000,
                'image' => 'tas-anyaman.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Vas Gerabah Tradisional',
                'artisan' => 'Karya Tanah Liat',
                'category' => 'Dekorasi',
                'material' => 'Tanah liat',
                'description' => 'Vas gerabah tradisional untuk dekorasi rumah.',
                'price' => 85000,
                'image' => 'vas-gerabah.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Hiasan Ukir Kayu',
                'artisan' => 'Seni Ukir Lokal',
                'category' => 'Dekorasi',
                'material' => 'Kayu',
                'description' => 'Hiasan kayu dengan ukiran artistik buatan pengrajin lokal.',
                'price' => 120000,
                'image' => 'ukir-kayu.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Dompet Tenun',
                'artisan' => 'Tenun Kreatif',
                'category' => 'Aksesoris',
                'material' => 'Kain tenun',
                'description' => 'Dompet kain tenun dengan motif khas Indonesia.',
                'price' => 65000,
                'image' => 'dompet-tenun.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Lampu Hias Rotan',
                'artisan' => 'Rotan Indah',
                'category' => 'Dekorasi',
                'material' => 'Rotan',
                'description' => 'Lampu hias rotan yang memberikan suasana hangat dan alami.',
                'price' => 200000,
                'image' => 'lampu-rotan.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
