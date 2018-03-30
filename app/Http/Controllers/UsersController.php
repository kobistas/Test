<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Auth;
use App\User;
use DB;
use App\Result;
use App\Team;


class UsersController extends Controller
{

  public function __construct()
  {
      $this->middleware('auth', ['except' => ['index','show']]);
  }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

   public function profile() {

     return view('users.profile',array('user'=>Auth::user()));
   }



    public function index(Request $request)
    {
            $s = $request->input('s');
            $users = User::orderBy('created_at','desc')->search($s)->paginate(20);
            $usersCount = User::orderBy('id')->count();
            if (!Auth::user()->isAdmin() && !Auth::user()->isModerator() ) {
              return redirect('/')->with('error', 'Neturi prieigos užeiti į puslapį.');
            }
            return view('users.index', compact('users', 'usersCount','s'));

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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
          $user = User::find($id);
        
          if(  $teamUser = Team::where('team_id', $user->id)->first()) {

            return view('users.show', compact('user','teamUser'));
          }
          return redirect('/')->with('info', 'Šio vartotojo informacija negalima, nes jis nedalyvauja turnyre.');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $user = User::find($id);
        if (!Auth::user()->isAdmin() && !Auth::user()->isModerator() ) {
          return redirect('/')->with('error', 'Neturi prieigos redaguoti vartotojų');
        }
        if ($user->isAdmin()) {
          return redirect('/')->with('error', 'Šito vartotojo liesti negalima.');
        }

        return view('users.edit')->with('user',$user);
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
      $this->validate($request, [
        // 'name' =>'required',
        'avatar'=> 'image|nullable|max:1999'

      ]);

      // Handle File Upload
     if($request->hasFile('avatar')){
         // Get filename with the extension
         $filenameWithExt = $request->file('avatar')->getClientOriginalName();
         // Get just filename
         $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
         // Get just ext
         $extension = $request->file('avatar')->getClientOriginalExtension();
         // Filename to store
         $fileNameToStore= $filename.'_'.time().'.'.$extension;
         // Upload Image
         $path = $request->file('avatar')->storeAs('public/avatar', $fileNameToStore);
     }

      $user = User::find($id);
      if($request->input('name')){
      $user->name = $request->input('name');
    }

      if($request->input('ban')){
      $user->ban = $request->input('ban');
    }

    if($request->input('isModerator')){
    $user->isModerator = $request->input('isModerator');
  }
      if ($request->hasFile('avatar')) {
         if ($user->avatar != 'no_image.png') {
            Storage::delete('public/avatar/'.$user->avatar);
          }
           $user->avatar = $fileNameToStore;
          }
      $user->save();

      return redirect('/')->with('info', 'Vartotojas yra redaguotas.');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $user = User::find($id);
      $user->delete();
      return redirect()->route('users.index')->with('info', 'Vartotojas sėkmingai ištrintas');
    }
}
