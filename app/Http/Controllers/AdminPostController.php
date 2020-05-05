<?php
/**
 * Created by PhpStorm.
 * User: Ares
 * Date: 04.05.2020
 * Time: 16:37
 */

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminPostController extends Controller
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
        $posts = \App\Posts::orderBy('user_id')->get();

//        $posts::items();
//        dd($posts);

        $AdminClosure = Auth::user()->role;
        if ($AdminClosure !== 'manager'){
            return redirect('/home');
        }

        return view('admin.admin-index')->withPosts($posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('admin.pages.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $post = new \App\Posts();
        $UserId = Auth::id();

        $post->title = $request->get('title');
        $post->user_id = $UserId;
        $post->content = $request->get('content');
        $post->save();

        $request->session()->flash('success', 'Ваша заявка успешно отправленна!');

        $AdminClosure = Auth::user()->role;
        if ($AdminClosure !== 'manager'){
            return redirect('/home');
        }

        return redirect()->route('admin-panel.show', $post->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        /* редирект если не менеджер */
        $AdminClosure = Auth::user()->role;
        if ($AdminClosure !== 'manager'){
            return redirect('/home');
        }

        $post = \App\Posts::find($id);
        $post->view_post = 1;
        $post->save();

        return view('admin.pages.show')->withPost($post);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $AdminClosure = Auth::user()->role;
        if ($AdminClosure !== 'manager'){
            return redirect('/home');
        }


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