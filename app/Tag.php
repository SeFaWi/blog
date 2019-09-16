<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    public function post()
    {
        return $this->belongsToMany('App\Post');
    }

    /**
     * Get all of the videos that are assigned this tag.
     */

}
