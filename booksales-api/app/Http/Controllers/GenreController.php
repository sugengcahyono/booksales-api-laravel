<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\Genre;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

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

    public function store(Request $request) {
        // 1. Validator 
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:100',
            'description' => 'required|string',

        ]);

        // 2. Cek validator 
        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message'=> $validator->errors()
            ], 422);
        }

        // 3. uplod image 
        // $image = $request->file('cover_photo');
        // $image->store('books', 'public');

        // 4. Insert data 
        $genre = Genre::create([
            'name' => $request->name,
            'description' => $request->description,

        ]);

        // 5. response 
        return response()-> json([
            'success' => true,
            'message' => 'Resource added succescfully',
            'data' => $genre
        ], 201);

    }
}
