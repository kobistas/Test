<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
  protected $fillable = [
      'team_name', 'home_team', 'away_team', 'home_score', 'away_score'
   ];

   public function user(){
       return $this->belongsTo('App\User', 'team_id');
   }

   public function teamhome(){
       return $this->belongsTo('App\Team', 'home_team');
   }
   public function teamaway(){
       return $this->belongsTo('App\Team', 'away_team');
   }

   public function resultsHomeUser() {

      return $this->hasMany('App\Result', 'home_team');
   }
   public function resultsAwayUser() {

      return $this->hasMany('App\Result', 'away_team');
   }

   public function  teamcomments() {
     return $this->hasMany('App\TeamComment');
   }




}
