<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index(Request $request) {
        $posts = Post::all();
    return view('index', ['posts' => $posts]);
  }
}
