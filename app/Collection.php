<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Collection extends Model
{
    protected $table = 'collections';

    public function bookmarks()
    {
        return $this->hasMany('App\Bookmark', 'collection_id', 'id')->count();
    }
}
