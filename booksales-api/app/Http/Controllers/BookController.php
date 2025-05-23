<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

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

    public function store(Request $request) {
        // 1. Validator 
        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:100', 
            'description' => 'required|string',
            'price' => 'required|numeric',
            'stock' => 'required|integer',
            'cover_photo' => 'required|image|mimes:jpeg,jpg,png|max:2048',
            'genre_id' => 'required|exists:genres,id',
            'author_id' => 'required|exists:authors,id',

        ]);

        // 2. Cek validator 
        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message'=> $validator->errors()
            ], 422);
        }

        // 3. uplod image 
        $image = $request->file('cover_photo');
        $image->store('books', 'public');

        // 4. Insert data 
        $book = Book::create([
            'title' => $request->title,
            'description' => $request->description,
            'price' => $request->price,
            'stock' => $request->stock,
            'cover_photo' => $image->hashName(),
            'genre_id' => $request->genre_id,
            'author_id' => $request->author_id,

        ]);

        // 5. response 
        return response()-> json([
            'success' => true,
            'message' => 'Resource added succescfully',
            'data' => $book
        ], 201);

    }

    // show data by id 
    public function show(string $id) {
        $book = Book::find($id);

        if (!$book) {
            return response()->json([
                'succes' => false,
                'message' => 'Resource not found'
            ], 404);
        }

        return response()->json([
            'success' => true, 
            'message' => 'Get Detail Resource',
            'data' => $book
        ], 200);
    }

    // Update
    public function update(string $id, Request $request) {
        // 1. mencari data
        $book = Book::find($id);

        if (!$book) {
            return response()->json([
                'succes' => false,
                'message' => 'Resource not found'
            ], 404);
        }

        // 2. validator
        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:100', 
            'description' => 'required|string',
            'price' => 'required|numeric',
            'stock' => 'required|integer',
            'cover_photo' => 'nullable|image|mimes:jpeg,jpg,png|max:2048',
            'genre_id' => 'required|exists:genres,id',
            'author_id' => 'required|exists:authors,id',

        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message'=> $validator->errors()
            ], 422);
        }

        // 3. siapkan data yg ingin diupdate
        $data = [
            'title' => $request->title,
            'description' => $request->description,
            'price' => $request->price,
            'stock' => $request->stock,
            'genre_id' => $request->genre_id,
            'author_id' => $request->author_id,
        ];

        // 4. Handle image (upload & delete image)
        if ($request->hasFile('cover_photo')) {
            $image =$request->file('cover_photo');
            $image->store('books', 'public');

            if ($book->cover_photo) {
                Storage::disk('public')->delete('books/' . $book->cover_photo);
            }

            $data['cover_photo'] =$image->hashName();
        }

        // 5. update data baru ke DB
        $book->update($data);

        return response()-> json([
            'success' => true,
            'message' => 'Resource Updated succescfully',
            'data' => $book
        ], 200);

        

    }

    // Menghapus data 
    public function destroy(string $id) {
        $book = Book::find($id);

        if (!$book) {
            return response()->json([
                'succes' => false,
                'message' => 'Resource not found'
            ], 404);
        }

        if($book->cover_photo) {
            // delete from storage
            Storage::disk('public')->delete('books/' . $book->cover_photo);
        }

        $book->delete();

        return response()-> json([
            'succes' => true,
            'message' => 'Delete Resource Succesfully'
        ]);

    }

    
}
