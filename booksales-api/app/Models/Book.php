<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    private $books = [
        [
            'title' => 'Pulang',
            'description' => 'Petualangan seroang pemuda yang kembali ke desa kelahirannya',
            'price' => 40000,
            'stock' => 15,
            'cover_photo' => 'pulang.jpg',
            'genre_id' => 1,
            'author_id' => 1
        ],
        [
            'title' => 'Laskar Pelangi',
            'description' => 'Kisah inspiratif sekelompok anak di Belitung yang berjuang meraih mimpi',
            'price' => 55000,
            'stock' => 20,
            'cover_photo' => 'laskar_pelangi.jpg',
            'genre_id' => 2,
            'author_id' => 2
        ],
        [
            'title' => 'Negeri 5 Menara',
            'description' => 'Perjalanan enam sahabat dalam menuntut ilmu di pesantren',
            'price' => 50000,
            'stock' => 10,
            'cover_photo' => 'negeri_5_menara.jpg',
            'genre_id' => 3,
            'author_id' => 3
        ],
        [
            'title' => 'Bumi',
            'description' => 'Petualangan remaja dengan kekuatan istimewa di dunia paralel',
            'price' => 60000,
            'stock' => 12,
            'cover_photo' => 'bumi.jpg',
            'genre_id' => 4,
            'author_id' => 4
        ],
    ];

    public function getBooks() {
        return $this->books;
    }
}
