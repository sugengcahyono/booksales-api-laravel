<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Genre extends Model
{
    protected $table = 'genres';
    // private $genres = [
    //     [
    //         'id' => 1,
    //         'name' => 'Fiksi',
    //         'description' => 'Cerita yang berasal dari imajinasi dan tidak sepenuhnya berdasarkan fakta.'
    //     ],
    //     [
    //         'id' => 2,
    //         'name' => 'Inspirasi',
    //         'description' => 'Buku yang memotivasi dan memberikan inspirasi untuk pembacanya.'
    //     ],
    //     [
    //         'id' => 3,
    //         'name' => 'Petualangan',
    //         'description' => 'Kisah yang penuh aksi dan perjalanan yang menantang.'
    //     ],
    // ];

    // public function getGenres() {
    //     return $this->genres;
    // }
}
