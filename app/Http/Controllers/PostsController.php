<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use DB;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$posts = Post::all();
        //return $post = Post::where('title', 'Post Two')->get();
        //$posts = DB::select('SELECT * FROM posts');

        //$posts = Post::orderBy('title', 'asc')->take(1)->get();
        //$posts = Post::orderBy('title', 'asc')->get();

        $posts = Post::orderBy('created_at', 'desc')->paginate(10);
        return view('posts.home')->with('posts', $posts);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create');
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
            'title' => 'required',
        ]);

        // Create post
        $post = new Post;
        $post->title = $request->input('title');
        $post->timesaday = $request->input('timesaday');
        $post->beforeafter = $request->input('beforeafter');
        $post->user_id = auth()->user()->id;
        $post->save();

        return redirect('/home')->with('success', 'Medicine added');
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
        return view('posts.show')->with('post', $post);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = post::find($id);
        return view('posts.edit')->with('post', $post);
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
            'title' => 'required',
        
        ]);

        // Create post
        $post = Post::find($id);
        $post->title = $request->input('title');
        $post->timesaday = $request->input('timesaday');
        $post->beforeafter = $request->input('beforeafter');
        $post->save();

        return redirect('/home')->with('success', 'Medicine Updated');
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
        $post->delete();
        return redirect('/home')->with('success', 'Post Removed');
    }
}
