<?php
    return [
        'create' => [
            'name'       => 'required|string',
            'genre'      => 'nullable|string',
            'publishing' => 'nullable|string',
            'year'       => 'nullable|string',
            'ISBN'       => 'required|integer',
            'author'     => 'nullable|string',
        ],
        'update' => [
            'id'       => 'required'
        ]
    ];
