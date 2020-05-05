<?php

namespace App\Http\Controllers;

use App\Posts;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $UserId = Auth::id();
        $posts = Posts::where('user_id',$UserId)->orderBy('created_at','desc')->paginate(5);
        $posts->items();

        return view('UserPosts.user-index')->withPosts($posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('UserPosts.pages.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        /** @var Posts $post */
        $post = new \App\Posts();
        $UserId = Auth::id();

        $post->title = $request->get('title');
        $post->user_id = $UserId;
        $post->content = $request->get('content');
        $post->save();

        $request->session()->flash('success', 'Ваша заявка успешно отправленна!');

        return redirect()->route('post.show', $post->id);
    }


    public function show($id)
    {
        $post = Posts::find($id);
        if (Auth::id() !== $post->user_id) {
            return redirect('/home');
        }

        return view('UserPosts.pages.show')->withPost($post);
    }

    /**
     *    closes the application
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = \App\Posts::find($id);
        $post->state_post = 1;
        $post->save();

        return redirect()->route('post.show', $post->id);
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {


    }




}
