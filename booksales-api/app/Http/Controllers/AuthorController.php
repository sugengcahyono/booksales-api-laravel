<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Author;
use Illuminate\Support\Facades\Storage;
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

    // show data by id 
    public function show(string $id) {
        $author = Author::find($id);

        if (!$author) {
            return response()->json([
                'succes' => false,
                'message' => 'Resource not found'
            ], 404);
        }

        return response()->json([
            'success' => true, 
            'message' => 'Get Detail Resource',
            'data' => $author
        ], 200);
    }

    // Update
    public function update(string $id, Request $request) {
        // 1. mencari data
        $author = Author::find($id);

        if (!$author) {
            return response()->json([
                'succes' => false,
                'message' => 'Resource not found'
            ], 404);
        }

        // 2. validator
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:100', 
            'photo' => 'nullable|image|mimes:jpeg,jpg,png|max:2048',
            'bio' => 'required|string|max:255',

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
            'bio' => $request->bio,
           
        ];

        // 4. Handle image (upload & delete image)
        if ($request->hasFile('photo')) {
            $image =$request->file('photo');
            $image->store('authors', 'public');

            if ($author->photo) {
                Storage::disk('public')->delete('authors/' . $author->photo);
            }

            $data['photo'] =$image->hashName();
        }

        // 5. update data baru ke DB
        $author->update($data);

        return response()-> json([
            'success' => true,
            'message' => 'Resource Updated succescfully',
            'data' => $author
        ], 200);

        

    }

    // Menghapus data 
    public function destroy(string $id) {
        $author = Author::find($id);

        if (!$author) {
            return response()->json([
                'succes' => false,
                'message' => 'Resource not found'
            ], 404);
        }

        if($author->photo) {
            // delete from storage
            Storage::disk('public')->delete('authors/' . $author->photo);
        }

        $author->delete();

        return response()-> json([
            'succes' => true,
            'message' => 'Delete Resource Succesfully'
        ]);

    }
}
