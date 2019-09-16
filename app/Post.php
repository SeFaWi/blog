<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{

    protected $fillable = [
        'title' , ' body' , 'user_id' ,
        ];
    public function user()
    {
        return $this->belongsTo('app\User');
    }



    public function comments()
    {
        return $this->hasMany('App\Comment');
    }


    public function media()
    {
        return $this->hasMany('App\Media');
    }

        public function tags()
    {
        return $this->belongsToMany('App\Tag');
    }



    //public function tags()
    //{
      //  return $this->morphToMany('App\Tag', 'taggable');
    //}

 }



