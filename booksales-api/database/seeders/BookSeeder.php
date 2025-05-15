<?php

namespace Database\Seeders;

use App\Models\Book;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Book::create([
            'title' => 'Pulang',
            'description' => 'Petualangan seorang pemuda yang kembali ke desa kelahirannya',
            'price' => 40000,
            'stock' => 15,
            'cover_photo' => 'pulang.jpg',
        ]);

        Book::create([
            'title' => 'Pergi',
            'description' => 'Kisah lanjutan dari Pulang yang penuh tantangan dan perjalanan',
            'price' => 42000,
            'stock' => 12,
            'cover_photo' => 'pergi.jpg',
        ]);

        Book::create([
            'title' => 'Laut Bercerita',
            'description' => 'Cerita emosional tentang kehilangan dan harapan',
            'price' => 45000,
            'stock' => 10,
            'cover_photo' => 'laut_bercerita.jpg',
        ]);

        Book::create([
            'title' => 'Bumi',
            'description' => 'Awal dari petualangan remaja dengan kekuatan luar biasa',
            'price' => 38000,
            'stock' => 20,
            'cover_photo' => 'bumi.jpg',
        ]);

        Book::create([
            'title' => 'Langit Merah',
            'description' => 'Konflik dan perjuangan di tengah kekacauan dunia',
            'price' => 47000,
            'stock' => 18,
            'cover_photo' => 'langit_merah.jpg',
        ]);

        Book::create([
            'title' => 'Hujan',
            'description' => 'Kisah romansa dan kehilangan dalam suasana futuristik',
            'price' => 39000,
            'stock' => 25,
            'cover_photo' => 'hujan.jpg',
        ]);

        Book::create([
            'title' => 'Negeri Para Bedebah',
            'description' => 'Thriller politik dengan tokoh utama cerdas dan licin',
            'price' => 46000,
            'stock' => 14,
            'cover_photo' => 'negeri_bedebah.jpg',
        ]);
    }
}
