<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class PostsController extends Controller
{
     /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth', ['except'=> ['index', 'show']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        // $posts=Post::where('title','Post Two')->get();

        $posts=Post::orderBy('created_at','desc')->take(2)->get();
       // $posts=Post::orderBy('title','desc')->get();
        $posts=Post::orderBy('created_at','desc')->paginate(2);
        return view('videos')->with('videos', $posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('create');
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
            'title'=> 'required',
            'body'=>'required'
        ]);
        // Create post;
        $video = new Post;
        $video->title = $request->input('title');
        $video->body = $request->input('body');
        $video->user_id=auth()->user()->id;
        $video->save();

        return redirect('/videos')->with('success', 'Post created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $video = Post::find($id);
        return view('show')->with('video', $video);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $video = Post::find($id);
        //Chek for correct user
        if(auth()->user()->id !== $video->user_id){
           return redirect('/videos')->with('error', 'Unauthorized page'); 
        }
        return view('edit')->with('video', $video);
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
         $video = Post::find($id);
        $video->title = $request->input('title');
        $video->body = $request->input('body');
        $video->save();

        return redirect('/videos')->with('success', 'Post updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $video = Post::find($id);
        //Chek for correct user
        if(auth()->user()->id !== $video->user_id){
           return redirect('/videos')->with('error', 'Unauthorized page'); 
       }
        $video->delete();
        return redirect('/videos')->with('success', 'Post Removed');
    }
}
