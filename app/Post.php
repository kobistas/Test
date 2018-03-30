<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    // Table Name
    protected $table = 'posts';
    // Primary Key
    public $primaryKey = 'id';
    // Timestamps
    public $timestamps = true;

    public function user(){
        return $this->belongsTo('App\User');
    }

    public function comments() {
      // $posts = Post::with('comments')->paginate(10);
       // $post->comments = Comment::paginate(9);
      return $this->hasMany('App\Comment');
      // ->orderBy('created_at', 'desc');
    }

    public function scopeSearch($query,$s) {
      return $query->where('title', 'like', '%'.$s. '%');
    }


}
