<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Team;
use App\TeamComment;
use App\User;


class TeamsCommentsController extends Controller
{


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $teamsComments = TeamComment::orderBy('created_at','desc')->paginate(25);
        $commentsCount = TeamComment::orderBy('id')->count();

        return view('teamsComments.index', compact('teamsComments', 'commentsCount'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
        'body'=> 'required|min:2|max:300'
        ]);




      $teamComment = new TeamComment;
      $teamComment->body = $request->input('body');
      $teamComment->user_id = auth()->user()->id;

      $teamComment->save();

      return back()->with('success', 'Jūsų komentaras sėkmingai patalpintas');
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
    public function destroy($id)
    {
        $teamComment = TeamComment::find($id);
        $teamComment->delete();
        return redirect('/teamsComments')->with('info', 'Jūs ištrynėte netinkamą komentarą');
    }
}
