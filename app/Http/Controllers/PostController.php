<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\PostRequest;
use App\Mountain;
use App\Post;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
   
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $mountain_select = Mountain::all();
      $user_id = Auth::id();
      return view('create', compact('mountain_select','user_id'));   
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostRequest $request)
    {
        $post = $request->all();
        //postリクエストをdbに送信
        Post::create($post);
        return redirect('/')->with('flash_message', '投稿が完了しました');
    }

    public function __construct()
    {
      $this->middleware('auth');
    }
}
