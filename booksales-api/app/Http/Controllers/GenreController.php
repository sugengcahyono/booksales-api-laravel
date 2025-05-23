<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\Genre;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
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

    // show data by id 
    public function show(string $id) {
        $genre = Genre::find($id);

        if (!$genre) {
            return response()->json([
                'succes' => false,
                'message' => 'Resource not found'
            ], 404);
        }

        return response()->json([
            'success' => true, 
            'message' => 'Get Detail Resource',
            'data' => $genre
        ], 200);
    }

        // Update
        public function update(string $id, Request $request) {
            // 1. mencari data
            $genre = Genre::find($id);

            if (!$genre) {
                return response()->json([
                    'succes' => false,
                    'message' => 'Resource not found'
                ], 404);
            }

            // 2. validator
            $validator = Validator::make($request->all(), [
                'name' => 'required|string|max:100',
                'description' => 'required|string',

            ]);

            if ($validator->fails()) {
                return response()->json([
                    'success' => false,
                    'message'=> $validator->errors()
                ], 422);
            }

            // 3. siapkan data yg ingin diupdate
            $data = [
                'name' => $request->name,
                'description' => $request->description,
                
            ];

            // 4. Handle image (upload & delete image)
            // if ($request->hasFile('cover_photo')) {
            //     $image =$request->file('cover_photo');
            //     $image->store('books', 'public');

            //     if ($book->cover_photo) {
            //         Storage::disk('public')->delete('books/' . $book->cover_photo);
            //     }

            //     $data['cover_photo'] =$image->hashName();
            // }

            // 5. update data baru ke DB
            $genre->update($data);

            return response()-> json([
                'success' => true,
                'message' => 'Resource Updated succescfully',
                'data' => $genre
            ], 200);

            

        }

    // Menghapus data 
    public function destroy(string $id) {
        $genre = Genre::find($id);

        if (!$genre) {
            return response()->json([
                'succes' => false,
                'message' => 'Resource not found'
            ], 404);
        }

        // if($genre->cover_photo) {
        //     // delete from storage
        //     Storage::disk('public')->delete('books/' . $genre->cover_photo);
        // }

        $genre->delete();

        return response()-> json([
            'succes' => true,
            'message' => 'Delete Resource Succesfully'
        ]);

    }
}
