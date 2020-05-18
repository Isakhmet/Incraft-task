<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $fillable = [
        'name',
        'genre',
        'publishing',
        'year',
        'ISBN',
        'author_id',
    ];

    public function author(){
        return $this->belongsTo('App\Models\Author');
    }
}
