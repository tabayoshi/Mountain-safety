<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\PostRequest;
use App\Mountain;
use App\Post;


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
      return view('create', compact('mountain_select'));   
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
        return back();
    }

    public function __construct()
    {
      $this->middleware('auth');
    }
}
