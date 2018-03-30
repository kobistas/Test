<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Result;
use App\Team;
use App\TeamComment;

use Illuminate\Support\Facades\Auth;


class TeamsController extends Controller
{


  /**
   * Create a new controller instance.
   *
   * @return void
   */
  public function __construct()
  {
      $this->middleware('auth', ['except' => ['index','show']]);
  }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $teams=Team::orderBy('total_points','desc')->get();
      $results=Result::orderBy('created_at','desc')->paginate(4);
      $countResults=Result::orderBy('id')->count();
      $teamsComments = TeamComment::orderBy('created_at','desc')->paginate(5);
        if(Auth::user()){
      $teamUser = Team::where('team_id', Auth::user()->id)->first();

    }



      return view('teams.index', compact('teams', 'results', 'countResults','teamsComments','teamUser'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $teams = Team::all();
      $countTeams=Team::orderBy('id')->count();
      $checkUser = Team::where('team_id', Auth::user()->id)->first();


      if($checkUser) {

          return redirect('/teams')->with('error', 'Jūs jau dalyvaujate turnyre');
      }
      if(Auth::user()->ban > 1) {
        return redirect('/teams')->with('error', 'Šiuo metu registracija negalima, pamėginkite vėliau arba susisiekite su administracija');
      }
      if($countTeams == 20) {
        return redirect('/teams')->with('info', 'Labai atsiprašome, tačiau visos komandos šiame turnyre užimtos. Galbūt vėliau atsilaisvins vieta.');
      }
      if(Auth::user()->provider_user_id < 1){
          return redirect('/teams')->with('info', 'Dalyvauti gali tik facebook prisijungę vartotojai.');
      }

      //
      // if($teams > 1){
      //     return redirect('/teams')->with('error', 'Visos komandos jau užimtos');
      // }
          return view('teams.create', compact('teams'));



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
        'team_name'=>'required|max:10|unique:teams',


      ]);



      $teams = new Team;
      $teams->team_name = $request->input('team_name');
      $teams -> team_id = Auth::user()->id;
      $checkTeamUnique = Team::orderBy('team_name');




      $teams->save();
    return redirect('/teams')->with('success', 'Sveikiname, jūs prisiregistravote į turnyrą. eKings žaidimų lyga jums linki sekmės!');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $team = Team::find($id);
      $teamComment = TeamComment::orderBy('created_at','desc')->paginate(25);
      // $result = Result::find('home_team','away_team', Auth::user()->id );
      $resultsHome = Team::find($id)->resultsHomeUser;
      $resultsAway = Team::find($id)->resultsAwayUser;


      return view('teams.show', compact('team', 'resultsHome', 'resultsAway','teamComment'));
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
    public function destroy($id)
    {
      $team = Team::find($id);
      if ($team->played > 0) {
        return redirect('/teams')->with('error', 'Komanda jau yra sužaidusi varžybų, jei norite pašalinti, ištrinkite šios komandos rezultatus.');
      }
      $team->delete();
      return redirect()->route('teams.index')->with('info', 'Komanda sėkmingai pašalinta');
    }
}
