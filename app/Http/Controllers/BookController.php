<?php

namespace App\Http\Controllers;

use App\Models\BooksModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class BookController extends Controller
{

    // Create a new book
    // all fields are required
    public function createBook(Request $request)
    {
        $validation = Validator::make($request->all(), [
            'title' => 'required|string|max:255',
            'author' => 'required|string|max:255',
            'isbn' => 'required|string|max:255',
            'year' => 'required|integer',
        ]);

        if ($validation->fails()) {
            return response()->json($validation->errors(), 400);
        }

        try {
            $data = [
                'title' => $request->title,
                'author' => $request->author,
                'isbn' => $request->isbn,
                'year' => $request->year,
            ];

            BooksModel::create($data);

            return response()->json(['message' => 'Book created successfully'], 201);
        } catch (\Exception $e) {
            return response()->json(['message' => $e->getMessage()], 500);
        }
    }


    // editing a book by id
    // if book not found returning validation error
    public function editBook(Request $request)
    {
        $validation = Validator::make($request->all(), [
            'title' => 'required|string|max:255',
            'author' => 'required|string|max:255',
            'isbn' => 'required|string|max:255',
            'year' => 'required|integer',
            'id' => 'required|integer|exists:books,id'
        ]);

        if ($validation->fails()) {
            return response()->json($validation->errors(), 400);
        }

        try {
            $data = [
                'title' => $request->title,
                'author' => $request->author,
                'isbn' => $request->isbn,
                'year' => $request->year,
            ];

            $book = BooksModel::find($request->id);

            $book->update($data);

            return response()->json(['message' => 'Book updated successfully'], 200);
        } catch (\Exception $e) {
            return response()->json(['message' => $e->getMessage()], 500);
        }
    }

    public function deleteBook(Request $request)
    {
        $validation = Validator::make($request->all(), [
            'id' => 'required|integer|exists:books,id'
        ]);

        if ($validation->fails()) {
            return response()->json($validation->errors(), 400);
        }

        try {
            $book = BooksModel::find($request->id);

            $book->delete();

            return response()->json(['message' => 'Book deleted successfully'], 200);
        } catch (\Exception $e) {
            return response()->json(['message' => $e->getMessage()], 500);
        }
    }

    public function listBook()
    {
        try {
            $books = BooksModel::all();

            return response()->json($books, 200);
        } catch (\Exception $e) {
            return response()->json(['message' => $e->getMessage()], 500);
        }
    }

    public function getBook(Request $request)
    {
        $validation = Validator::make($request->all(), [
            'id' => 'required|integer|exists:books,id'
        ]);

        if ($validation->fails()) {
            return response()->json($validation->errors(), 400);
        }

        try {
            $book = BooksModel::find($request->id);

            return response()->json($book, 200);
        } catch (\Exception $e) {
            return response()->json(['message' => $e->getMessage()], 500);
        }
    }
}
