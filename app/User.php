<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','link', 'provider_user_id','bank','isModerator'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function posts(){
        return $this->hasMany('App\Post');
    }

    public function comments() {
      return $this->hasMany('App\Comment');
    }

    public function teamsComments() {
      return $this->hasMany('App\TeamComment');
    }

    public function isAdmin() {

      return $this->isAdmin;

    }

    public function isModerator() {

      return $this->isModerator;

    }


    public function scopeSearch($query,$s) {
      return $query->where('name', 'like', '%'.$s. '%');
    }

}
