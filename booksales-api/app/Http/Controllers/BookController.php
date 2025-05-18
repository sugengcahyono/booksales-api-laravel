<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index() {
        // return view('books');
        // $data = new Book(); // membuat objek;
        // $books = $data->getBooks(); //mengakses method getBooks
        $books = Book::all();

        // return view('books', ['books' => $books]); //mengirim data buku ke view
        return response()->json([
            "succes" => true,
            "message" => "Get All Resource",
            "data" => $books
        ], 200);
    }
}
