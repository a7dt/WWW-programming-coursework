<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Book;

class BooksController extends Controller
{
    
    /**
     * Returns index page with book information
     */
    public function showBooks() {

        $books = Book::all();

        return view('index')->with('books', $books);
    }

    /**
     * Search funtionality
     */
    public function searchBooks(Request $request) {

        $searchstr = htmlspecialchars($request->input('searchstr'), ENT_QUOTES, "utf-8");;

        $field = $request->input('search_from');

        switch($field) {
            case 0:
                $field = 'author';
                break;
            case 1:
                $field = 'name';
                break;
        }

        $books = Book::where($field, 'LIKE', '%'.$searchstr.'%')->get();

        return view('index')->with('books', $books);

    }

}
