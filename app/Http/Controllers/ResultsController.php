<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Team;
use App\Result;
use App\User;

use Illuminate\Support\Facades\Auth;
class ResultsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $results = Result::orderBy('created_at','desc')->get();
      $teams = Team::orderBy('created_at','desc')->get();






    //   return view('results.index')->with('results', $results, 'teams', $teams, 'checkResult', $checkResult,
    // 'home_team', $home_team, 'away_team', $away_team);

    return view('results.index', compact('teams', 'results','resultsAll'));



    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $teams = Team::all();

      if ($teamUser = Team::where('team_id', Auth::user()->id)->first()) {


        return view('results.create', compact('teams', 'teamUser'));

      }

        return redirect('/teams')->with('error', 'Tu nesi šio turnyro dalyvis! :)');



    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

      $this->validate($request, [
      'home_team'=>'required',
      'away_team'=>'required',
      'home_score'=>'required|numeric|max:10',
      'away_score'=>'required|numeric|max:10'

      ]);
        // Result::create($request->all());

      $results = new Result;
      $results->home_score = $request->input('home_score');
      $results->away_score = $request->input('away_score');
      $results->home_team = $request->home_team;
      $results->away_team = $request->away_team;

      if ($checkResult =  Result::where('home_team', $request->home_team)->where('away_team',$request->away_team)->count() >= 2) {
        return redirect('/teams')->with('error', 'Tarpusavyje galima žaisti tik 2 kartus.');
      }

      if($results->home_team == $request->away_team) {
        return redirect('/teams')->with('error', 'Jūs negalite įrašyti rezultato prieš savo komandą.');
      }

      $results->save();

      $hometeam=Team::find($results->home_team);
      $awayteam=Team::find($results->away_team);
      $fifahStats=User::find($results->home_team);
      $fifaaStats=User::find($results->away_team);

      // Jei home laimejo
      if($results->home_score > $results->away_score){
        //sezono
      $hometeam->win =  $hometeam->win +1;
      $hometeam->total_points= $hometeam->total_points +3;
      $awayteam->lose = $awayteam->lose +1;
      $awayteam->played = $awayteam->played +1;
      $hometeam->played = $hometeam->played +1;
      $hometeam->scored = $hometeam->scored + $results->home_score;
      $hometeam->missed = $hometeam->missed + $results->away_score;
      $awayteam->scored = $awayteam->scored + $results->away_score;
      $awayteam->missed = $awayteam->missed + $results->home_score;
        // users stats
      $fifahStats->fifaPoints = $fifahStats->fifaPoints + 3;
      $fifahStats->fifaPlayed = $fifahStats->fifaPlayed + 1;
      $fifahStats->fifaWon = $fifahStats->fifaWon + 1;

      $fifaaStats->fifaPlayed = $fifaaStats->fifaPlayed + 1;
      $fifaaStats->fifaLost =$fifaaStats->fifaLost + 1;

      $fifahStats->fifaScored = $fifahStats->fifaScored + $results->home_score;
      $fifahStats->fifaMissed = $fifahStats->fifaMissed + $results->away_score;
      $fifaaStats->fifaScored = $fifaaStats->fifaScored + $results->away_score;
      $fifaaStats->fifaMissed = $fifaaStats->fifaMissed + $results->home_score;

      }



      // jei lose
      if($results->away_score > $results->home_score){
        //sezono
        $awayteam->win = $awayteam->win+1;
        $awayteam->total_points=$awayteam->total_points +3;
        $hometeam->lose= $hometeam->lose +1;
        $awayteam->played = $awayteam->played +1;
        $hometeam->played = $hometeam->played +1;
        $hometeam->scored = $hometeam->scored + $results->home_score;
        $hometeam->missed = $hometeam->missed + $results->away_score;
        $awayteam->scored = $awayteam->scored + $results->away_score;
        $awayteam->missed = $awayteam->missed + $results->home_score;
        // user stats
        $fifaaStats->fifaPoints = $fifaaStats->fifaPoints + 3;
        $fifahStats->fifaPlayed = $fifahStats->fifaPlayed + 1;
        $fifaaStats->fifaWon = $fifaaStats->fifaWon + 1;

        $fifaaStats->fifaPlayed = $fifaaStats->fifaPlayed + 1;
        $fifahStats->fifaLost =$fifahStats->fifaLost + 1;

        $fifahStats->fifaScored = $fifahStats->fifaScored + $results->home_score;
        $fifahStats->fifaMissed = $fifahStats->fifaMissed + $results->away_score;
        $fifaaStats->fifaScored = $fifaaStats->fifaScored + $results->away_score;
        $fifaaStats->fifaMissed = $fifaaStats->fifaMissed + $results->home_score;
      }
        // jei draw
      if($results->home_score == $results->away_score){
        //sezono
        $hometeam->draw= $hometeam->draw +1;
        $awayteam->draw=$awayteam->draw +1;
        $hometeam->total_points= $hometeam->total_points +1;
        $awayteam->total_points= $awayteam->total_points +1;
        $awayteam->played = $awayteam->played +1;
        $hometeam->played = $hometeam->played +1;
        $hometeam->scored = $hometeam->scored + $results->home_score;
        $hometeam->missed = $hometeam->missed + $results->away_score;
        $awayteam->scored = $awayteam->scored + $results->away_score;
        $awayteam->missed = $awayteam->missed + $results->home_score;
        // user stats
        $fifaaStats->fifaPoints = $fifaaStats->fifaPoints + 1;
        $fifahStats->fifaPoints = $fifahStats->fifaPoints + 1;
        $fifahStats->fifaPlayed = $fifahStats->fifaPlayed + 1;

        $fifaaStats->fifaPlayed = $fifaaStats->fifaPlayed + 1;
        $fifaaStats->fifaDraw = $fifaaStats->fifaDraw + 1;
        $fifahStats->fifaDraw = $fifahStats->fifaDraw + 1;


        $fifahStats->fifaScored = $fifahStats->fifaScored + $results->home_score;
        $fifahStats->fifaMissed = $fifahStats->fifaMissed + $results->away_score;
        $fifaaStats->fifaScored = $fifaaStats->fifaScored + $results->away_score;
        $fifaaStats->fifaMissed = $fifaaStats->fifaMissed + $results->home_score;


      }
      $hometeam->update();
      $awayteam->update();
      $fifahStats->update();
      $fifaaStats->update();

      // return dd($results->home_score);
    return redirect('/teams')->with('success', 'Jūsų rezultas sėkmingai įkeltas.');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
      $results = Result::find($id);

      $hometeam=Team::find($results->home_team);
      $awayteam=Team::find($results->away_team);
      $fifahStats=User::find($results->home_team);
      $fifaaStats=User::find($results->away_team);

      // Jei home laimejo
      if($results->home_score > $results->away_score){
        $hometeam->win =  $hometeam->win -1;
        $hometeam->total_points= $hometeam->total_points -3;
        $awayteam->lose = $awayteam->lose -1;
        $awayteam->played = $awayteam->played -1;
        $hometeam->played = $hometeam->played -1;
        $hometeam->scored = $hometeam->scored - $results->home_score;
        $hometeam->missed = $hometeam->missed - $results->away_score;
        $awayteam->scored = $awayteam->scored - $results->away_score;
        $awayteam->missed = $awayteam->missed - $results->home_score;
        // users stats
      $fifahStats->fifaPoints = $fifahStats->fifaPoints - 3;
      $fifahStats->fifaPlayed = $fifahStats->fifaPlayed - 1;
      $fifahStats->fifaWon = $fifahStats->fifaWon - 1;

      $fifaaStats->fifaPlayed = $fifaaStats->fifaPlayed - 1;
      $fifaaStats->fifaLost =$fifaaStats->fifaLost - 1;

      $fifahStats->fifaScored = $fifahStats->fifaScored - $results->home_score;
      $fifahStats->fifaMissed = $fifahStats->fifaMissed- $results->away_score;
      $fifaaStats->fifaScored = $fifaaStats->fifaScored - $results->away_score;
      $fifaaStats->fifaMissed = $fifaaStats->fifaMissed - $results->home_score;
      }
      // jei lose
      if($results->away_score > $results->home_score){
        $awayteam->win = $awayteam->win -1;
        $awayteam->total_points=$awayteam->total_points -3;
        $hometeam->lose= $hometeam->lose -1;
        $awayteam->played = $awayteam->played -1;
        $hometeam->played = $hometeam->played -1;

        $hometeam->scored = $hometeam->scored - $results->home_score;
        $hometeam->missed = $hometeam->missed - $results->away_score;
        $awayteam->scored = $awayteam->scored - $results->away_score;
        $awayteam->missed = $awayteam->missed - $results->home_score;

        $fifaaStats->fifaPoints = $fifaaStats->fifaPoints - 3;
        $fifahStats->fifaPlayed = $fifahStats->fifaPlayed - 1;
        $fifaaStats->fifaWon = $fifaaStats->fifaWon - 1;

        $fifaaStats->fifaPlayed = $fifaaStats->fifaPlayed - 1;
        $fifahStats->fifaLost =$fifahStats->fifaLost - 1;

        $fifahStats->fifaScored = $fifahStats->fifaScored - $results->home_score;
        $fifahStats->fifaMissed = $fifahStats->fifaMissed - $results->away_score;
        $fifaaStats->fifaScored = $fifaaStats->fifaScored - $results->away_score;
        $fifaaStats->fifaMissed = $fifaaStats->fifaMissed - $results->home_score;
      }
      // jei draw
      if($results->home_score == $results->away_score){
        $hometeam->draw= $hometeam->draw -1;
        $awayteam->draw=$awayteam->draw -1;
        $hometeam->total_points= $hometeam->total_points -1;
        $awayteam->total_points= $awayteam->total_points -1;
        $awayteam->played = $awayteam->played -1;
        $hometeam->played = $hometeam->played -1;
        $hometeam->scored = $hometeam->scored - $results->home_score;
        $hometeam->missed = $hometeam->missed - $results->away_score;
        $awayteam->scored = $awayteam->scored - $results->away_score;
        $awayteam->missed = $awayteam->missed - $results->home_score;

        $fifaaStats->fifaPoints = $fifaaStats->fifaPoints - 1;
        $fifahStats->fifaPoints = $fifahStats->fifaPoints - 1;
        $fifahStats->fifaPlayed = $fifahStats->fifaPlayed - 1;

        $fifaaStats->fifaPlayed = $fifaaStats->fifaPlayed - 1;
        $fifaaStats->fifaDraw = $fifaaStats->fifaDraw - 1;
        $fifahStats->fifaDraw = $fifahStats->fifaDraw - 1;


        $fifahStats->fifaScored = $fifahStats->fifaScored - $results->home_score;
        $fifahStats->fifaMissed = $fifahStats->fifaMissed - $results->away_score;
        $fifaaStats->fifaScored = $fifaaStats->fifaScored - $results->away_score;
        $fifaaStats->fifaMissed = $fifaaStats->fifaMissed - $results->home_score;
      }
      $results->delete();
      $hometeam->update();
      $awayteam->update();
      $fifahStats->update();
      $fifaaStats->update();
      return redirect('/results')->with('success', 'Rezultatas Ištrintas');


    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function allresults(Request $request) {

      If(Auth::user()->isAdmin()){
      $results = Result::all();
      $everyTeams =Team::orderBy('created_at','desc')->get();
      $everyResults = Result::truncate();

      foreach($everyTeams as $everyTeam){
        $everyTeam ->played = 0;
        $everyTeam ->win = 0;
        $everyTeam ->draw = 0;
        $everyTeam ->lose = 0;
        $everyTeam ->scored = 0;
        $everyTeam ->missed = 0;
        $everyTeam ->total_points = 0;

        $everyTeam ->update();
      }
      return redirect('/teams')->with('info', 'Sezonas restartavosi, galite pradėti naują sezoną.');


      return view('results.allresults')->with('everyResults', $everyResults,'everyTeams', $everyTeams)->with('success', 'Visi sezono  rezultatai sėkmingai ištrinti.');
      }
      return redirect('/teams')->with('error', 'Neturi prieigos.');
    }


}
