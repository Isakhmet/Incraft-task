<?php

namespace App\Http\Controllers;

use App\Models\Author;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class AuthorController extends Controller
{
    private $author;

    public function __construct(Author $author)
    {
        $this->author = $author;
    }

    public function create(Request $request)
    {
        $validation = Validator::make($request->all(), config('rules.authors.create'));

        if ($validation->fails())
        {
            return $validation->errors();
        }

        try {
            $this->author->create($request->all());
        }catch (\Exception $exception)
        {
            Log::info($exception);

            return [
                'status' => 'error',
                'error'  => $exception->getMessage()
            ];
        }

        return [
            'status' => 'success'
        ];
    }

    public function update(Request $request)
    {
        $validation = Validator::make($request->all(), config('rules.authors.update'));

        if ($validation->fails())
        {
            return $validation->errors();
        }

        try {
            $this->author->where('id', $request->get('id'))->update(['name' => $request->get('name')]);
        }catch (\Exception $exception){
            Log::info($exception);

            return [
                'status' => 'error',
                'error'  => $exception->getMessage()
            ];
        }

        return [
            'status' => 'success'
        ];
    }

    public function delete($id)
    {
        try {
            $this->author->where('id', $id)->delete();
        }catch (\Exception $exception){
            Log::info($exception);

            return [
                'status' => 'error',
                'error'  => $exception->getMessage()
            ];
        }

        return [
            'status' => 'success'
        ];
    }
}
