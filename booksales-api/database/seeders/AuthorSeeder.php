<?php

namespace Database\Seeders;

use App\Models\Author;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AuthorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Author::create([
            'name' => 'Tere Liye',
            'photo' => 'tere_liye.jpg',
            'bio' => 'Penulis produktif asal Indonesia yang terkenal dengan karya-karya fiksi dan novel bertema keluarga serta petualangan.',
        ]);

        Author::create([
            'name' => 'Andrea Hirata',
            'photo' => 'andrea_hirata.jpg',
            'bio' => 'Penulis novel Laskar Pelangi yang mengangkat kisah kehidupan dan pendidikan di Belitung.',
        ]);

        Author::create([
            'name' => 'Dewi Lestari',
            'photo' => 'dewi_lestari.jpg',
            'bio' => 'Penulis dan musisi Indonesia yang dikenal lewat karya-karya bernuansa spiritual dan fantasi, seperti seri Supernova.',
        ]);

        Author::create([
            'name' => 'Habiburrahman El Shirazy',
            'photo' => 'habiburrahman.jpg',
            'bio' => 'Penulis novel religi populer seperti Ayat-Ayat Cinta dan Ketika Cinta Bertasbih.',
        ]);

        Author::create([
            'name' => 'Pramoedya Ananta Toer',
            'photo' => 'pramoedya.jpg',
            'bio' => 'Sastrawan legendaris Indonesia yang dikenal lewat Tetralogi Buru dan karya-karya berlatar sejarah.',
        ]);

        Author::create([
            'name' => 'Pidi Baiq',
            'photo' => 'pidi_baiq.jpg',
            'bio' => 'Penulis dan seniman nyentrik asal Bandung, terkenal lewat seri Dilan yang mengangkat kisah cinta remaja tahun 90-an.',
        ]);

        Author::create([
            'name' => 'Boy Candra',
            'photo' => 'boy_candra.jpg',
            'bio' => 'Penulis muda yang dikenal dengan karya-karya bernuansa romansa dan patah hati yang digemari anak muda.',
        ]);
    }
}
