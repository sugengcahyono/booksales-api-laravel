<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Author;

class AuthorController extends Controller
{
    public function index() {
        // return view('books');
        $data = new Author(); 
        $authors = $data->getAuthors(); 

        return view('authors', ['authors' => $authors]);
    }
}
