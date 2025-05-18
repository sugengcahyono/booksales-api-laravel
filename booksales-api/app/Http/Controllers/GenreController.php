<?php

namespace App\Http\Controllers;

use App\Models\Genre;
use Illuminate\Http\Request;

class GenreController extends Controller
{
    public function index() {
        // return view('books');
        // $data = new Genre(); 
        // $genres = $data->getGenres(); 
        $genres = Genre::all();

        // return view('genres', ['genres' => $genres]);
        return response()->json([
            "succes" => true,
            "message" => "Get All Resource",
            "data" => $genres
        ], 200);
    }
}
