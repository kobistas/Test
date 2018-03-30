<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Post;
use DB;
use App\User;
use App\Comment;
use Auth;
// use Storage;


class PostsController extends Controller
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
    public function index(Request $request)
    {
        // $posts = Post::all();
        $s = $request->input('s');
        $posts = Post::orderBy('created_at','desc')->search($s)->paginate(5);
        $postsCount = Post::orderBy('id')->count();

        if (!Auth::user()->isAdmin() && !Auth::user()->isModerator() ) {
          return redirect('/')->with('error', 'Neturi prieigos užeiti į puslapį.');
        }



          return view('posts.index', compact('posts', 'postsCount','s'));
        // return view('posts.index')->with('posts',$posts,'postsCount',$postsCount );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $user_id = auth()->user()->id;
      $user = User::find($user_id);
        // $posts =Post::with($user_id)->orderBy('created_at', 'desc');
          // ->paginate(1);

          if (!Auth::user()->isAdmin() && !Auth::user()->isModerator() ) {
            return redirect('/')->with('error', 'Neturi prieigos rašyti naujienas');
          }

          return view('posts.create')->with('posts', $user->posts);
      }


      // return view('posts.create', compact('posts', 'countYourPosts','user' ));
    // }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
          'title' =>'required',
          'body'=> 'required',
          'cover_image'=> 'image|nullable|max:1999']);

          // Handle File Upload
          if($request->hasFile('cover_image')){
              // Get filename with the extension
              $filenameWithExt = $request->file('cover_image')->getClientOriginalName();
              // Get just filename
              $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
              // Get just ext
              $extension = $request->file('cover_image')->getClientOriginalExtension();
              // Filename to store
              $fileNameToStore= $filename.'_'.time().'.'.$extension;
              // Upload Image
              $path = $request->file('cover_image')->storeAs('public/cover_images', $fileNameToStore);
          } else {
              $fileNameToStore = 'noimage.jpg';
          }


          $post = new Post;
          $post->title = $request->input('title');
          $post->body = $request->input('body');
          $post->user_id = auth()->user()->id;
          $post->cover_image = $fileNameToStore;
          $post->save();

          return redirect('/posts')->with('success', 'Sveikiname, jūsų naujiena yra sukurta.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $post = Post::find($id);


       // $post->comments = Comment::orderBy('created_at', 'desc')->paginate(5);
        $post->comments =Comment::where('post_id', $id)->with('user')->orderBy('created_at', 'desc')->paginate(6);


       return view('posts.show', compact('post', 'comments'));


    }



    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $post = Post::find($id);
        if(auth()->user()->id !== $post->user_id){
           return redirect('/posts')->with('error', 'Neturi prieigos, ne tavo publikuota naujiena.');
        }
        return view('posts.edit')->with('post',$post);
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
        'title' =>'required',
        'body'=> 'required',
        'cover_image'=> 'image|nullable|max:1999'
      ]);


      // Handle File Upload
     if($request->hasFile('cover_image')){
         // Get filename with the extension
         $filenameWithExt = $request->file('cover_image')->getClientOriginalName();
         // Get just filename
         $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
         // Get just ext
         $extension = $request->file('cover_image')->getClientOriginalExtension();
         // Filename to store
         $fileNameToStore= $filename.'_'.time().'.'.$extension;
         // Upload Image
         $path = $request->file('cover_image')->storeAs('public/cover_images', $fileNameToStore);
     }

        $post = Post::find($id);
        $post->title = $request->input('title');
        $post->body = $request->input('body');


        if ($request->hasFile('cover_image')) {
           if ($post->cover_image != 'no_image.png') {
              Storage::delete('public/cover_images/'.$post->cover_image);
            }
             $post->cover_image = $fileNameToStore;
            }


            $post->save();

        return redirect('/posts')->with('info', 'Sveikiname, jūsų naujiena yra redaguota.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);

        if(auth()->user()->id !== $post->user_id){
           return redirect('/posts')->with('error', 'Neturi prieigos, ne tavo publikuota naujiena.');
        }


        if($post->cover_image != 'noimage.jpg'){
            // Delete Image
            Storage::delete('public/cover_images/'.$post->cover_image);
        }


        $post->delete();
        return redirect('/posts/create')->with('success', 'Jūsų naujiena sėkmingai ištrinta.');
    }
}
