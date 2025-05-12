<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index() {
        // return view('books');
        $data = new Book(); // membuat objek;
        $books = $data->getBooks(); //mengakses method getBooks

        return view('books', ['books' => $books]); //mengirim data buku ke view
    }
}
