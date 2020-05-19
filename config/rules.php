<?php
return [
    'books' => [
        'create' => [
            'name'       => 'required|string',
            'genre'      => 'nullable|string',
            'publishing' => 'nullable|string',
            'year'       => 'nullable|string',
            'ISBN'       => 'required|integer',
            'author'     => 'nullable|string',
        ],
        'update' => [
            'id'         => 'required|integer',
            'name'       => 'nullable|string',
            'genre'      => 'nullable|string',
            'publishing' => 'nullable|string',
            'year'       => 'nullable|string',
            'ISBN'       => 'nullable|integer',
            'author'     => 'nullable|string',
        ],
    ],

    'authors' => [
        'create' => [
            'name' => 'required|unique:App\Models\Author',
        ],
        'update' => [
            'id'   => 'required|integer',
            'name' => 'required|unique:App\Models\Author',
        ],
    ],
];
