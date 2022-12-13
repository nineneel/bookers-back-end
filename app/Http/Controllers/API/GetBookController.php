<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Book;

class GetBookController extends Controller
{
    public function by_recomended()
    {
        $books = Book::with(['authors', 'genres', 'location'])->inRandomOrder()->limit(7)->get();

        foreach ($books as $book) {
            $book->cover = $book->getFirstMediaUrl('books');
        }

        return response()->json($books, 200);
    }

    public function by_popular()
    {
        $books = Book::with(['authors', 'genres', 'location'])->inRandomOrder()->limit(7)->get();

        foreach ($books as $book) {
            $book->cover = $book->getFirstMediaUrl('books');
        }

        return response()->json($books, 200);
    }
}
