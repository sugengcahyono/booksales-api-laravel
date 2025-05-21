<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Author;
use Illuminate\Support\Facades\Validator;

class AuthorController extends Controller
{
    public function index() {
        // return view('books');
        // $data = new Author(); 
        // $authors = $data->getAuthors(); 
        $authors = Author::all();

        // return view('authors', ['authors' => $authors]);
       return response()->json([
            "succes" => true,
            "message" => "Get All Resource",
            "data" => $authors
        ], 200);
    }

    //   'name', 'photo', 'bio'
    public function store(Request $request) {
        // 1. Validator 
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:100', 
            'photo' => 'required|image|mimes:jpeg,jpg,png|max:2048',
            'bio' => 'required|string|max:255',

        ]);

        // 2. Cek validator 
        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message'=> $validator->errors()
            ], 422);
        }

        // 3. uplod image 
        $image = $request->file('photo');
        $image->store('authors', 'public');

        // 4. Insert data 
        $authors = Author::create([
            'name' => $request->name,
            'photo' => $image->hashName(),
            'bio' => $request->bio,

        ]);

        // 5. response 
        return response()-> json([
            'success' => true,
            'message' => 'Resource added succescfully',
            'data' => $authors
        ], 201);

    }
}
