<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Result extends Model
{
  protected $fillable = [
      'home_team', 'away_team', 'home_score', 'away_score'
   ];

  public function user(){
      return $this->belongsTo('App\User', 'team_id', 'id');
  }

  public function teamhome(){
      return $this->belongsTo('App\Team', 'home_team');
  }
  public function teamaway(){
      return $this->belongsTo('App\Team', 'away_team');
  }
}
