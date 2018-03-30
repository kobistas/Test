<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{

  protected $fillable = [
      'body', 'user_id', 'post_id'
   ];

    public function post() {
      return $this->belongsto('App\Post');
    }

    public function user(){
        return $this->belongsTo('App\User');
    }

    public function scopeSearch($query,$s) {
      return $query->where('body', 'like', '%'.$s. '%');
    }


}
