<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    protected $table = 'authors';
    // private $authors = [
    //     [
    //         'id' => 1,
    //         'name' => 'Tere Liye',
    //         'photo' => 'tere_liye.jpg',
    //         'bio' => 'Penulis produktif asal Indonesia yang terkenal dengan karya-karya fiksi dan novel bertema keluarga serta petualangan.'
    //     ],
    //     [
    //         'id' => 2,
    //         'name' => 'Andrea Hirata',
    //         'photo' => 'andrea_hirata.jpg',
    //         'bio' => 'Penulis novel Laskar Pelangi yang terinspirasi dari kisah hidupnya di Belitung dan telah mendunia.'
    //     ],
    //     [
    //         'id' => 3,
    //         'name' => 'Ahmad Fuadi',
    //         'photo' => 'ahmad_fuadi.jpg',
    //         'bio' => 'Penulis novel Negeri 5 Menara yang mengisahkan perjuangan menuntut ilmu di pesantren dengan filosofi man jadda wajada.'
    //     ],
    // ];

    // public function getAuthors() {
    //     return $this->authors;
    // }
}
