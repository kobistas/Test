<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TeamComment extends Model
{

  // Table Name
  protected $table = 'teamsComments';
  // Primary Key
  public $primaryKey = 'id';
  // Timestamps
  public $timestamps = true;

  protected $fillable = [
      'body', 'user_id', 'team_name'
   ];


    public function user(){
        return $this->belongsTo('App\User');
    }

    public function userteam() {
        return $this->belongsTo('App\Team');
    }







}
