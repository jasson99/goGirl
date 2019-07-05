<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use DB;
use Carbon\Carbon;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct(){

        $this->middleware('auth')->except(['index','show']);
    }
    public function index()
    {
       //$post = Post::all();
        //$post = DB::select('Select * from posts');
        //$post = Post::orderBy('title','desc')->take(1)->get();
        //$post = Post::orderBy('title','desc')->get();
        $posts = Post::orderBy('created_at','desc');
        if($month = request('month')){
            $posts-> whereMonth('created_at',Carbon::parse($month)->month);
        }

        if($year = request('year')){
            $posts->whereYear('created_at',$year);
        }

        $posts = $posts->paginate(10);
        
        return view('posts.index',compact('posts'));
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
        $this->validate($request,[
            'title' => 'required',
            'body' => 'required',
            'age' => 'required|integer',

        ]);
        
        //creating new post
        $post = new Post;
        $post->title = $request->input('title');
        $post->body = $request->input('body');
        $post->age = $request->input('age');
        $post->address = $request->input('address');
        $post->user_id = auth()->user()->id;
        $post->save();

        return redirect('/posts')->with('success', ' Post Created');
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

        $archives = Post::selectRaw('year(created_at) year, monthname(created_at) month, count(*) published' )
                    ->groupBy('year','month')
                    ->get()
                    ->toArray();

        return view('posts.show',compact('post','archives'));
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
        $post = Post::find($id);
        $post->title = $request->input('title');
        $post->body = $request->input('body');
        $post->save();

        return redirect('/posts')->with('success', ' Post Updated');
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

        return redirect('/posts')->with('success', ' Post Removed');
    }
}
