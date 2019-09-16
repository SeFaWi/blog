<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    public $table = "comment";

    protected $fillable = [
        'text'  , 'post_id' , 'user_id'
        ];

    public function post()
    {
        return $this->belongsTo('App\Post');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }
              //  public function   user(){
                //    return $this->belongsTo('app\User');
                //}
}
