<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AuthorBook extends Model
{
    protected $table = 'author_book';
    public function books(){
        return $this->belongsToMany('App\Book');
    }

    public function authors(){
        return $this->belongsTo('App\Author');
    }
}
