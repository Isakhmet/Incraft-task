<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class BooksController extends Controller
{
    private $book;

    public function __construct(Book $book)
    {
        $this->book = $book;
    }

    public function list()
    {
        $books = $this->book->all();
        $data  = [];

        foreach ($books as $key => $book) {
            $data[$key]           = $book->toArray();
            $data[$key]['author'] = $book->author->name;

            unset($data[$key]['author_id']);
            unset($data[$key]['updated_at']);
            unset($data[$key]['created_at']);
        }

        return $data;
    }

    public function bookById($id)
    {
        return $this->book->find($id)
                          ->toArray()
            ;
    }

    public function create(Request $request)
    {
        $validation = Validator::make($request->all(), config('rules.books.create'));

        if ($validation->fails()) {
            return $validation->errors();
        }

        $data     = $request->toArray();
        $authorId = null;

        try {
            if (isset($data['author']) && !empty($data['author'])) {
                $author = Author::where('name', $data['author'])
                                ->first(['id'])
                ;

                $authorId = $author->id ?? null;
            }

            $data['author_id'] = $authorId;
            unset($data['author']);

            $this->book->create($data);

        } catch (\Exception $exception) {
            Log::info($exception);

            return [
                'status' => 'error',
                'error'  => $exception->getMessage(),
            ];
        }

        return ['status' => 'success'];
    }

    public function update(Request $request)
    {
        $validation = Validator::make($request->all(), config('rules.books.update'));

        if ($validation->fails()) {
            return $validation->errors();
        }

        $data     = $request->toArray();
        $authorId = null;

        try {
            if (isset($data['author']) && !empty($data['author'])) {
                $author = Author::where('name', $data['author'])
                                ->first(['id'])
                ;

                $authorId = $author->id ?? null;
            }

            $data['author_id'] = $authorId;
            unset($data['author']);

            $this->book
                ->where('id', $data['id'])
                ->update($data)
            ;
        } catch (\Exception $exception) {
            Log::info($exception);

            return [
                'status' => 'error',
                'error'  => $exception->getMessage(),
            ];
        }

        return ['status' => 'success'];
    }

    public function delete($id)
    {
        try {
            $this->book
                ->where('id', $id)
                ->delete()
            ;
        } catch (\Exception $exception) {
            Log::info($exception);

            return ['status' => 'error'];
        }

        return ['status' => 'success'];
    }
}
