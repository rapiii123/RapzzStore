<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Banner;

class BannerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Jika ingin testing tanpa upload image manual, bisa ganti 'banners/sample.jpg' 
        // dengan URL image dari CDN atau Unsplash

        Banner::create([
            'title' => 'MEI STARLIGHT',
            'description' => 'Obsidian "Magitech Wraith" - Dapatkan karakter terbaru sekarang!',
            'image' => 'banners/sample-gaming-1.jpg', // Ganti dengan actual image path
            'link' => null,
            'is_active' => true,
            'order' => 1
        ]);

        Banner::create([
            'title' => 'SPECIAL EVENT',
            'description' => 'Dapatkan bonus 100% untuk pembelian pertama Anda minggu ini',
            'image' => 'banners/sample-gaming-2.jpg',
            'link' => null,
            'is_active' => true,
            'order' => 2
        ]);

        Banner::create([
            'title' => 'NEW SEASON',
            'description' => 'Musim baru telah dimulai! Bergabunglah dengan ribuan pemain lainnya',
            'image' => 'banners/sample-gaming-3.jpg',
            'link' => null,
            'is_active' => true,
            'order' => 3
        ]);

        Banner::create([
            'title' => 'LIMITED TIME',
            'description' => 'Penawaran terbatas! Diskon hingga 50% untuk semua produk pilihan',
            'image' => 'banners/sample-gaming-4.jpg',
            'link' => null,
            'is_active' => true,
            'order' => 4
        ]);
    }
}
