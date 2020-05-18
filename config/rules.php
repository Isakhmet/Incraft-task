<?php
    return [
        'create' => [
            'name'       => 'required',
            'genre'      => 'nullable|string',
            'publishing' => 'nullable|string',
            'year'       => 'nullable|string',
            'ISBN'       => 'nullable|integer',
            'author'     => 'nullable|string',
        ],
        'update' => [
            'id'       => 'required'
        ]
    ];
