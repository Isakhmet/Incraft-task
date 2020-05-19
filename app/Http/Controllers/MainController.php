<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\Book;

class MainController extends Controller
{
    public function authors()
    {
        $model = Author::paginate(2);
        $books = [];

        foreach ($model as $key => $item) {
            foreach ($item->books as $book) {
                $books[$key][] = $book->name;
            }
        }

        return view(
            'author', [
                        'data'  => $model,
                        'books' => $books,
                    ]
        );
    }

    public function books()
    {
        $books   = Book::paginate(
            2, [
            'name',
            'genre',
            'publishing',
            'year',
            'ISBN',
            'author_id',
        ]
        );
        $authors = [];


        foreach ($books as $key => $book) {
            $authors[] = $book->author->name;
        }

        return view(
            'book', [
                      'data'    => $books,
                      'authors' => $authors,
                  ]
        );
    }
}
