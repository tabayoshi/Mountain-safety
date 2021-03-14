<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;
use App\Mountain;

class IndexController extends Controller
{
    public function index(Request $request) {
        $posts = Post::all();
        $mountains = Mountain::orderBy('id', 'desc')->get();
        return view('index', compact('posts','mountains'));
  }
}