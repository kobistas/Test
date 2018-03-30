<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Comment;
use App\User;
use Auth;

class CommentsController extends Controller
{

  // public function __construct()
  // {
  //     $this->middleware('auth', ['except' => ['index']]);
  // }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $s = $request->input('s');
        $comments = Comment::orderBy('created_at','desc')->search($s)->paginate(25);
        $commentsCount = Comment::orderBy('id')->count();
        // return view('comments.index')->with('comments',$comments);

        if (!Auth::user()->isAdmin() && !Auth::user()->isModerator() ) {
          return redirect('/')->with('error', 'Neturi prieigos užeiti į puslapį.');
        }
        return view('comments.index', compact('comments', 'commentsCount','s'));
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
    public function store(Request $request, Post $post)
    {
      $this->validate($request, [
        'body'=> 'required|min:2|max:700'
        ]);

        // Comment::create([
        //   'body'=>request('body'),
        //   'user_id'=> auth()->user()->id,
        //   'post_id'=>$post->id
        //
        // ]);


      $comment = new Comment;
      $comment->body = $request->input('body');
      $comment->post_id = $post->id;
      $comment->user_id = auth()->user()->id;

      $comment->save();

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
        $comment = Comment::find($id);
        $comment->delete();
        return redirect('/comments')->with('info', 'Jūs ištrynėte netinkamą komentarą');
    }
}
